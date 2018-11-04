<article id="post-cthe_ID(); ?>" <?php post_class(); ?> >
<div class="row">	
	<?php if( has_post_thumbnail() ) : ?>
		<div class="col-12">
			<div class="thumbnail">
				<a href="<?php esc_url(get_permalink()) ?>" />
					<?php the_post_thumbnail("full",array( 'class' => 'img-fluid' ) ); ?>		
				</a>				
			</div>
		</div>	
		<div class="col-12">
			<header class="entry-header">
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s">', esc_url(get_permalink()) ),'</a></h2>'); ?>
			</header>
			<small>Posted on: <?php echo get_post_time("F d, Y g:i a"); ?></small>	
			<?php if (get_post_time() != get_post_modified_time()) : ?>
					<br /><small>Modified on: <?php echo get_post_modified_time("F d, Y g:i a"); ?></small>
			<?php endif; ?>	
			<br /><small>Categories:<?php the_category(', ') ?> 
						|| <?php the_tags(); ?> 
						|| <?php edit_post_link(); ?></small>
			<?php echo the_content() ; //Get the entire post ?>
			<hr>
			/* Pagination
				next_posts_links and prior_posts_links work in reverse order to next_post_links and prior_post_links 
			*/
			<div class="row">
				<div class="col-6 text-left"><?php previous_post_link(); ?></div>
				<div class="col-6 text-right"><?php next_post_link(); ?></div>
			</div>
			<hr>	
			<?php if(comments_open()) comments_template(); ?>
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
			<br /><small>Categories:<?php the_category(', ') ?> 
						|| <?php the_tags(); ?> 
						|| <?php edit_post_link(); ?></small>
			<?php echo the_content() ; //Get the entire post ?>
			<hr>
			<div class="row">
				<div class="col-6 text-left"><?php previous_post_link(); ?></div>
				<div class="col-6 text-right"><?php next_post_link(); ?></div>
			</div>
			<hr>				
			<?php if(comments_open()) comments_template(); ?>			
		</div>
	<?php endif ?>
</div>								
</article>	