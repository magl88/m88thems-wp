<?php
/**
 * Шаблон шапки (header.php)
 * @package WordPress
 * @subpackage m88thems-wp
 */
?><!DOCTYPE html>
<html lang="en">
<head>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--	==========================-->
	<meta name="theme-color" content="#000">
	<meta name="msapplication-navbutton-color" content="#000">
	<meta name="apple-mobile-web-app-status-bar-style" content="#000">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content=<? echo get_template_directory_uri() . "/img/favicon/ms-icon-144x144.png"?>>
	<meta property="og:image" content=<? echo get_template_directory_uri() . "/img/favicon/favicon-96x96.png"?>>
	<link rel="apple-touch-icon" href=<? echo get_template_directory_uri() . "/img/favicon/apple-icon.png"?>>
	<link rel="apple-touch-icon" sizes="57x57" href=<? echo get_template_directory_uri() . "/img/favicon/apple-icon-57x57.png"?>>
	<link rel="apple-touch-icon" sizes="60x60" href=<? echo get_template_directory_uri() . "/img/favicon/apple-icon-60x60.png"?>>
	<link rel="apple-touch-icon" sizes="72x72" href=<? echo get_template_directory_uri() . "/img/favicon/apple-icon-72x72.png"?>>
	<link rel="apple-touch-icon" sizes="76x76" href=<? echo get_template_directory_uri() . "/img/favicon/apple-icon-76x76.png"?>>
	<link rel="apple-touch-icon" sizes="114x114" href=<? echo get_template_directory_uri() . "/img/favicon/apple-icon-114x114.png"?>>
	<link rel="apple-touch-icon" sizes="120x120" href=<? echo get_template_directory_uri() . "/img/favicon/apple-icon-120x120.png"?>>
	<link rel="apple-touch-icon" sizes="144x144" href=<? echo get_template_directory_uri() . "/img/favicon/apple-icon-144x144.png"?>>
	<link rel="apple-touch-icon" sizes="152x152" href=<? echo get_template_directory_uri() . "/img/favicon/apple-icon-152x152.png"?>>
	<link rel="apple-touch-icon" sizes="180x180" href=<? echo get_template_directory_uri() . "/img/favicon/apple-icon-180x180.png"?>>
	<link rel="icon" type="image/png" sizes="192x192"  href=<? echo get_template_directory_uri() . "/img/favicon/android-icon-192x192.png"?>>
	<link rel="icon" type="image/png" sizes="32x32" href=<? echo get_template_directory_uri() . "/img/favicon/favicon-32x32.png"?>>
	<link rel="icon" type="image/png" sizes="96x96" href=<? echo get_template_directory_uri() . "/img/favicon/favicon-96x96.png"?>>
	<link rel="icon" type="image/png" sizes="16x16" href=<? echo get_template_directory_uri() . "/img/favicon/favicon-16x16.png"?>>
	<link rel="manifest" href=<? echo get_template_directory_uri() . "/img/favicon/manifest.json"?>>
	<link rel="shortcut icon" type="image/x-icon" href=<? echo get_template_directory_uri() . "/img/favicon/favicon.ico" ?> >
	<!--	==========================-->
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext" rel="stylesheet">
	<?php wp_head(); ?>
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body <?php body_class(); ?>>
<div class="wrapper">
	<header id="header">
		<!-- Fixed navbar -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Меню</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<?php echo esc_attr( get_bloginfo( 'name','display'));?>
					</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<?php $args = array(
						'theme_location' => 'top',
						'container'=> false,
						'menu_id' => 'top-nav-ul',
						'items_wrap' => '<ul id="%1$s" class="nav navbar-nav %2$s">%3$s</ul>',
						'menu_class' => 'top-menu',
						'walker' => new bootstrap_menu(true)
					);
					wp_nav_menu($args);
					?>
				</div><!--/.nav-collapse -->
			</div>
		</nav>
	</header>
	<div class="content-wrapper">