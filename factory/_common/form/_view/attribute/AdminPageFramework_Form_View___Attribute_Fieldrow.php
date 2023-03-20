<?php
/*
 * Admin Page Framework v3.9.1 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/spider-seo-compiler>
 * <https://en.michaeluno.jp/spider-seo>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class SpiderSEOAdminPageFramework_Form_View___Attribute_Fieldrow extends SpiderSEOAdminPageFramework_Form_View___Attribute_FieldContainer_Base {
    public $sContext = 'fieldrow';
    protected function _getFormattedAttributes()
    {
        $_aAttributes = parent::_getFormattedAttributes();
        if ($this->aArguments[ 'hidden' ]) {
            $_aAttributes[ 'style' ] = $this->getStyleAttribute($this->getElement($_aAttributes, 'style', array()), 'display:none');
        }
        return $_aAttributes;
    }
}
