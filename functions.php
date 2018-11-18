<?php 
	// flush_rewrite_rules( false );  //Fixes issues with pages not found.
	// Accomplish the same by going to Setting=>Permalink=>change something=>save=>change back=>save
	/*
		==================================================
			Include Scripts
		==================================================	
	 */

	function zthefutureisnow_script_enqueue() {

		// echo get_template_directory_uri();
		// Styles 
		wp_enqueue_style( 'bootstrap', get_template_directory_uri().'/css/bootstrap.min.css', array(), '4.0.0', 'all' );
		wp_enqueue_style( 'customstyle', get_template_directory_uri().'/css/zthefutureisnow.css', array(), '1.0,0', 'all' );
		//JS
		wp_enqueue_script('jquery');
		wp_enqueue_script('bootstrapjs', get_template_directory_uri().'/js/bootstrap.min.js', array(), '4.0.0', true);
		wp_enqueue_script('customjs', get_template_directory_uri().'/js/zthefutureisnow.js', array(), '1.0.0', true);
		
	}

	add_action('wp_enqueue_scripts','zthefutureisnow_script_enqueue');

	/*
		==================================================
			Activate Menus
		==================================================	
	 */
	
	function zthefutureisnow_theme_setup() {

		add_theme_support('menus'); /* Adds the "menus" option  to the menu Appearance */

		register_nav_menu( 'headermenu', 'Header Navigation Menu' );

		register_nav_menu( 'footermenu', 'Footer Navigation Menu' );
		
	}

	add_action('init', 'zthefutureisnow_theme_setup');

	add_theme_support('custom-background'); /* Adds the "Background" option  to the menu Appearance */
	add_theme_support('custom-header'); /* Adds the "Header" option  to the menu Appearance */
	add_theme_support('post-thumbnails'); /* Adds the "Header" option  to the menu Appearance */
	add_theme_support('post-formats',array('aside','image','video','quote','link','gallery','audio')); /* Adds the "Format" dropdown when editing a post */
	add_theme_support('html5',array('search-form')); /* Convert the default search from HTML4 to HTML5 */
	/*
		==================================================
			Allows to add classes to the list itmes and the item links on the NavBar
		==================================================	
	 */

	// Add clases to the list items	
	function add_additional_class_on_li($classes, $item, $args) {
	    if($args->add_li_class) {
	        $classes[] = $args->add_li_class;
	    }
	    return $classes;
	}
	add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

	// Add classes to the links
	function add_menu_link_class( $atts, $item, $args ) {
	  if($args->add_link_class) {
	    $atts['class'] = $args->add_link_class;
	  }
	  return $atts;
	}
	add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );

	/*
		==================================================
			Widget Setup
		==================================================	
	 */

	function zthefutureisnow_widget_setup() {

		register_sidebar(
			array(
				'name'=>'Sidebar',
				'id'=>'sidebar-1',
				'class'=>'sidebar-custom',
				'description'=>'Standard Sidebar',
				'before_widget'=>'<aside id="%1$s" class="widget %2$s">',
				'after-widget'=>'</aside>',
				'before-title'=>'<h2 class="widget-title">',
				'after-title'=>'</h2>'
			)
		);

		register_sidebar(
			array(
				'name'=>'Small Sidebar',
				'id'=>'sidebar-2',
				'class'=>'sidebar-custom',
				'description'=>'Small Sidebar',
				'before_widget'=>'<aside id="%1$s" class="widget %2$s">',
				'after-widget'=>'</aside>',
				'before-title'=>'<h2 class="widget-title">',
				'after-title'=>'</h2>'
			)
		);

	}

	add_action('widgets_init','zthefutureisnow_widget_setup');

	/*
		==================================================
			Get the first paragraph in the post
		==================================================	
	 */

	function get_first_paragraph(){
	    global $post;
	    $str = wpautop( get_the_content() );
	    $str = substr( $str, 0, strpos( $str, '</p>' ) + 4 );
	    $str = strip_tags($str, '<a><strong><em>');
	    return '<p>' . $str . '</p>';
	}

	/*
		==================================================
			Get all paragraphs of the post but the first one
		==================================================	
	 */

	function get_all_paragraphs_but_first(){
	    global $post;
	    $str = wpautop( get_the_content() );
	    $str = substr( $str, (strpos( $str, '</p>')));
	    return $str;
	}

	/*
		==================================================
			Get all paragraphs of the post but the first one
		==================================================	
	 */
	
	function zthefutureisnow_get_post_id () {

		global $post;
		return $post->ID;
	
	}
 
	 /*
		==================================================
			Add custom metaboxes to posts.
		==================================================	
	 */
	require get_template_directory() . '/inc/functions-posts-metaboxes.php';

	 /*
		==================================================
			Include Walker file.
		==================================================	
	 */
	require get_template_directory() . '/inc/walker.php';

	 /*
		==================================================
			Head function.
		==================================================	
	 */
	
	function zthefutureisnow_remove_wp_version() {
		return '';
	}
	add_filter( 'the_generator', 'zthefutureisnow_remove_wp_version' );	
	//This filter tell wp to overide the version to display in the post header with blank other wise it will display: <meta name="generator" content="WordPress 4.9.8" />

	/*
		==================================================
			Custom Post Type.
		==================================================	
	 */
	require get_template_directory() . '/inc/custom-post-types.php';

	/*
		==================================================
			Custom Taxonomy.
		==================================================	
	 */
	require get_template_directory() . '/inc/custom-taxanomy.php';

 ?>
