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
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="/assets/css/main.min.css?v=0.7">
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/css/style.min.css?v=0.19">

	<?php //wp_head(); 
	?>
	<script>
		(function(h, o, t, j, a, r) {
			h.hj = h.hj || function() {
				(h.hj.q = h.hj.q || []).push(arguments)
			};
			h._hjSettings = {
				hjid: 2608605,
				hjsv: 6
			};
			a = o.getElementsByTagName('head')[0];
			r = o.createElement('script');
			r.async = 1;
			r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
			a.appendChild(r);
		})(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
	</script>
</head>

<body>
	<?php
	// TO SHOW THE PAGE CONTENTS
	while (have_posts()) : the_post();
		$data = get_the_content();
		// $menu_x = bembo_nav_menu("legend-home");
		// $logo_x = get_custom_logo();

		// $data = str_replace("[[MENU]]", $menu_x, $data);
		// //$data['post_content']= str_replace("[[MENU2]]",$menu_xx,$data['post_content']);
		// $data = str_replace("[[LOGO]]", $logo_x, $data);
		echo do_shortcode($data);
	endwhile; //resetting the page loop
	wp_reset_query(); //resetting the page query
	?>

	<script src="/assets/js/jquery.js"></script>
	<script src="/assets/js/popper.min.js"></script>
	<script src="/assets/js/bootstrap.min.js"></script>
	<script src="/assets/js/main.min.js?v=0.8"></script>
</body>

</html>