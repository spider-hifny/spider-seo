<?php
/*
 * Admin Page Framework v3.9.1 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/spider-seo-compiler>
 * <https://en.michaeluno.jp/spider-seo>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

abstract class SpiderSEOAdminPageFramework_Form_View___Generate_Base extends SpiderSEOAdminPageFramework_FrameworkUtility {
    public $aArguments = array();
    public function __construct()
    {
        $_aParameters = func_get_args() + array( $this->aArguments, );
        $this->aArguments = $_aParameters[ 0 ];
    }
    public function get()
    {
        return '';
    }
}
