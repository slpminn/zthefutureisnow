<!--  
		Filename:single.php
		Overrides the default single post format form for Wordpress
		We can have different single.php files per each format.
		Ex:	single-aside.php, single-blog.php
-->	

<?php get_header(); ?>

<div class="row">
	<div class="col-12 col-sm-8">
		<?php			
			if(have_posts()):
				while(have_posts()): the_post();
					echo "<article id=\"post-", the_ID(), "\"", post_class(), ">";
					the_title('<h1 class="entry-title">','</h1>');
					if (has_post_thumbnail()) :
						echo '<div class="pull-right">', the_post_thumbnail('thumbnail'), '</div>';
					endif; 
					// Look thru custom taxonomy "work".	
					
					echo "<small>";
					// Custom Taxonomy can not be retrieve with the default functions to 
					// get_categories() or get_tags()	
					$returnCat = zthefutureisnow_get_custom_taxanomy($post->ID, 'work');
					$returnTag = zthefutureisnow_get_custom_taxanomy($post->ID, 'software');
					echo $returnCat;						
					if (strlen($returnCat) > 0 && strlen($returnTag) > 0) echo " | ";
					echo $returnTag;

					echo ' ', edit_post_link(); 

					echo "</small>";

					the_content();
					echo '</article>';

				endwhile;
			endif;
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
		?>
	</div>

	<div class="col-12 col-sm-4">	
		<?php get_sidebar(); ?>
	</div>
</div>
	
<?php get_footer(); ?>