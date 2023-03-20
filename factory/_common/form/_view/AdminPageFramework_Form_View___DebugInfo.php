<?php
/*
 * Admin Page Framework v3.9.1 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/spider-seo-compiler>
 * <https://en.michaeluno.jp/spider-seo>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class SpiderSEOAdminPageFramework_Form_View___DebugInfo extends SpiderSEOAdminPageFramework_FrameworkUtility {
    public $sStructureType = '';
    public $aCallbacks = array();
    public $oMsg;
    public function __construct()
    {
        $_aParameters = func_get_args() + array( $this->sStructureType, $this->aCallbacks, $this->oMsg, );
        $this->sStructureType = $_aParameters[ 0 ];
        $this->aCallbacks = $_aParameters[ 1 ];
        $this->oMsg = $_aParameters[ 2 ];
    }
    public function get()
    {
        if (! $this->_shouldProceed()) {
            return '';
        }
        return "<div class='spider-seo-info'>" . $this->oMsg->get('debug_info') . ': ' . $this->getFrameworkNameVersion() . "</div>";
    }
    private function _shouldProceed()
    {
        if (! $this->callBack($this->aCallbacks[ 'show_debug_info' ], true)) {
            return false;
        }
        return in_array($this->sStructureType, array( 'widget', 'post_meta_box', 'page_meta_box', 'user_meta' ));
    }
}
