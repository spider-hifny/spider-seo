<?php
/*
 * Admin Page Framework v3.9.1 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/spider-seo-compiler>
 * <https://en.michaeluno.jp/spider-seo>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class SpiderSEOAdminPageFramework_Form_Model___Format_RepeatableSection extends SpiderSEOAdminPageFramework_FrameworkUtility {
    protected static $_aStructure = array( 'min' => 0, 'max' => 0, 'disabled' => false, );
    protected static $_aStructure_Disabled = array( 'message' => 'The ability of repeating sections is disabled.', 'caption' => 'Warning', 'box_width' => 300, 'box_height' => 72, );
    protected $_aArguments = array();
    protected $_oMsg;
    public function __construct()
    {
        $_aParameters = func_get_args() + array( $this->_aArguments, null );
        $this->_aArguments = $this->getAsArray($_aParameters[ 0 ]);
        $this->_oMsg = $_aParameters[ 1 ] ? $_aParameters[ 1 ] : SpiderSEOAdminPageFramework_Message::getInstance();
    }
    public function get()
    {
        $_aArguments = $this->_aArguments + self::$_aStructure;
        unset($_aArguments[ 0 ]);
        if (! empty($_aArguments[ 'disabled' ])) {
            $_aArguments[ 'disabled' ] = $_aArguments[ 'disabled' ] + array( 'message' => $this->_getDefaultMessage(), 'caption' => $this->_oMsg->get('warning_caption'), ) + self::$_aStructure_Disabled;
        }
        return $_aArguments;
    }
    protected function _getDefaultMessage()
    {
        return $this->_oMsg->get('repeatable_section_is_disabled');
    }
}
