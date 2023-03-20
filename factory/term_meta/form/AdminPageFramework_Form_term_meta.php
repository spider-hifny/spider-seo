<?php
/*
 * Admin Page Framework v3.9.1 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/spider-seo-compiler>
 * <https://en.michaeluno.jp/spider-seo>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class SpiderSEOAdminPageFramework_Form_term_meta extends SpiderSEOAdminPageFramework_Form_Meta {
    public $sStructureType = 'term_meta';
    public function construct()
    {
        $this->_addDefaultResources();
    }
    private function _addDefaultResources()
    {
        $_oCSS = new SpiderSEOAdminPageFramework_Form_View___CSS_term_meta;
        $this->addResource('internal_styles', $_oCSS->get());
    }
    public function get()
    {
        $_aArguments = func_get_args() + array( false );
        $bEditTerm = $_aArguments[ 0 ];
        $this->sCapability = $this->callback($this->aCallbacks[ 'capability' ], '');
        if (! $this->canUserView($this->sCapability)) {
            return '';
        }
        $this->_formatElementDefinitions($this->aSavedData);
        $_oFormTables = new SpiderSEOAdminPageFramework_Form_View___Sectionsets(array( 'capability' => $this->sCapability, ) + $this->aArguments, array( 'field_type_definitions' => $this->aFieldTypeDefinitions, 'sectionsets' => $this->aSectionsets, 'fieldsets' => $this->aFieldsets, ), $this->aSavedData, $this->getFieldErrors(), $this->aCallbacks, $this->oMsg);
        $_sAddNewTerm = $bEditTerm ? '' : ' add-new-term';
        $_sClassSelectors = 'spider-seo-form-table-term_meta' . $_sAddNewTerm;
        return '<tr class="spider-seo-form-table-outer-row-term_meta">' . '<td colspan=2>' . '<table class="' . $_sClassSelectors . '">' . '<tbody>' . '<tr>' . '<td>' . $_oFormTables->get() . '</td>' . '</tr>' . '</tbody>' . '</table>' . '</td>' . '</tr>';
    }
}
