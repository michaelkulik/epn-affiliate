<?php
/*
Plugin Name: Epn-Affiliate
Description: This plugin generates affiliate links from regular links to goods aliexpress.com.
Author: Michael Kulik
Author URI: http://vk.com/michaelkulik
Version: 1.0
*/

add_filter('content_save_pre', 'modify_links');

function modify_links($content)
{
    $deeplink = 'http://alipromo.com/redirect/cpa/f/some_hash/';
    return preg_replace_callback_array([
        "#[^=](https://.+?\.aliexpress.com/.+?)\"#" => function($matches) use ($deeplink) {
            return $deeplink . "?to=" . $matches[1];
        }
    ], $content);
}

