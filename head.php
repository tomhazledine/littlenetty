<?php
/**
 * The head for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until the <header>
 *
 * @package Tabula_Rasa
 */

?><!DOCTYPE html>
<!--[if IE 8]>         <html <?php language_attributes(); ?> class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui">
	
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/favicon.ico" />
	<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php bloginfo('rss2_url'); ?>" title="RSS Feed" />
	<link rel="alternate" type="application/atom+xml" title="RSS" href="<?php bloginfo('atom_url'); ?>" title="Atom Feed" />

	<!-- Polyfills -->
		<!-- Media Queries support for older versions of IE etc. -->
		<!-- HTML5 shiv -->
			<!--[if lt IE 9]>
			<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/js/static/respond.min.js" type="text/javascript"></script>
			<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/js/static/html5.js" type="text/javascript"></script>
			<![endif]-->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div class="svgSpriteWrapper hidden">
		<?php echo file_get_contents( get_template_directory_uri() . '/assets/icons/symbol/svg/sprite.symbol.svg' ); ?>
	</div>
