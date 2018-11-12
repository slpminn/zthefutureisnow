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
		/*	// Assigns the default taxonomy of the posts.
			'taxonomies' => array (
				'category',
				'post_tag'
			), */
			'menu_position' => 5,
			'exclude_from_search' => false,	
		);
		register_post_type('portfolio',$args);
	}
	add_action('init','zthefutureisnow_custom_post_type');

	function zthefutureisnow_custom_taxonomies() {

		// Add the new taxonomy hierarchical "work" to the custom post type "porfolio"
		
		$labels = array (
			'name' => 'Work',
			'singular_name' => 'Work',
			'search_item' => 'Search Work',
			'all_items' => 'All Works',
			'parent_item' => 'Parent Work',
			'parent_item_colon' => 'Parent Work:',
			'edit_item' => 'Edit Work',
			'update_item' => 'Update Work',
			'add_new_item' => 'Add New Work',
			'new_item_name' => 'New Work Name',
			'menu_name' => 'Work Type'
		);

		$args = array (

			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,	//Show in the Admin interface
			'show_admin_column' => true,
			'query_var' => true,
			'rewrite' => array ( 'slug' => 'work' )
		);

		register_taxonomy('work',array('portfolio'),$args);

		// Add new taxonomy non-hierarchical (Tag List) "software" to the custom post type "portfolio"
		// Strimline the creationg by skipping the $labels array.


		$args1 = array (

			'hierarchical' => false,
			'label' => 'Software',
			'show_admin_column' => true,
			'rewrite' => array ( 'slug' => 'software' )

		);

		register_taxonomy('software','portfolio',$args1);		


	}
 	add_action('init','zthefutureisnow_custom_taxonomies'); 

?>