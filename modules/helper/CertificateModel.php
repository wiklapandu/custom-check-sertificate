<?php
/**
* Use for description
*
* @package HelloElementor
*/

defined( 'ABSPATH' ) || die( "Can't access directly" );

class CertificateModel
{
    public static function get(WP_Post $post)
	{
		$date_valid = strtotime(str_replace('/', '-',get_field('valid_until', $post->ID)));
		return [
			'ID' => $post->ID,
			'title' => $post->post_title,
			'permalink' => get_permalink($post),
			'post_content' => $post->post_content,
			'certificate_number' => get_field('certificate_no', $post->ID),
			'company_name'  => get_field('company_name', $post->ID),
			'company_address'  => get_field('company_address', $post->ID),
			'date_of_issue'  => get_field('date_of_issue', $post->ID),
			'product_category'  => get_field('product_category', $post->ID),
			'manufacturer_address'  => get_field('manufacturer_address', $post->ID),
			'products'		=> get_field('products', $post->ID),
			'valid_until'	=> date('Y-m-d', $date_valid),
			'post_date'		=> $post->post_date,
			'title_galery'	=> get_field('title_gallery', $post->ID),
			'galleries'		=> get_field('galleries', $post->ID),
		];
	}
}