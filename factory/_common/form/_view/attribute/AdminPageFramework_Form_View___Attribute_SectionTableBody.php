<?php
/*
 * Admin Page Framework v3.9.1 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/spider-seo-compiler>
 * <https://en.michaeluno.jp/spider-seo>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class SpiderSEOAdminPageFramework_Form_View___Attribute_SectionTableBody extends SpiderSEOAdminPageFramework_Form_View___Attribute_Base {
    public $sContext = 'section_table_content';
    protected function _getAttributes()
    {
        $_sCollapsibleType = $this->getElement($this->aArguments, array( 'collapsible', 'type' ), 'box');
        return array( 'class' => $this->getAOrB($this->aArguments[ '_is_collapsible' ], 'spider-seo-collapsible-section-content' . ' ' . 'spider-seo-collapsible-content' . ' ' . 'accordion-section-content' . ' ' . 'spider-seo-collapsible-content-type-' . $_sCollapsibleType, null), );
    }
}
