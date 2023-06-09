<?php
class SpiderSEOAdminPageFramework_View__PageRenderer extends SpiderSEOAdminPageFramework_FrameworkUtility
{
    public $oFactory;
    public $sPageSlug;
    public $sTabSlug;
    public $aCSSRules = array();
    public $aScripts = array();
    public function __construct($oFactory, $sPageSlug, $sTabSlug)
    {
        $this->oFactory = $oFactory;
        $this->sPageSlug = $sPageSlug;
        $this->sTabSlug = $sTabSlug;
    }
    public function render()
    {
        $_sPageSlug = $this->sPageSlug;
        $_sTabSlug = $this->sTabSlug;
        $this->addAndDoActions($this->oFactory, $this->getFilterArrayByPrefix('do_before_', $this->oFactory->oProp->sClassName, $_sPageSlug, $_sTabSlug, true), $this->oFactory);?>
        <div class="spider-header">
            <a href="//spiderseo.co">
                <img src="<?php echo plugins_url('spider-seo/assets/image/colored-logo.png')?>" class="logo">
            </a>
        </div>
        <div class="<?php echo esc_attr($this->oFactory->oProp->sWrapperClassAttribute); ?>">
            <?php echo $this->_getContentTop(); ?>
            <div class="spider-seo-container">
                <?php
$this->addAndDoActions($this->oFactory, $this->getFilterArrayByPrefix('do_form_', $this->oFactory->oProp->sClassName, $_sPageSlug, $_sTabSlug, true), $this->oFactory);
        $this->_printFormOpeningTag($this->oFactory->oProp->bEnableForm);?>
                <div id="poststuff">
                    <div id="post-body" class="metabox-holder columns-<?php echo $this->_getNumberOfColumns(); ?>">
                    <?php
$this->_printMainPageContent($_sPageSlug, $_sTabSlug);
        $this->_printPageMetaBoxes();?>
                    </div><!-- #post-body -->
                </div><!-- #poststuff -->

            <?php echo $this->_printFormClosingTag($_sPageSlug, $_sTabSlug, $this->oFactory->oProp->bEnableForm); ?>
            </div><!-- .spider-seo-container -->

            <?php
echo $this->addAndApplyFilters($this->oFactory, $this->getFilterArrayByPrefix('content_bottom_', $this->oFactory->oProp->sClassName, $_sPageSlug, $_sTabSlug, false), ''); ?>
        </div><!-- .wrap -->
        <?php
$this->addAndDoActions($this->oFactory, $this->getFilterArrayByPrefix('do_after_', $this->oFactory->oProp->sClassName, $_sPageSlug, $_sTabSlug, true), $this->oFactory);
    }
    private function _getNumberOfColumns()
    {
        if (!$this->doesMetaBoxExist('side')) {
            return 1;
        }
        $_iColumns = $this->getNumberOfScreenColumns();
        return $_iColumns ? $_iColumns : 1;
    }
    private function _getContentTop()
    {
        $_oScreenIcon = new SpiderSEOAdminPageFramework_View__PageRenderer__ScreenIcon($this->oFactory, $this->sPageSlug, $this->sTabSlug);
        $_sContentTop = $_oScreenIcon->get();
        $_oPageHeadingTabs = new SpiderSEOAdminPageFramework_View__PageRenderer__PageHeadingTabs($this->oFactory, $this->sPageSlug);
        $_sContentTop .= $_oPageHeadingTabs->get();
        $_oInPageTabs = new SpiderSEOAdminPageFramework_View__PageRenderer__InPageTabs($this->oFactory, $this->sPageSlug);
        $_sContentTop .= $_oInPageTabs->get();
        return $this->addAndApplyFilters($this->oFactory, $this->getFilterArrayByPrefix('content_top_', $this->oFactory->oProp->sClassName, $this->sPageSlug, $this->sTabSlug, false), $_sContentTop);
    }
    private function _printMainPageContent($sPageSlug, $sTabSlug)
    {
        $_bSideMetaboxExists = $this->doesMetaBoxExist('side');
        echo "<!-- main admin page content -->";
        echo "<div class='spider-seo-content'>";
        if ($_bSideMetaboxExists) {
            echo "<div id='post-body-content'>";
        }
        echo $this->addAndApplyFilters($this->oFactory, $this->getFilterArrayByPrefix('content_', $this->oFactory->oProp->sClassName, $sPageSlug, $sTabSlug, false), $this->oFactory->content($this->_getFormOutput($sPageSlug)));
        $this->addAndDoActions($this->oFactory, $this->getFilterArrayByPrefix('do_', $this->oFactory->oProp->sClassName, $sPageSlug, $sTabSlug, true), $this->oFactory);
        if ($_bSideMetaboxExists) {
            echo "</div><!-- #post-body-content -->";
        }
        echo "</div><!-- .spider-seo-content -->";
    }
    private function _getFormOutput($sPageSlug)
    {
        if (!$this->oFactory->oProp->bEnableForm) {
            return '';
        }
        return $this->oFactory->oForm->get();
    }
    private function _printPageMetaBoxes()
    {
        $_oPageMetaBoxRenderer = new SpiderSEOAdminPageFramework_View__PageMataBoxRenderer();
        $_oPageMetaBoxRenderer->render('side');
        $_oPageMetaBoxRenderer->render('normal');
        $_oPageMetaBoxRenderer->render('advanced');
    }
    private function _printFormOpeningTag($fEnableForm = true)
    {
        if (!$fEnableForm) {
            return;
        }
        echo "<form " . $this->getAttributes(array('method' => 'post', 'enctype' => $this->oFactory->oProp->sFormEncType, 'id' => 'spider-seo-form', 'action' => wp_unslash(remove_query_arg('settings-updated', $this->oFactory->oProp->sTargetFormPage)))) . " >" . PHP_EOL;
        echo "<input type='hidden' name='admin_page_framework_start' value='1' />" . PHP_EOL;
        settings_fields($this->oFactory->oProp->sOptionKey);
    }
    private function _printFormClosingTag($sPageSlug, $sTabSlug, $fEnableForm = true)
    {
        if (!$fEnableForm) {
            return;
        }
        $_sNonce = wp_create_nonce('form_' . md5($this->oFactory->oProp->sClassName . get_current_user_id()));
        echo "<input type='hidden' name='page_slug' value='{$sPageSlug}' />" . PHP_EOL . "<input type='hidden' name='tab_slug' value='{$sTabSlug}' />" . PHP_EOL . "<input type='hidden' name='_is_admin_page_framework' value='{$_sNonce}' />" . PHP_EOL . "</form><!-- End Form -->" . PHP_EOL;
    }
}
