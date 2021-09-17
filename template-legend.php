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
	<link rel="stylesheet" href="/assets/css/main.min.css?v=0.4">
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/css/style.min.css?v=0.12">

	<?php //wp_head(); 
	?>

</head>

<body>
	<?php

	// TO SHOW THE PAGE CONTENTS
	while (have_posts()) : the_post();
		the_content();
	// $content = get_the_content();
	// echo do_shortcode( $content );
	endwhile; //resetting the page loop
	wp_reset_query(); //resetting the page query
    ?>

	<script src="/assets/js/jquery.js"></script>
	<script src="/assets/js/popper.min.js"></script>
	<script src="/assets/js/bootstrap.min.js"></script>
	<script src="/assets/js/main.min.js?v=0.4"></script>
	<script>
		$(document).ready(function() {
			$(document).on("click", "#menu-toggle", function(e) {
				e.preventDefault();
				$("#wrapper").toggleClass("toggled");
			});
		})
	</script>
	<script>
		var mySlider = slider('.slides');
	</script>
	
</body>

</html>