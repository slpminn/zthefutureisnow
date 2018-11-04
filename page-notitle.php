<?php /* Template Name:  Template Page No Title */ ?>

<?php get_header(); ?>

<?php 
	
	if(have_posts()):

		while(have_posts()): the_post();

			echo "<small>Posted on: ", get_post_time('F d, Y g:i a'), "</small>";
			
		/*	if (get_post_time() <> get_post_modified_time())
				echo "<small>Modified on: ", get_post_modified_time('F d, Y g:i a'), "</small>"; */
			
			echo the_content();

		endwhile;

	endif;
?>

<?php get_footer(); ?>