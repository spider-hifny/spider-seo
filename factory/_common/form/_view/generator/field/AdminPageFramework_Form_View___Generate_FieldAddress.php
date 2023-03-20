<?php
/*
 * Admin Page Framework v3.9.1 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/spider-seo-compiler>
 * <https://en.michaeluno.jp/spider-seo>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class SpiderSEOAdminPageFramework_Form_View___Generate_FieldAddress extends SpiderSEOAdminPageFramework_Form_View___Generate_FlatFieldName {
    public function get()
    {
        return $this->_getFlatFieldName();
    }
    public function getModel()
    {
        return $this->get() . '|' . $this->sIndexMark;
    }
}
