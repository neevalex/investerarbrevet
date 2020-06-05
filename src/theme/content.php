<div class="item <?php if ( has_post_thumbnail() ) { ?>has-thumbnail <?php } ?>" data-aos="fade-up">
	<!-- post-thumbnail -->
	<div class="post-thumbnail">
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'small-thumbnail' ); ?></a>
	</div>
	<!-- /post-thumbnail -->

	<!-- inner-content -->
	<div class="inner-content">
		<h3 class="item-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<p class="post-info">
			<?php echo get_the_excerpt(); ?>
	</div>
	<!-- /inner-content -->
</div>


