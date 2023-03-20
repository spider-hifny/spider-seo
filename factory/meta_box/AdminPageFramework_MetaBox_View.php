<?php
/*
 * Admin Page Framework v3.9.1 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/spider-seo-compiler>
 * <https://en.michaeluno.jp/spider-seo>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

abstract class SpiderSEOAdminPageFramework_MetaBox_View extends SpiderSEOAdminPageFramework_MetaBox_Model {
    public function _replyToPrintMetaBoxContents($oPost, $vArgs)
    {
        $_aOutput = array();
        $_aOutput[] = wp_nonce_field($this->oProp->sMetaBoxID, $this->oProp->sMetaBoxID, true, false);
        if (isset($this->oForm)) {
            $_aOutput[] = $this->oForm->get();
        }
        $this->oUtil->addAndDoActions($this, 'do_' . $this->oProp->sClassName, $this);
        echo $this->oUtil->addAndApplyFilters($this, "content_{$this->oProp->sClassName}", $this->content(implode(PHP_EOL, $_aOutput)));
    }
    public function content($sContent)
    {
        return $sContent;
    }
}
