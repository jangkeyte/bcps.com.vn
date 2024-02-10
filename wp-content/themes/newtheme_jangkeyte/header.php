<!doctype html>
<html lang="vi">
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link href="/favicon.ico" rel="shortcut icon" type="image/x-icon" />
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.png" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	<?php wp_head(); ?>

	<?php do_action('jangkeyte_custom_header_js'); ?>
</head>

<body <?php body_class(); // Body classes is added from inc/helpers-frontend.php ?> > 

	<?php do_action('jangkeyte_after_body_open'); ?>

	<div id="wrapper">

		<?php do_action('jangkeyte_before_header'); ?>

		<header id="header" class="header jangkeyte_header_classes">
		   	<div class="header-wrapper">
				<?php get_template_part('template-parts/header/header', 'wrapper');	?>
		   	</div><!-- header-wrapper-->		   	
		</header>

		<?php do_action('jangkeyte_after_header'); ?>

		<main id="main" class="jangkeyte_main_classes">