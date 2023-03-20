<?php
/*
 * Admin Page Framework v3.9.1 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/spider-seo-compiler>
 * <https://en.michaeluno.jp/spider-seo>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class SpiderSEOAdminPageFramework_Form_View__Resource__Head extends SpiderSEOAdminPageFramework_FrameworkUtility {
    public $oForm;
    public function __construct($oForm, $sHeadActionHook='admin_head')
    {
        $this->oForm = $oForm;
        if (in_array($this->oForm->aArguments[ 'structure_type' ], array( 'widget' ))) {
            return;
        }
        add_action($sHeadActionHook, array( $this, '_replyToInsertRequiredInternalScripts' ));
    }
    public function _replyToInsertRequiredInternalScripts()
    {
        if (! $this->oForm->isInThePage()) {
            return;
        }
        if ($this->hasBeenCalled(__METHOD__)) {
            return;
        }
        echo "<script type='text/javascript' class='spider-seo-form-script-required-in-head'>" . '/* <![CDATA[ */ ' . $this->_getScripts_RequiredInHead() . ' /* ]]> */' . "</script>";
    }
    private function _getScripts_RequiredInHead()
    {
        return 'document.write( "<style class=\'spider-seo-js-embedded-internal-style\'>' . str_replace('\\n', '', esc_js($this->_getInternalCSS())) . '</style>" );';
    }
    private function _getInternalCSS()
    {
        $_oLoadingCSS = new SpiderSEOAdminPageFramework_Form_View___CSS_Loading;
        $_oLoadingCSS->add($this->_getScriptElementConcealerCSSRules());
        return $_oLoadingCSS->get();
    }
    private function _getScriptElementConcealerCSSRules()
    {
        return <<<CSSRULES
.spider-seo-form-js-on{visibility:hidden}.widget .spider-seo-form-js-on{visibility:visible}
CSSRULES;
    }
}
