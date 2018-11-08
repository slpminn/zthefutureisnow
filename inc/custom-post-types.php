<?php 

	/*
		==================================================
			Custom Post Type.
		==================================================
		Documentation: https://codex.wordpress.org/Function_Reference/register_post_type	
	 */
	
	function zthefutureisnow_custom_post_type() {

		$labels = array (
			'name' => 'Portfolio',
			'singular_name' => 'Portfolio',
			'add_new' => 'Add Item',
			'all_items' => 'All Items',
			'add_new_item' => 'Add Item',
			'edit_item' => 'Edit Item',
			'new_item' => 'New Item',
			'view_item'	=> 'View Item',
			'search_item' => 'Search Portfolio',
			'not_found' => 'No items found',
			'not_found_in_trash' => 'No items found in trash',
			'parent_item_colon' => 'Parent Item',
		);
		$args = array (
			'labels' => $labels,
			'public' => true,
			'has_archive' => true,
			'publicly_queryable' => true,
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array (
				'title',
				'editor',
				'excerpt',
				'thumbnail',
				'revision',
			),
			'taxonomies' => array (
				'category',
				'post_tag'
			),
			'menu_position' => 5,
			'exclude_from_search' => false,	
		);
		register_post_type('portfolio',$args);
	}
	add_action('init','zthefutureisnow_custom_post_type'); 

?>