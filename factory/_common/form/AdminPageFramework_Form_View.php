<?php
/*
 * Admin Page Framework v3.9.1 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/spider-seo-compiler>
 * <https://en.michaeluno.jp/spider-seo>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class SpiderSEOAdminPageFramework_Form_View extends SpiderSEOAdminPageFramework_Form_Model {
    public function __construct()
    {
        parent::__construct();
        new SpiderSEOAdminPageFramework_Form_View__Resource($this);
    }
    public function get()
    {
        $this->sCapability = $this->callBack($this->aCallbacks[ 'capability' ], '');
        if (! $this->canUserView($this->sCapability)) {
            return '';
        }
        $this->_formatElementDefinitions($this->aSavedData);
        $_oFormTables = new SpiderSEOAdminPageFramework_Form_View___Sectionsets(array( 'capability' => $this->sCapability, ) + $this->aArguments, array( 'field_type_definitions' => $this->aFieldTypeDefinitions, 'sectionsets' => $this->aSectionsets, 'fieldsets' => $this->aFieldsets, ), $this->aSavedData, $this->callBack($this->aCallbacks[ 'field_errors' ], array( $this->getFieldErrors() )), $this->aCallbacks, $this->oMsg);
        return $this->_getNoScriptMessage() . $_oFormTables->get();
    }
    private function _getNoScriptMessage()
    {
        if ($this->hasBeenCalled(__METHOD__)) {
            return '';
        }
        return "<noscript>" . "<div class='error'>" . "<p class='spider-seo-form-warning'>" . $this->oMsg->get('please_enable_javascript') . "</p>" . "</div>" . "</noscript>";
    }
    public function printSubmitNotices()
    {
        $this->oSubmitNotice->render();
    }
}
