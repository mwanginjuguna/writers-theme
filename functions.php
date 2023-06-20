<?php
/**
 * Theme functions
 *
 * @package writers block
 * @since 0.1.0
 */

/**
 * die and dump - for debugging
 * @param $value
 * @return void
 */
function dd($value) {
    echo '<pre>';
    var_dump($value);
    echo '</pre>';

    wp_die();
}

// define theme path constant
if (!defined('WRITERS_THEME_DIR_PATH')) {
    define('WRITERS_THEME_DIR_PATH', untrailingslashit(get_template_directory()));
}
// define theme uri constant
if (!defined('WRITERS_THEME_DIR_URI')) {
    define('WRITERS_THEME_DIR_URI', untrailingslashit(get_template_directory_uri()));
}

// autoloader
require_once WRITERS_THEME_DIR_PATH.'/inc/helpers/autoloader.php';

// load theme instance
require_once WRITERS_THEME_DIR_PATH.'/inc/classes/class-writers-theme.php';

// initialize theme
function getWritersThemeInstance()
{
    \WRITERS_THEME\Inc\WritersTheme::getInstance();
}
getWritersThemeInstance();
