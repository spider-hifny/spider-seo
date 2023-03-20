<?php
/*
 * Admin Page Framework v3.9.1 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/spider-seo-compiler>
 * <https://en.michaeluno.jp/spider-seo>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class SpiderSEOAdminPageFramework_Form_Meta extends SpiderSEOAdminPageFramework_Form {
    public function updateMetaDataByType($iObjectID, array $aInput, array $aSavedMeta, $sStructureType='post_meta_box')
    {
        if (! $iObjectID) {
            return;
        }
        $_aFunctionNameMapByFieldsType = array( 'post_meta_box' => 'update_post_meta', 'user_meta' => 'update_user_meta', 'term_meta' => 'update_term_meta', );
        if (! in_array($sStructureType, array_keys($_aFunctionNameMapByFieldsType))) {
            return;
        }
        $_sFunctionName = $this->getElement($_aFunctionNameMapByFieldsType, $sStructureType);
        $aInput = $this->getInputsUnset($aInput, $this->sStructureType);
        foreach ($aInput as $_sSectionOrFieldID => $_vValue) {
            $this->_updateMetaDatumByFunctionName($iObjectID, $_vValue, $aSavedMeta, $_sSectionOrFieldID, $_sFunctionName);
        }
    }
    private function _updateMetaDatumByFunctionName($iObjectID, $_vValue, array $aSavedMeta, $_sSectionOrFieldID, $_sFunctionName)
    {
        if (is_null($_vValue)) {
            return;
        }
        $_vSavedValue = $this->getElement($aSavedMeta, $_sSectionOrFieldID, null);
        if ($_vValue == $_vSavedValue) {
            return;
        }
        $_sFunctionName($iObjectID, $_sSectionOrFieldID, $_vValue);
    }
}
