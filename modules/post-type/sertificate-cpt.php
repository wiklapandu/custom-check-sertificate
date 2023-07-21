<?php
/**
* Use for creating cpt sertificate
*
* @package HelloElementor
*/

defined( 'ABSPATH' ) || die( "Can't access directly" );

class SertificateCPT extends RegisterCPT
{
    public function __construct()
    {
        add_action('init', [$this, 'create_cpt']);
    }

    public function create_cpt()
    {
        $title = 'Certificatee';
        $slug_cpt = 'certificatee-cpt';
        $args = [
            'menu_position' => 15,
            'supports' => array('title'),
            'menu_icon' => 'dashicons-media-document'
        ];

        $this->customPostType($title, $slug_cpt, $args);
    }
}

new SertificateCPT;