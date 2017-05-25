<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage EmilyGilbert.me 2017
 */
?>
<!DOCTYPE html>
<html>
<head>

	<title>
		<?php
			global $page, $paged;

			wp_title( '|', true, 'right' );

			// Add the blog name.
			bloginfo( 'name' );

			// Add the blog description for the home/front page.
			$site_description = get_bloginfo( 'description', 'display' );
			if ( $site_description && ( is_home() || is_front_page() ) )
				echo " | $site_description";

			// Add a page number if necessary:
			if ( $paged >= 2 || $page >= 2 )
				echo ' | ' . sprintf( __( 'Page %s' ), max( $paged, $page ) );
		?>
	</title>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php if ( is_home() || is_category() ): ?>

		<meta name="description" content="Emily Gilbert's Photography.">
		<meta name="keywords" content="Emily Gilbert, Photography, Portfolio, Mechanicsville, Virginia, Richmond">

	<?php elseif ( is_single() ): ?>

		<meta name="description" content="<?php echo esc_html(get_the_excerpt()); ?>">

		<?php
			$post_tags = get_the_tags();
			foreach($post_tags as $tag)
				$csv_tags .= $tag->name . ',';

			echo '<meta name="keywords" content="'.$csv_tags.'" />';
		?>

	<?php endif; ?>


	<?php
		/* Pulls in the social media meta tags */
		include('resources/includes/social-media-meta.php'); ?>

	<?php /* Google Fonts Imprt */ ?>
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,500,900" rel="stylesheet">

	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo bloginfo('template_directory') ?>/assets/images/icons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo bloginfo('template_directory') ?>/assets/images/icons/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo bloginfo('template_directory') ?>/assets/images/icons/favicon-16x16.png">

	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

	<!--[if lt IE 9]>
		<script src="<?php echo bloginfo('template_directory') ?>/assets/js/html5shiv.min.js"></script>
		<script src="<?php echo bloginfo('template_directory') ?>/assets/js/respond.min.js"></script>
		<script src="<?php echo bloginfo('template_directory') ?>/assets/js/placeholders.jquery.min.js"></script>
	<![endif]-->

</head>

<body>

	<div class="container <?php echo post_or_page_specific_class(); ?>">

		<header class="sitewide-header">
			<h1><a href="/" class="decorationless"><img src="<?php echo bloginfo('template_directory') ?>/assets/images/logos/emily-joy-gilbert-600x189.png" alt="Emily Joy Gilbert" class="site-logo"></a></h1>
		</header>