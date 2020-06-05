<?php

/**
 * Functions
 * Require all PHP files in the /setup/ directory
 */
function require_all($dir, $depth = 0)
{
	if ($depth > 3) {
		return;
	}

	// require all php files
	$scan = glob("$dir/*");
	foreach ($scan as $path) {
		if (preg_match('/\.php$/', $path)) {
			require_once $path;
		} elseif (is_dir($path)) {
			require_all($path, $depth + 1);
		}
	}
}

require_all(get_template_directory() . '/setup/');

function wordpressify_resources() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_enqueue_script( 'header_js', get_template_directory_uri() . '/js/header-bundle.js', null, 1.0, false );
	wp_enqueue_script( 'footer_js', get_template_directory_uri() . '/js/footer-bundle.js', null, 1.0, true );
}

add_action( 'wp_enqueue_scripts', 'wordpressify_resources' );

// Customize excerpt word count length
function custom_excerpt_length() {
	return 22;
}

add_filter( 'excerpt_length', 'custom_excerpt_length' );

show_admin_bar( false );

// Checks if there are any posts in the results
function is_search_has_results() {
	return 0 != $GLOBALS['wp_query']->found_posts;
}

// Add Widget Areas
function wordpressify_widgets() {
	register_sidebar(
		array(
			'name'          => 'Sidebar',
			'id'            => 'sidebar1',
			'before_widget' => '<div class="widget-item">',
			'after_widget'  => '</div>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}

add_action( 'widgets_init', 'wordpressify_widgets' );


function wpb_rand_posts($num=6) { 
 
	$args = array(
		'post_type' => 'post',
		'orderby'   => 'rand',
		'posts_per_page' => $num, 
		);
	 
	$the_query = new WP_Query( $args );
	 
	if ( $the_query->have_posts() ) {
	 
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
	
			$string .= '
			<div class="item" data-aos="fade-up">
				<!-- post-thumbnail -->
				<div class="post-thumbnail">
					<a href="'.get_the_permalink().'">'.get_the_post_thumbnail( get_the_ID(),'small-thumbnail' ).'</a>
				</div>
				<!-- /post-thumbnail -->

				<!-- inner-content -->
				<div class="inner-content">
					<h3 class="item-title"><a href="'.get_the_permalink().'">'.get_the_title().'</a></h3>
					<p class="post-info">'.get_the_excerpt().'</p>
				</div>
				<!-- /inner-content -->
			</div>';

		}
		
		wp_reset_postdata();
	} 
	 
	return '<div class="articles related_posts"><div class="inner">'.$string.'</div></div>'; 
} 
