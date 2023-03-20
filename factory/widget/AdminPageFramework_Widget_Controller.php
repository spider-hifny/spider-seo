<?php
/*
 * Admin Page Framework v3.9.1 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/spider-seo-compiler>
 * <https://en.michaeluno.jp/spider-seo>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

abstract class SpiderSEOAdminPageFramework_Widget_Controller extends SpiderSEOAdminPageFramework_Widget_View {
    public function setUp()
    {}
    public function load()
    {}
    protected function setArguments(array $aArguments=array())
    {
        $this->oProp->aWidgetArguments = $aArguments;
    }
}