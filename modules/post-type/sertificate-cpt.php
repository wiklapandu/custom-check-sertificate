<?php
/**
* Use for creating cpt sertificate
*
* @package HelloElementor
*/

defined( 'ABSPATH' ) || die( "Can't access directly" );

class SertificateCPT extends RegisterCPT
{
    protected $post_type;
    public function __construct()
    {
        $this->post_type = 'certificate-cpt';
        add_action('init', [$this, 'create_cpt']);
        // add_filter('template_include', [$this, 'loop_certificate_cpt']);
    }

    public function create_cpt()
    {
        $title = 'Certificate';
        $slug_cpt = $this->post_type;
        $args = [
            'menu_position' => 15,
            'supports' => array('title'),
            'menu_icon' => 'dashicons-media-document'
        ];

        $this->customPostType($title, $slug_cpt, $args);
    }

    public function loop_certificate_cpt($template)
    {
        if(is_singular($this->post_type)) {
            return require __DIR__ . '/template-part/single.php';
        }
        return $template;
    }
}

new SertificateCPT;