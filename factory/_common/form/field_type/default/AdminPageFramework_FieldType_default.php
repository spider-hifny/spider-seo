<?php
/*
 * Admin Page Framework v3.9.1 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/spider-seo-compiler>
 * <https://en.michaeluno.jp/spider-seo>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class SpiderSEOAdminPageFramework_FieldType_default extends SpiderSEOAdminPageFramework_FieldType {
    public $aDefaultKeys = array();
    public function _replyToGetField($aField)
    {
        return $aField['before_label'] . "<div class='spider-seo-input-label-container'>" . "<label for='{$aField['input_id']}'>" . $aField['before_input'] . ($aField['label'] && ! $aField['repeatable'] ? "<span " . $this->getLabelContainerAttributes($aField, 'spider-seo-input-label-string') . ">" . $aField[ 'label' ] . "</span>" : "") . $aField['value'] . $aField['after_input'] . "</label>" . "</div>" . $aField['after_label'] ;
    }
}
