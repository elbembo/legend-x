<?php

/**
 * Template Name: Legend Home
 *
 * @package page template
 * @author Emadissa
 * @link https://www.emadissa.com
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js<?php echo esc_attr(mfn_user_os()); ?>" <?php mfn_tag_schema(); ?>>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php the_title(); ?></title>
	<link rel="icon" type="image/svg+xml" href="/favicon.svg">

	<!-- //////////////////// PWA manifest ////////////////////// -->

	<link rel="apple-touch-icon" sizes="57x57" href="/favicon.svg">
	<link rel="apple-touch-icon" sizes="60x60" href="/favicon.svg">
	<link rel="apple-touch-icon" sizes="72x72" href="/favicon.svg">
	<link rel="apple-touch-icon" sizes="76x76" href="/favicon.svg">
	<link rel="apple-touch-icon" sizes="114x114" href="/favicon.svg">
	<link rel="apple-touch-icon" sizes="120x120" href="/favicon.svg">
	<link rel="apple-touch-icon" sizes="144x144" href="/favicon.svg">
	<link rel="apple-touch-icon" sizes="152x152" href="/favicon.svg">
	<link rel="apple-touch-icon" sizes="180x180" href="/favicon.svg">
	<link rel="icon" type="image/png" sizes="192x192" href="/favicon.svg">
	<link rel="icon" type="image/svg+xml" sizes="32x32" href="/favicon.svg">
	<link rel="icon" type="image/svg+xml" sizes="96x96" href="/favicon.svg">
	<link rel="icon" type="image/svg+xml" sizes="16x16" href="/favicon.svg">
	<link rel="manifest" href="/manifest.json">
	<meta name="msapplication-TileColor" content="#000000">
	<meta name="msapplication-TileImage" content="/favicon.svg">
	<meta name="theme-color" content="#000000">

	<!-- //////////////////// END PWA manifest ////////////////////// -->
	<?php //wp_head(); 
	?>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="/assets/css/main.min.css?v=0.10">
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/css/style.min.css?v=0.26">
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<meta name="google-site-verification" content="uv_Fwp-Er1JvTcWivg_fur0T8qungSVtvBOsorglWWs" />
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo get_option('google_analytics_track_id') ?>">
	</script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', '<?php echo get_option('google_analytics_track_id') ?>');
	</script>

</head>

<body>
	<?php
	// TO SHOW THE PAGE CONTENTS
	while (have_posts()) : the_post();
		$data = get_the_content();

		echo do_shortcode($data);
	endwhile; //resetting the page loop
	wp_reset_query(); //resetting the page query
	//wp_footer();
	?>

	<script src="/assets/js/main.min.js?v=0.23"></script>
	
</body>

</html>