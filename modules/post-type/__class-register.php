<?php

class RegisterCPT
{

	public function customPostType($label_name, $slug, $args = [])
	{
		$defaultArgument = $this->defaultArgument($label_name, $slug);

		if (!empty($args)) {
			foreach ($args as $key => $value) {
				$defaultArgument[$key] = $value;
			}
		}

		register_post_type($slug, $defaultArgument);
	}

	public function taxonomy($slug_cpt, $slug_tax, $args = [])
	{
		$defaultArgument = [
			'label' => __('Category'),
			'hierarchical' => true,
			'query_var' => true,
		];

		if (!empty($args)) {
			foreach ($args as $key => $value) {
				$defaultArgument[$key] = $value;
			}
		}
		register_taxonomy(
			$slug_tax,
			$slug_cpt,
			$defaultArgument
		);
	}

	protected function label($label_name)
	{
		$labels = array(
			'name'                  => _x($label_name, $label_name . ' General Name'),
			'singular_name'         => _x($label_name, 'Post Type Singular Name'),
			'menu_name'             => __($label_name),
			'name_admin_bar'        => __($label_name),
			'archives'              => __($label_name . ' Archives'),
			'attributes'            => __($label_name . ' Attributes'),
			'parent_item_colon'     => __('Parent ' . $label_name . ':'),
			'all_items'             => __('All ' . $label_name),
			'add_new_item'          => __('Add New ' . $label_name),
			'add_new'               => __('Add New'),
			'new_item'              => __('New ' . $label_name),
			'edit_item'             => __('Edit ' . $label_name),
			'update_item'           => __('Update ' . $label_name),
			'view_item'             => __('View ' . $label_name),
			'view_items'            => __('View ' . $label_name),
			'search_items'          => __('Search ' . $label_name),
			'not_found'             => __('Not found'),
			'not_found_in_trash'    => __('Not found in Trash'),
			'featured_image'        => __('Featured Image'),
			'set_featured_image'    => __('Set featured image'),
			'remove_featured_image' => __('Remove featured image'),
			'use_featured_image'    => __('Use as featured image'),
			'insert_into_item'      => __('Insert into item'),
			'uploaded_to_this_item' => __('Uploaded to this ' . $label_name),
			'items_list'            => __($label_name . ' list'),
			'items_list_navigation' => __($label_name . ' list navigation'),
			'filter_items_list'     => __('Filter ' . $label_name . ' list'),
		);

		return $labels;
	}

	private function defaultArgument($label_name, $slug)
	{

		$label_data = $this->label($label_name);

		$args = array(
			'label'                 => __($label_name),
			'description'           => __($label_name . ' Description'),
			'labels'                => $label_data,
			'supports'              => array('title', 'editor', 'thumbnail'),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_icon'             => 'dashicons-admin-post',
			'menu_position'         => 5,
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'rewrite'               => array('slug' => $slug),
			'capability_type'       => 'page',
		);
		return $args;
	}
}