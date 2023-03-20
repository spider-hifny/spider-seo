<?php
/*
 * Admin Page Framework v3.9.1 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/spider-seo-compiler>
 * <https://en.michaeluno.jp/spider-seo>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class SpiderSEOAdminPageFramework_Factory_View__SettingNotice extends SpiderSEOAdminPageFramework_FrameworkUtility {
    public $oFactory;
    public function __construct($oFactory, $sActionHookName='admin_notices')
    {
        $this->oFactory = $oFactory;
        add_action($sActionHookName, array( $this, '_replyToPrintSettingNotice' ));
    }
    public function _replyToPrintSettingNotice()
    {
        if (! $this->___shouldProceed()) {
            return;
        }
        $this->oFactory->oForm->printSubmitNotices();
    }
    private function ___shouldProceed()
    {
        if (! $this->oFactory->isInThePage()) {
            return false;
        }
        if ($this->hasBeenCalled(__METHOD__)) {
            return false;
        }
        return true;
    }
}
