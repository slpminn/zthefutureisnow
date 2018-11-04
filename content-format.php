<article id="post-cthe_ID(); ?>" <?php post_class(); ?> >
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s">', esc_url(get_permalink()) ),'</a></h2>'); ?>
		<small>Posted on: <?php echo get_post_time("F d, Y g:i a"); ?></small>	
		<?php if (get_post_time() <> get_post_modified_time()) : ?>
			<br /><small>Modified on: <?php echo get_post_modified_time("F d, Y g:i a"); ?></small>
		<?php endif; ?>	
	</header>
	<div class="row">
		<?php if( has_post_thumbnail() ) : ?>
			<?php if( is_single() ) : ?>
				<div class="col-12">
					<div class="thumbnail">
						<?php the_post_thumbnail("full",array( 'class' => 'img-fluid' ) ); ?>						
					</div>
				</div>
				<div class="col-12">
					<?php echo the_content(); //Get the entire post ?>
				</div>
			<?php else : ?>
				<div class="col-12 col-sm-3">
					<div class="thumbnail">
						<?php the_post_thumbnail("full",array( 'class' => 'img-fluid' ) ); ?>	
					</div>
				</div>
				<div class="col-12 col-sm-9">
					<?php echo get_first_paragraph(); //Get the first paragraph in the post ?>
				</div>
			<?php endif ?>	
		<?php else : ?>
			<div class="col-12">
				<?php if( is_single() ) : ?>
					<?php echo the_content(); ?>
				<?php else : ?>
					<?php echo get_first_paragraph(); //Get the first paragraph in the post ?>
				<?php endif ?>	
			</div>
		<?php endif; ?>	
	</div>								
	<small>	<?php echo the_tags( $before = null, $sep = ', ', $after = '' ); ?></small>
</article>	
