<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="author" content="Luan Gjokaj, and WordPressify contributors" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header id="header" class="header">
		<div class="container toprow">
			<div class="row">
				<div class="col-12">
					Denna sida är en annonsbilaga med nyheter för investeraren från Laika Consulting.
					<img class="search-toggle" src="<?php echo get_template_directory_uri();?>/img/ecommerce-icon-search.svg" alt="Search">
					<div class="search">
						<input type="text" action="s" name="search" placeholder="Sök bland artiklar - skriv in ditt sökord" />
					</div>
					
				</div>
			</div>
		</div>
		<div class="container header-menu">
			<div class="row">
				<div class="col-8 col-md-4">
					<div class="logo align-middle">
						<a href="/"><img src="<?php echo get_template_directory_uri();?>/img/investerarbrevet-logo-white.svg" alt="<?php echo get_bloginfo( 'name' ); ?>"></a>
					</div>
				</div>

				<div class="col-4 col-md-8 menu-col">
					<div class="main-menu">
						<?php wp_nav_menu( array('theme_location' => 'main_menu') ); ?>
						<img class="menu_toggle" src="<?php echo get_template_directory_uri();?>/img/menu.svg" alt="<?php echo get_bloginfo( 'name' ); ?>">
					</div>
				</div>
				
			</div>
		</div>
	
</header>
