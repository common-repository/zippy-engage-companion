<?php
/*
Plugin Name: Zippy Engage Companion
Description: Automatically add the Zippy Engage embed code to your site.
Version:     1.0.2
Author:      Zippy Engage <support@zippyengage.com>
Author URI:  https://zippyengage.com/
*/

require_once(dirname(__FILE__) . '/src/Core.php');
require_once(dirname(__FILE__) . '/src/Api.php');

new ZippyEngageCore;


function zippy_engage_root_dir()
{
    return dirname(__FILE__);
}

function zippy_engage_plugins_url($path)
{
    return plugins_url($path, __FILE__);
}
