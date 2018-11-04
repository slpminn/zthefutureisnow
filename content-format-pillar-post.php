<article id="post-cthe_ID(); ?>" <?php post_class(); ?> >
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s">', esc_url(get_permalink()) ),'</a></h2>'); ?>
	</header>
	<div class="row">
		<div class="col-12">
			<div class="thumbnail">
				<a href="<?php esc_url(get_permalink()) ?>" />
					<?php the_post_thumbnail("full",array( 'class' => 'img-fluid' ) ); ?>		
				</a>				
			</div>
		</div>
		<div class="col-12">
			<small>Posted on: <?php echo get_post_time("F d, Y g:i a"); ?></small>	
			<?php if (get_post_time() != get_post_modified_time()) : ?>
				<br /><small>Modified on: <?php echo get_post_modified_time("F d, Y g:i a"); ?></small>
			<?php endif; ?>	
			 <?php // echo the_excerpt() ; //Get the entire post ?>
		</div>
	</div>								
</article>	
