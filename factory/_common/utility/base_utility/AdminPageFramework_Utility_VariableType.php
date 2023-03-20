<?php
/*
 * Admin Page Framework v3.9.1 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/spider-seo-compiler>
 * <https://en.michaeluno.jp/spider-seo>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

abstract class SpiderSEOAdminPageFramework_Utility_VariableType extends SpiderSEOAdminPageFramework_Utility_Deprecated {
    public static function isResourcePath($sPathOrURL)
    {
        if (defined('PHP_MAXPATHLEN') && strlen($sPathOrURL) > PHP_MAXPATHLEN) {
            return ( boolean ) filter_var($sPathOrURL, FILTER_VALIDATE_URL);
        }
        if (file_exists($sPathOrURL)) {
            return true;
        }
        return ( boolean ) filter_var($sPathOrURL, FILTER_VALIDATE_URL);
    }
    public static function isNotNull($mValue=null)
    {
        return ! is_null($mValue);
    }
    public static function isNumericInteger($mValue)
    {
        return is_numeric($mValue) && is_int($mValue + 0);
    }
}
