<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package flannel_s
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:700' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" type="image/x-icon" href="/wp-content/themes/flannel_s/img/favicon.ico" >
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-55WN7J"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-55WN7J');</script>
<!-- End Google Tag Manager -->
<div id="page" class="hfeed site">
<div class="header-wrap clear">
	<header id="masthead" class="site-header" role="banner">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="/wp-content/themes/flannel_s/img/fl-logo-tiny.png" alt="FLANNEL F.L. Logo"></a>
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h3 class="site-description"><?php bloginfo( 'description' ); ?></h3>
		</div>
	</header><!-- #masthead -->
	<div class="nav-wrap clear">
		<nav id="site-navigation" class="main-navigation clear" role="navigation">
			<h1 class="menu-toggle"><?php _e( 'Menu', 'flannel_s' ); ?></h1>
			<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'flannel_s' ); ?></a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		</nav><!-- #site-navigation -->
		<div class="nav-img">
			<img src="/wp-content/themes/flannel_s/img/fl-logo-medium.png" alt="FLANNEL F.L. Logo">
		</div>
	</div>
</div>

	<div id="content" class="site-content">
