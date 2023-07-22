<?php

/**
 * Description : add all functionalities in here MF
 */
defined('ABSPATH') || die("Can't access directly");


class Class_Functions
{
    protected $settings;

    public function __construct()
    {
        $this->hook();
        $this->initialize();
    }

    /**
     * call all functions
     */
    public function hook()
    {
        add_filter("upload_mimes", [$this, "addFileTypesToUploads"]); // ini harus dipindah
    }

    /**
     * Allow .svg upload // ini harus dipindah tidak boleh function selain setup ada disini.
     */
    public function addFileTypesToUploads($file_types)
    {
        $new_filetypes = [];
        $new_filetypes["svg"] = "image/svg+xml";
        $file_types = array_merge($file_types, $new_filetypes);
        return $file_types;
    }

    /**
     * Load Script
     */
    private function autoloadScript($file_path)
    {
        foreach ($file_path as $path) {
            foreach (glob($path) as $file) {
                require_once $file;
            }
        }
    }

    /**
     * initialize
     */
    public function initialize()
    {
        // vars.
        $this->settings = array(
            // urls.
            'file'     => __FILE__,
            'basename' => plugin_basename(__FILE__),
            'path'     => plugin_dir_path(__FILE__),
            'url'      => plugins_url('/', __FILE__),
        );

        // constant
        define('IN_LOCAL', true);

        define('BASE_URL', get_site_url());
        define('BASE_DIR', rtrim(ABSPATH, '/'));

        define('PLUGIN_URL', $this->settings['url']);
        define('PLUGIN_DIR', $this->settings['path']);

        define('INCLUDES_URL', PLUGIN_URL . '/includes');
        define('INCLUDES_DIR', PLUGIN_DIR . '/includes');

        define('MODULES_URL', PLUGIN_URL . '/modules');
        define('MODULES_DIR', PLUGIN_DIR . '/modules');

        define('ASSET_IMAGE_URL', PLUGIN_URL . '/assets/images');

        /* Status Code */
        define('SUCCESS_CODE', 200);
        define('FAIL_CODE', 400);
        define('UNAUTH_CODE', 401);

        $this->autoloadScript(
            [
                MODULES_DIR . '/helper/autoload.php',
                MODULES_DIR . '/*/autoload.php',
                __DIR__ . '/setup/autoload.php'
            ]
        );
    }
}


/**
 * initiate classs Class_Functions()
 */

new Class_Functions();