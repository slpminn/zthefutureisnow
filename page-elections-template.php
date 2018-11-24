<?php	

	/*
		Template Name: Election Template

		==================================================
			Custom template for the page election.
		==================================================	
	 */

?>

<?php get_header(); ?>	

<?php

	/*
	Sanitize Input
	The sanitize_*() class of helper functions are super nice for us, as they ensure we're ending up with safe data and require minimal effort on our part:

	    sanitize_email()
	    sanitize_file_name()
	    sanitize_html_class()
	    sanitize_key()
	    sanitize_meta()
	    sanitize_mime_type()
	    sanitize_option()
	    sanitize_sql_orderby()
	    sanitize_text_field()
	    sanitize_textarea_field()
	    sanitize_title()
	    sanitize_title_for_query()
	    sanitize_title_with_dashes()
	    sanitize_user()

	Escaping Output
	For security on the other end of the spectrum, we have escaping. To escape is to take the data you may already have and help secure it prior to rendering it for the end user.
		esc_html() – Use this function anytime an HTML element encloses a section of data being displayed.
		esc_url() – Use this function on all URLs, including those in the src and href attributes of an HTML element.
		esc_js() – Use this function for inline Javascript.
		esc_attr() – Use this function on everything else that’s printed into an HTML element’s attribute.
		esc_textarea() – encodes text for use inside a textarea element.

	 */
?>
<?php //echo get_site_url(); ?>
<?php //var_dump( $GLOBALS['wp_query'] ); ?>

<div class="row"> <!-- Main Row -->
	<div class="col-12 col-sm-8">	<!-- Content Column -->
		<div class="row"> <!-- Races Row -->
			<?php

			 if(function_exists('the_widget')) { // If the_widget is supported

			 	$instance = array(
			 				'title' => '',
			 				'banner' => '1140StateExecutiveRacesBanner.jpg',
							'races'	=> 'RACE004,RACE005,RACE006',
							'noCandidates' => '',
							'linkURL' => '',
							'linkLabel' => '',   
							'active' => '1');
			 	
			 	$args = array(
							'description'   => '',
    						'class'         => '',
							'before_widget' => '<li id="dagoMainElectionPageWidget" class="widget dagoMEP">',
							'after_widget'  => '</li>',
							'before_title'  => '<h2 class="widgettitle">',
							'after_title'   => '</h2>' );

		 		the_widget( 'DAGO_Election_Results_Widget', $instance, $args); 
		 	 
		 	 }
		 	 	
		 	?>  
	
		</div> <!-- Races Row -->
	</div> <!-- End Content Column -->
	<div class="col-12 col-sm-4">	<!-- Sidebar Column -->
		<?php get_sidebar(); ?>
	</div>	<!-- End Sidebar Column -->
</div> <!-- End Main Row --->
<?php get_footer(); ?>