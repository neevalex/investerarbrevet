<?php get_header(); ?>
<!-- container -->

<div class="container">	
	<!-- site-content -->
	<div class="row site-content">
		<div class="col-7 articles">
			<article class="page">
				<!-- main-column -->
				<div class="inner">
				<?php
					if ( have_posts() ) :
						while ( have_posts() ) :
							the_post();
							if ( get_post_format() == false ) {
								get_template_part( 'content', 'single' );
							} else {
								get_template_part( 'content', get_post_format() );
							}
					endwhile;
					else :
						get_template_part( 'content', 'none' );
					endif;
					?>
				</div>
				<!-- /main-column -->
				<div class="pagination side">
					<?php echo paginate_links(); ?>
				</div>
			</article>
		</div>

		<div class="col-5 sidebar">
			<?php get_sidebar(); ?>
		</div>
		

	</div>
	<!-- /site-content -->

	
</div>

<!-- container -->
<?php get_footer(); ?>
