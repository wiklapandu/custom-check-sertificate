<?php
/**
* Initialing Enqueue
*
* Author: Wikla
* 
* Note : 
* 
*
* @package HelloElementor
*/

defined( 'ABSPATH' ) || die( "Can't access directly" );


class Enqueue
{
    public function __construct()
    {
        add_action("wp_enqueue_scripts", [$this, "frontEnd"]);
        add_filter('script_loader_tag', [$this, 'mind_defer_scripts'], 10, 3);
    }

    function frontEnd()
    {
        wp_enqueue_style(
            "frontend_style",
            PLUGIN_URL . "/assets/dist/css/style.min.css",
            [],
            filemtime(PLUGIN_DIR . "/assets/dist/css/style.min.css")
        );

        wp_enqueue_script(
            "vendor_script",
            PLUGIN_URL . "/assets/dist/js/vendor.min.js",
            ["jquery"],
            filemtime(PLUGIN_DIR . "/assets/dist/js/vendor.min.js"),
            true
        );

        wp_enqueue_script(
            "frontend_script",
            PLUGIN_URL . "/assets/dist/js/script.min.js",
            ["jquery"],
            filemtime(PLUGIN_DIR . "/assets/dist/js/script.min.js"),
            true
        );

        $ajax_search_certificate = [
            'action' => 'SearchCertificate',
            'nonce' => wp_create_nonce('NonceSearchCertificate')
        ];

        /**
         * enqueue Example Ajax
         */
        wp_localize_script(
            'frontend_script', // Ajax Name
            'const_ajax', // Object name parameter
            [
                'url_admin_ajax'        => admin_url('admin-ajax.php'),
                'ajax_search_certificate'=> $ajax_search_certificate,
            ]
        );
    }

    public function mind_defer_scripts($tag, $handle, $src)
    {
        $defer = array(
            'vendors_script'
        );

        if (in_array($handle, $defer)) {
            return '<script src="' . $src . '" defer="defer" type="text/javascript"></script>' . "\n";
        }

        return $tag;
    }
}

/*
 * initialize
 * */
new Enqueue();