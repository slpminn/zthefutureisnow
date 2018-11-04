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
					get_template_part('content-format-single',get_post_format()); 
				endwhile;
			endif;
		?>
	</div>
	<div class="col-12 col-sm-4">	
		<?php get_sidebar(); ?>
	</div>
</div>
	
<?php get_footer(); ?>