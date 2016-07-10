<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/main.css">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico" />
    <link rel="alternate" type="application/rss+xml" title="RSS" href="<?php bloginfo('rss2_url'); ?>" title="RSS Feed" />
    <link rel="alternate" type="application/atom+xml" title="RSS" href="<?php bloginfo('atom_url'); ?>" title="Atom Feed" />

    <!-- Modernizr -->
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/static/modernizr-2.6.2.min.js"></script>

    <!-- Polyfills -->
        <!-- Media Queries support for older versions of IE etc. -->
        <!-- HTML5 shiv -->
            <!--[if lt IE 9]>
            <script src="<?php echo get_template_directory_uri(); ?>/assets/js/static/respond.min.js" type="text/javascript"></script>
            <script src="<?php echo get_template_directory_uri(); ?>/assets/js/static/html5.js" type="text/javascript"></script>
            <![endif]-->

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
