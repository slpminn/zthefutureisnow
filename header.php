<!doctype html>
<html>
	
	<head>
		
		<meta charset="utf-8">
	
		<title>Z the future is now</title>
	
		<?php wp_head(); ?>
	
	</head>	
	
	<?php 
		
		if( is_front_page() ):

			$zthefutureisnow_classes = array('front-page-class', 'my-class');

		else:

			$zthefutureisnow_classes = array('my-class');

		endif; 

	 ?>

	<body <?php body_class( $zthefutureisnow_classes ); ?> >

		
		<div class="container-fluid"> <!-- Begining content-fluid -->
			<div class="row">
				<div class="col">
					<?php if( is_front_page() ) : ?>
						<img src="<?php header_image(); ?>" 
						class="img-fluid"
						alt="Header Image Aqueduct of Segovia"/>
					<?php endif; ?>
				</div>
			</div>				
			<div class="row">
				<div class="col">

					<nav class="navbar navbar-expand-lg navbar-light bg-light">
					  <a class="navbar-brand" href="#">Z the Future is Now</a>
					  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					    <span class="navbar-toggler-icon"></span>
					  </button>
					  <div class="collapse navbar-collapse" id="navbarSupportedContent">
						<?php 
							/* 'container' => false, tells WP to not to wrap the menu in a div.
							   'menu_class' => 'navbar-nav mr-auto', tells WP to add a class to the ul
							   'add_li_class' => nav-item', tells WP to add a class to the list items.  'add_li_class' is a custom argument
							   		defined on the function add_additional_class_on_li() that takes the class/es to add to the list items.
							   'add_link_class' => nav-item', tells WP to add a class to the items link.  'add_link_class' is a custom argument		defined on the function add_menu_link_class() that takes the class/es to add to the items link.
							 */  
							wp_nav_menu(array(
									'theme_location' => 'headermenu',
									'container' => false,
									'menu_class' => 'navbar-nav mr-auto',
									'add_li_class'  => 'nav-item',
									'add_link_class'   => 'nav-link',
									'depth' => 2,									
								)
							);   
						?> 
						<div class="search-form-container form-inline">
								<?php get_search_form(); ?>
						</div>
					  </div>
					</nav>
				</div>	
			</div>
		<?php /* By using the hook header_image, WordPress will display the image set in the Header */ ?>

