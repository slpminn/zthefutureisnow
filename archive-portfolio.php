<?php get_header(); ?>

<div class="row">
	<div class="col-12 col-sm-8">
		<?php
			if(have_posts()):
				echo '<header class="page-header">';
				echo '  ',the_archive_title('<h1 class="page-title">','</h1>');
				echo '  ',the_archive_description('<div class="taxonomy-description">','</div>');
				echo '</header>';
				while(have_posts()): the_post();
					get_template_part('content-format','archive'); 
				endwhile;
				/* Pagination
					next_posts_links and prior_posts_links work in reverse order to next_post_links and prior_post_links 
				*/
				echo '<div class="row">'; 
				echo '  <div class="col-12 text-center">';	
							the_posts_navigation();			
				echo '  </div>';	
				echo '</div>';
				/* End Pagination */		
			endif; 
		?>
	</div>
	<div class="col-12 col-sm-4">	
		<?php get_sidebar(); ?>
	</div>
</div>
	
<?php get_footer(); ?>