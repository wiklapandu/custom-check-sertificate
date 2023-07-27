<?php
/**
* Use for initilaing shortcode
*
* @package HelloElementor
*/

defined( 'ABSPATH' ) || die( "Can't access directly" );


class ShortCodeMake
{
    public function __construct()
    {
        add_action('init', [$this, 'register_custom_shortcode']);
    }

    public function register_custom_shortcode()
    {
        add_shortcode('wk_search_certificate', [$this, 'render_wk_search_certificate']);
        add_shortcode('wk_single_certificate', [$this, 'render_wk_single_certificate']);
    }

    public function render_wk_search_certificate($args)
    {
        require __DIR__ . '/view/render-wk-search-certificate.php';
    }

    public function render_wk_single_certificate($args)
    {
        require __DIR__ . '/view/render-wk-single-certificate.php';
    }
}

new ShortCodeMake;