<article id="post-cthe_ID(); ?>" <?php post_class(); ?> >
<div class="row">	
	<?php if( has_post_thumbnail() ) : ?>
		<div class="col-12 col-sm-9">
			<header class="entry-header">
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s">', esc_url(get_permalink()) ),'</a></h2>'); ?>
			</header>
			<small>Posted on: <?php echo get_post_time("F d, Y g:i a"); ?></small>	
			<?php if (get_post_time() != get_post_modified_time()) : ?>
					<br /><small>Modified on: <?php echo get_post_modified_time("F d, Y g:i a"); ?></small>
			<?php endif; ?>	
			<?php echo the_excerpt() ; //Get the entire post ?>
		</div>
		<div class="col-12 col-sm-3">
			<div class="thumbnail">
				<a href="<?php esc_url(get_permalink()) ?>" />
					<?php the_post_thumbnail("full",array( 'class' => 'img-fluid' ) ); ?>		
				</a>				
			</div>
		</div>	
	<?php else : ?>
		<div class="col-12">
			<header class="entry-header">
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s">', esc_url(get_permalink()) ),'</a></h2>'); ?>
			</header>
			<small>Posted on: <?php echo get_post_time("F d, Y g:i a"); ?></small>	
			<?php if (get_post_time() != get_post_modified_time()) : ?>
					<br /><small>Modified on: <?php echo get_post_modified_time("F d, Y g:i a"); ?></small>
			<?php endif; ?>	
			<?php echo the_excerpt() ; //Get the entire post ?>
		</div>
	<?php endif ?>
</div>								
</article>	 
