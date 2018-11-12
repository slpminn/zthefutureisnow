	<?php get_header(); ?>

<div class="row">
	<div class="col-12 col-sm-8">
		<?php
			/* 
				To override the number of posts per page setup by Settings=>Reading Settings=>Reading
				User the query_posts() function.
				Use the parameters posts_per_page and paded (current page number).
				The paged parameter can not be page zero, so we need to check.
			
			 	Simplified If statement: If get_query_value is not 0, the value of get_query_value, else 1.
			 */	
			$currentPage = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = array('posts_per_page' => 5, 'paged' => $currentPage);
			query_posts($args); 			 			
			if(have_posts()):
				while(have_posts()): the_post();
					get_template_part('content-format','search'); 
				endwhile;
				/* Pagination
					next_posts_links and prior_posts_links work in reverse order to next_post_links and prior_post_links 
				*/
				echo '<div class="row">'; 
				echo '<div class="offset-sm-3 col-6 col-sm-3 text-left">';				
				next_posts_link('<< Older Posts'); 
				echo '</div>';	
				echo '<div class="col-6 col-sm-3">';
				previous_posts_link('Newer Posts >>'); 
				echo '</div>';		
				echo '</div>';
				/* End Pagination */		
			endif; 
			wp_reset_query();
		?>
	</div>
	<div class="col-12 col-sm-4">	
		<?php get_sidebar(); ?>
	</div>
</div>
	
<?php get_footer(); ?>