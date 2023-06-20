<?php

/**
 * Enqueue theme assets.
 *
 * @package writers
 */

namespace WRITERS_THEME\Inc;

use WRITERS_THEME\Inc\Traits\Singleton;

/**
 * class for theme assets
 */
class Assets
{
    use Singleton;

    // asset variables - used for ordering page and calculating price as necessary
    public array $currencies; // supported currencies
    public array $lineSpacing; // supported line spacings
    public array $rates; // pricing policy
    public array $levels; // nature of task or academic level
    public array $services; // services offered
    public array $subjects; // subjects and disciplines
    public array $writerCategories; // available categorization of writers
    public array $referencingStyles; // supported referencing or citation styles

    protected function __construct()
    {
        // init class
        $this->setup_hooks();

        $this->currencies = $this->get_data_from_json_files_assets('currencies');
        $this->lineSpacing = $this->get_data_from_json_files_assets('line-spacings');
        $this->referencingStyles = $this->get_data_from_json_files_assets('referencing-styles');
        $this->services = $this->get_data_from_json_files_assets('service-types');
        $this->subjects = $this->get_data_from_json_files_assets('subjects');
        $this->levels = $this->get_data_from_json_files_assets('task-levels');
        $this->writerCategories = $this->get_data_from_json_files_assets('writer-categories');
        $this->rates = $this->get_data_from_json_files_assets('pricing');

    }

    /**
     * Actions and Filters
     * @return void
     */
    protected function setup_hooks()
    {
        /**
         * actions
         */
        add_action('wp_enqueue_scripts', [$this, 'enqueue_jquery']);
        add_action('wp_enqueue_scripts', [$this, 'registerStyles']);
        add_action('wp_enqueue_scripts', [$this, 'registerScripts']);
    }

    function enqueue_jquery() {
        wp_enqueue_script('jquery');
    }

    public function registerStyles()
    {
        // register styles
        wp_register_style('style-css', get_stylesheet_uri(), [], $this->getThemeVersion(), 'all');
        wp_register_style('bootstrap-css', WRITERS_THEME_DIR_URI . '/assets/bootstrap/css/bootstrap.min.css', array(), '5.3.0', 'all');
        // enqueue styles
        wp_enqueue_style('style-css');
        wp_enqueue_style('bootstrap-css');
    }

    public function registerScripts()
    {
        $version = $this->getThemeVersion();

        // register json dependencies
        wp_register_script('pricing-json', WRITERS_THEME_DIR_URI.'/assets/json_files/pricing.json', array(), $version, true);
        wp_register_script('subjects-json', WRITERS_THEME_DIR_URI.'/assets/json_files/subjects.json', array(), $version, true);
        wp_register_script('line-spacings-json', WRITERS_THEME_DIR_URI.'/assets/json_files/line-spacings.json', array(), $version, true);
        wp_register_script('referencing-styles-json', WRITERS_THEME_DIR_URI.'/assets/json_files/referencing-styles.json', array(), $version, true);
        wp_register_script('currencies-json', WRITERS_THEME_DIR_URI.'/assets/json_files/currencies.json', array(), $version, true);
        wp_register_script('task-levels-json', WRITERS_THEME_DIR_URI.'/assets/json_files/task-levels.json', array(), $version, true);
        wp_register_script('service-types-json', WRITERS_THEME_DIR_URI.'/assets/json_files/service-types.json', array(), $version, true);

        // register scripts
        wp_register_script('popper-js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array('jquery'), '1.14.7', true);
        wp_register_script('bootstrap-js', WRITERS_THEME_DIR_URI . '/assets/bootstrap/js/bootstrap.min.js', array('jquery', 'popper-js'), '5.3.0', true);
        wp_register_script('writing-theme-main-js', WRITERS_THEME_DIR_URI.'/assets/js/main-app.js', array('jquery', 'pricing-json', 'subjects-json', 'line-spacings-json', 'referencing-styles-json', 'currencies-json', 'task-levels-json', 'service-types-json'), $version, true);

        // enqueue script
        wp_enqueue_script('popper-js');
        wp_enqueue_script('bootstrap-js');
        wp_enqueue_script('writing-theme-main-js');
    }

    protected function getThemeVersion()
    {
        // Get the current theme version
        return wp_get_theme()->get('Version');
    }


    public function get_data_from_json_files_assets($filename) {
        // Set the file path
        $file_path = WRITERS_THEME_DIR_URI."/assets/json_files/$filename.json";

        // Read the JSON file
        $json_data = file_get_contents($file_path);

        // Parse the JSON data into an array
        $parsed_data = json_decode($json_data, true);

        // Return the parsed data
        return $parsed_data;
    }

}
