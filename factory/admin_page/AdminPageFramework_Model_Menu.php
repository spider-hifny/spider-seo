<?php
/*
 * Admin Page Framework v3.9.1 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/spider-seo-compiler>
 * <https://en.michaeluno.jp/spider-seo>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

abstract class SpiderSEOAdminPageFramework_Model_Menu extends SpiderSEOAdminPageFramework_Controller_Page {
    public function __construct($sOptionKey=null, $sCallerPath=null, $sCapability='manage_options', $sTextDomain='spider-seo')
    {
        parent::__construct($sOptionKey, $sCallerPath, $sCapability, $sTextDomain);
        new SpiderSEOAdminPageFramework_Model_Menu__RegisterMenu($this);
    }
}
