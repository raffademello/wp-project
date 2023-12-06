<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel='icon' href='favicon.ico' type='image/x-icon' />
	<link rel="preload" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/main.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css" />
	<noscript>
		<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/dist/main.min.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;600;700&display=swap" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

	</noscript>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header class="site-header relative bg-white border-gray-200 px-4 lg:px-6 py-5 dark:bg-gray-800 border-solid border-b-2 border-b-white">
		<div class="container mx-auto px-10">
			<div class="flex justify-between items-center">
				<div class="logo">
					<h2 class="text-white font-bold text-2xl"><a href="<?php echo get_home_url(); ?>"><?php echo get_bloginfo('name'); ?></a></h2>
				</div><!-- END col md 6 -->

				<nav class="navbar navbar-expand-lg">
					<a href="#" class="toggle-mnu block lg:hidden"><span></span></a>
					<?php
					wp_nav_menu(array(
						'theme_location' => 'header-menu',
						'menu_id' => 'primary-menu',
						'container_class' => 'hidden lg:block',
						'container_id' => 'primary-menu-container',
						'menu_class' => 'navbar-nav'
					));
					?>
				</nav><!-- #site-navigation -->
			</div><!-- END row -->
		</div><!-- END container -->
	</header>