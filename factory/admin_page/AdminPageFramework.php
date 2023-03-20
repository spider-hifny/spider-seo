<?php
/*
 * Admin Page Framework v3.9.1 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/spider-seo-compiler>
 * <https://en.michaeluno.jp/spider-seo>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

abstract class SpiderSEOAdminPageFramework extends SpiderSEOAdminPageFramework_Controller {
    protected $_sStructureType = 'admin_page';
    public function __construct($isOptionKey=null, $sCallerPath=null, $sCapability='manage_options', $sTextDomain='spider-seo')
    {
        if (! $this->_isInstantiatable()) {
            return;
        }
        parent::__construct($isOptionKey, $this->_getCallerPath($sCallerPath), $sCapability, $sTextDomain);
    }
    private function _getCallerPath($sCallerPath)
    {
        if ($sCallerPath) {
            return trim($sCallerPath);
        }
        if (! is_admin()) {
            return null;
        }
        if (! isset($GLOBALS[ 'pagenow' ])) {
            return null;
        }
        return 'plugins.php' === $GLOBALS[ 'pagenow' ] || isset($_GET[ 'page' ]) ? SpiderSEOAdminPageFramework_Utility::getCallerScriptPath(__FILE__) : null;
    }
}
