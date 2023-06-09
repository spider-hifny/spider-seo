<?php
/*
 * Admin Page Framework v3.9.1 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/spider-seo-compiler>
 * <https://en.michaeluno.jp/spider-seo>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class SpiderSEOAdminPageFramework_Debug extends SpiderSEOAdminPageFramework_Debug_Log {
    public static function dump($asArray, $sFilePath=null, $bStackTrace=false, $iStringLengthLimit=0, $iArrayDepthLimit=0)
    {
        echo self::get($asArray, $sFilePath, true, $bStackTrace, $iStringLengthLimit, $iArrayDepthLimit);
    }
    public static function getDetails($mValue, $bEscape=true, $bStackTrace=false, $iStringLengthLimit=0, $iArrayDepthLimit=0)
    {
        $_sValueWithDetails = self::getArrayRepresentationSanitized(self::_getLegibleDetails($mValue, $iStringLengthLimit, $iArrayDepthLimit));
        $_sValueWithDetails = $bStackTrace ? $_sValueWithDetails . PHP_EOL . self::getStackTrace() : $_sValueWithDetails;
        return $bEscape ? "<pre class='dump-array'>" . htmlspecialchars($_sValueWithDetails) . "</pre>" : $_sValueWithDetails;
    }
    public static function get($asArray, $sFilePath=null, $bEscape=true, $bStackTrace=false, $iStringLengthLimit=0, $iArrayDepthLimit=0)
    {
        if ($sFilePath) {
            self::log($asArray, $sFilePath);
        }
        $_sContent = self::_getLegible($asArray, $iStringLengthLimit, $iArrayDepthLimit) . ($bStackTrace ? PHP_EOL . self::getStackTrace() : '');
        return $bEscape ? "<pre class='dump-array'>" . htmlspecialchars($_sContent) . "</pre>" : $_sContent;
    }
    public static function log($mValue, $sFilePath=null, $bStackTrace=false, $iTrace=0, $iStringLengthLimit=99999, $iArrayDepthLimit=50)
    {
        self::_log($mValue, $sFilePath, $bStackTrace, $iTrace, $iStringLengthLimit, $iArrayDepthLimit);
    }
    public static function dumpArray($asArray, $sFilePath=null)
    {
        self::showDeprecationNotice('SpiderSEOAdminPageFramework_Debug::' . __FUNCTION__, 'SpiderSEOAdminPageFramework_Debug::dump()');
        SpiderSEOAdminPageFramework_Debug::dump($asArray, $sFilePath);
    }
    public static function getArray($asArray, $sFilePath=null, $bEscape=true)
    {
        self::showDeprecationNotice('SpiderSEOAdminPageFramework_Debug::' . __FUNCTION__, 'SpiderSEOAdminPageFramework_Debug::get()');
        return SpiderSEOAdminPageFramework_Debug::get($asArray, $sFilePath, $bEscape);
    }
    public static function logArray($asArray, $sFilePath=null)
    {
        self::showDeprecationNotice('SpiderSEOAdminPageFramework_Debug::' . __FUNCTION__, 'SpiderSEOAdminPageFramework_Debug::log()');
        SpiderSEOAdminPageFramework_Debug::log($asArray, $sFilePath);
    }
}
