<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package LMS_Showcase
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>

    <style>

        @font-face{font-family:'Proxima Nova';src:url("<?php bloginfo('stylesheet_directory') ?>/assets/fonts/ProximaNova-Light.woff2") format("woff2"), url("/assets/fonts/ProximaNova-Light.woff") format("woff");font-weight:300;font-style:normal}@font-face{font-family:'Proxima Nova';src:url("/assets/fonts/ProximaNova-Regular.woff2") format("woff2"), url("/assets/fonts/ProximaNova-Regular.woff") format("woff");font-weight:normal;font-style:normal}@font-face{font-family:'Proxima Nova';src:url("/assets/fonts/ProximaNova-Semibold.woff2") format("woff2"), url("/assets/fonts/ProximaNova-Semibold.woff") format("woff");font-weight:600;font-style:normal}

    </style>

    <title>LMS Showcase</title>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

	<?php wp_head(); ?>
</head>
