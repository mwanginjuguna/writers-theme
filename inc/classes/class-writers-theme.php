<?php

/**
 * Bootstraps the theme.
 *
 * @package writers
 */

namespace WRITERS_THEME\Inc;

use WRITERS_THEME\Inc\Traits\Singleton;

class WritersTheme
{
    use Singleton;

    protected function __construct()
    {
        // load class
        Assets::getInstance();
        $this->setupHooks();
    }

    protected function setupHooks() {
        // actions and filters
        add_action('after_setup_theme', [$this, 'setupTheme']);
    }

    public function setupTheme() {
        if ( ! function_exists( 'writers_theme_setup' ) ) {
            /**
             * Sets up theme defaults and registers support for various WordPress features.
             *
             * Note that this function is hooked into the after_setup_theme hook, which runs
             * before the init hook.
             */
            function writers_theme_setup()
            {
                // Add support for block styles.
                add_theme_support('wp-block-styles');

                // Enqueue editor styles.
                add_editor_style('editor-style.css');
            }
        }
        // writers_theme_setup
        add_action( 'after_setup_theme', 'writers_theme_setup' );
    }
}
