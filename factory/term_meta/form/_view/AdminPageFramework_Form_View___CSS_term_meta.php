<?php
/*
 * Admin Page Framework v3.9.1 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/spider-seo-compiler>
 * <https://en.michaeluno.jp/spider-seo>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class SpiderSEOAdminPageFramework_Form_View___CSS_term_meta extends SpiderSEOAdminPageFramework_Form_View___CSS_Base {
    protected function _get()
    {
        return $this->_getRules();
    }
    private function _getRules()
    {
        return <<<CSSRULES
.spider-seo-form-table-outer-row-term_meta,.spider-seo-form-table-outer-row-term_meta>td{margin:0;padding:0}.spider-seo-form-table-term_meta>tbody>tr>td{margin-left:0;padding-left:0}.spider-seo-form-table-term_meta .spider-seo-sectionset,.spider-seo-form-table-term_meta .spider-seo-section{margin-bottom:0}.spider-seo-form-table-term_meta.add-new-term .title-colon{margin-left:.2em}.spider-seo-form-table-term_meta.add-new-term .spider-seo-section .form-table>tbody>tr>td,.spider-seo-form-table-term_meta.add-new-term .spider-seo-section .form-table>tbody>tr>th{display:inline-block;width:100%;padding:0;float:right;clear:right}.spider-seo-form-table-term_meta.add-new-term .spider-seo-field{width:auto}.spider-seo-form-table-term_meta.add-new-term .spider-seo-field{max-width:100%}.spider-seo-form-table-term_meta.add-new-term .sortable .spider-seo-field{width:auto}.spider-seo-form-table-term_meta.add-new-term .spider-seo-section .form-table>tbody>tr>th{font-size:13px;line-height:1.5;margin:0;font-weight:700}.spider-seo-form-table-term_meta .spider-seo-section-title h3{border:none;font-weight:700;font-size:1.12em;margin:0;padding:0;font-family:'Open Sans',sans-serif;cursor:inherit;-webkit-user-select:inherit;-moz-user-select:inherit;user-select:inherit}.spider-seo-form-table-term_meta .spider-seo-collapsible-title h3{margin:0}.spider-seo-form-table-term_meta h4{margin:1em 0;font-size:1.04em}.spider-seo-form-table-term_meta .spider-seo-section-tab h4{margin:0}
CSSRULES;
    }
}
