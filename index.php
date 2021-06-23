<?php

/**
 * Plugin Name: ShortCode Plugin
 * Plugin URI:
 * Description: Плагин для организации работы предприятия
 * Version: v2
 * Requires at least:
 * Requires PHP: 7.3
 * Author: Author Shortcode
 * Author URI: https://instagram.com/plugins
 * License: GPL v2 or Later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: ShortCode Plugin
 * Domain Path: /lang
 **/

defined('ABSPATH') or die('Hey, you can\t access this file, you silly human!');

class Shortcode_Plugin
{

    public function __construct()
    {
        add_action('admin_menu', array($this, 'add_my_menu_page'));
        add_shortcode('shortcode_feedback_form', array($this, 'shortcode_feedback_form'));

    }

    public function add_my_menu_page()
    {
        add_menu_page("ShortCode Options", "ShortCode", 4, "ShortCode options", array($this, "short_code_menu"));
        add_submenu_page("ShortCode-options", "Option 1", "Option 1", 4, "ShortCode-option-1", "option2");
        add_options_page('My Plugin Options', 'My Plugin', 8, 'your-unique-identifier', 'my_plugin_options');
    }

    public function shortcode_feedback_form()
    {
        $shortcode = file_get_contents(__DIR__ . "/templates/shortcode.html");

        return $shortcode;
    }

    public function option2()
    {
        echo "shortcode plugin";
    }

    public function short_code_menu()
    {
        $shortcode = file_get_contents(__DIR__ . "/templates/index.html");
        echo $shortcode;
    }

    public function activate()
    {
        echo "The plugin was activate";

    }

    public function deactivate()
    {
        echo "The plugin was deactivate";

    }

    public function uninstall()
    {
        echo "The plugin was uninstall";
    }

}

if (class_exists('Shortcode_Plugin')) {
    $ShortcodePlugin = new Shortcode_Plugin();
}


register_activation_hook(__FILE__, array($ShortcodePlugin, 'activate'));
register_deactivation_hook(__FILE__, array($ShortcodePlugin, 'activate'));
