<?php get_header(); ?>
<!-- container -->
<div class="container">	
	<!-- site-content -->
	<div class="row site-content">
		<div class="col-xl-7 col-lg-8 col-md-6 col-sm-12 col-12 articles">
			<article class="page">
				<!-- main-column -->
				<div class="inner">
					<?php
						if ( have_posts() ) :
							while ( have_posts() ) :
								the_post();
								get_template_part( 'content', get_post_format() );
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

		<div class="col-xl-5 col-lg-4 col-md-6 col-sm-12 col-12 sidebar">
			<?php get_sidebar(); ?>
		</div>
		

	</div>
	<!-- /site-content -->

	
</div>
<!-- /container -->
<?php get_footer(); ?>
