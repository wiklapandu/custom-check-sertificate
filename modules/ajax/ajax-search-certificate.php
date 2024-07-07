<?php
/**
 * The template for Create Custom Ajax used in WP-admin
 *
 * Author: Andi, Muhammad Rizki, Angit Joko Tarup
 *
 * Note :
 *
 * @package HelloElementor
 */
defined( 'ABSPATH' ) || die( "Can't access directly" );

class AjaxSearchCertificate extends SanitizeAndValidate{

	private $_data = array(
		'nonce' => false,
		'search'  => null,
	);

	public function __construct()
	{
		add_action('wp_ajax_SearchCertificate', [$this, 'ajax']);
		add_action('wp_ajax_nopriv_SearchCertificate', [$this, 'ajax']);
	}

	public function ajax()
	{

		$this->_data = $this->main($this->_data,$_POST,'NonceSearchCertificate');
		$this->_response();
	}

	private function _response()
	{
		$query_args = [
			'post_type' => 'certificate-cpt',
			'posts_per_page' => -1,
		];

		$query_args['meta_query'] = [
			[
				'key'   => 'certificate_no',
				'value' => $this->_data['search']
			]
		];

		$query = new WP_Query($query_args);

		if($query->post_count < 1) {
			wp_send_json_error([
				'message' => 'Certificate not found. please check back number of certificate',
			], 400);
		}

		wp_send_json_success([
			'post' => $this->_mapping_post($query->post)
		]);
	}

	private function _mapping_post(WP_Post $post)
	{
		return CertificateModel::get($post);
	}
}
new AjaxSearchCertificate();


