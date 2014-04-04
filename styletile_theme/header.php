<!doctype html>

<!-- 
320 and Up by Andy Clarke
Version: 3.0
URL: http://stuffandnonsense.co.uk/projects/320andup/
Apache License: v2.0. http://www.apache.org/licenses/LICENSE-2.0
-->

<!-- HTML5 Boilerplate -->
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js lt-ie9 lt-ie8" lang="en"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js lt-ie9" lang="en"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?>><!--<![endif]-->

<head>
<link href='http://fonts.googleapis.com/css?family=Lato:300,400|Lora:400,400italic|Oswald' rel='stylesheet' type='text/css'>

<meta charset="utf-8">

<title><?php wp_title( ' | ' ); ?></title>

<meta name="description" content="">
<meta name="author" content="Steve Fisher">

<!-- http://t.co/dKP3o1e -->
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">

<!-- For all browsers -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">

<!--[if (lt IE 9) & (!IEMobile)]>
<script src="js/selectivizr-min.js"></script>
<![endif]-->

<!-- JavaScript -->
<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr-2.5.3-min.js"></script>

<!-- Icons -->

<!-- 16x16 -->
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico">
<!-- 32x32 -->
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.png">
<!-- 57x57 (precomposed) for iPhone 3GS, pre-2011 iPod Touch and older Android devices -->
<!-- <link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-precomposed.png"> -->
<!-- 72x72 (precomposed) for 1st generation iPad, iPad 2 and iPad mini -->
<!-- <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-72x72-precomposed.png"> -->
<!-- 114x114 (precomposed) for iPhone 4, 4S, 5 and post-2011 iPod Touch -->
<!-- <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-114x114-precomposed.png"> -->
<!-- 144x144 (precomposed) for iPad 3rd and 4th generation -->
<!-- <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-144x144-precomposed.png"> -->

<!--iOS -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- <meta name="apple-mobile-web-app-title" content="320 and Up"> -->
<!-- <meta name="viewport" content="initial-scale=1.0"> (Use if apple-mobile-web-app-capable below is set to yes) -->
<!-- <meta name="apple-mobile-web-app-capable" content="yes"> -->
<!-- <meta name="apple-mobile-web-app-status-bar-style" content="black"> -->

<!-- Windows 8 / RT -->
<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-144x144-precomposed.png">
<meta name="msapplication-TileColor" content="#000">
<meta http-equiv="cleartype" content="on">

	<?php wp_head(); ?>
	
	<?php 

	if( is_page_template( 'page-style1.php' ) ) $stytil_num = 1;
	else if( is_page_template( 'page-style2.php' ) ) $stytil_num = 2;
	else if( is_page_template( 'page-style3.php' ) ) $stytil_num = 3;

		$font_families = '';
		if( stytil_getOption( 'stytil_st'.$stytil_num.'_h1_google_font' ) ) $font_families .= stytil_getOption( 'stytil_st'.$stytil_num.'_h1_google_font' );
		if( stytil_getOption( 'stytil_st'.$stytil_num.'_h1_google_font_styles' ) ) $font_families .= ':'.stytil_getOption( 'stytil_st'.$stytil_num.'_h1_google_font_styles' );
		if( stytil_getOption( 'stytil_st'.$stytil_num.'_h1_google_font' ) && stytil_getOption( 'stytil_st'.$stytil_num.'_h2_google_font' ) ) $font_families .= '|';
		if( stytil_getOption( 'stytil_st'.$stytil_num.'_h2_google_font' ) ) $font_families .= stytil_getOption( 'stytil_st'.$stytil_num.'_h2_google_font' );
		if( stytil_getOption( 'stytil_st'.$stytil_num.'_h2_google_font_styles' ) ) $font_families .= ':'.stytil_getOption( 'stytil_st'.$stytil_num.'_h2_google_font_styles' );
		if( stytil_getOption( 'stytil_st'.$stytil_num.'_h2_google_font' ) && stytil_getOption( 'stytil_st'.$stytil_num.'_p_google_font' ) ) $font_families .= '|';
		if( stytil_getOption( 'stytil_st'.$stytil_num.'_p_google_font' ) ) $font_families .= stytil_getOption( 'stytil_st'.$stytil_num.'_p_google_font' );
		if( stytil_getOption( 'stytil_st'.$stytil_num.'_p_google_font_styles' ) ) $font_families .= ':'.stytil_getOption( 'stytil_st'.$stytil_num.'_p_google_font_styles' );
		if( stytil_getOption( 'stytil_st'.$stytil_num.'_p_google_font' ) && stytil_getOption( 'stytil_st'.$stytil_num.'_blckquote_google_font' ) ) $font_families .= '|';
		if( stytil_getOption( 'stytil_st'.$stytil_num.'_blckquote_google_font' ) ) $font_families .=  stytil_getOption( 'stytil_st'.$stytil_num.'_blckquote_google_font' );
		if( stytil_getOption( 'stytil_st'.$stytil_num.'_blckquote_google_font_styles' ) ) $font_families .= ':'.stytil_getOption( 'stytil_st'.$stytil_num.'_blckquote_google_font_styles' );
		
			
		echo '<link href=\'http://fonts.googleapis.com/css?family='.$font_families.'\' rel=\'stylesheet\' type=\'text/css\'>';
		
		?>
	<style>
		<?php 
		
			echo 'html { background: url('.stytil_getOption( 'stytil_st'.$stytil_num.'_bg_image' ).') 0 0 repeat;';
			echo 'background-color: '.stytil_getOption( 'stytil_st'.$stytil_num.'_bg_color' ).'; }';
			
			echo '.primary.color { background-color: '.stytil_getOption( 'stytil_st'.$stytil_num.'_color_one' ).'; }';
			echo '.secondary.color.v1 { background-color: '.stytil_getOption( 'stytil_st'.$stytil_num.'_color_two' ).'; }';
			echo '.background.color { background-color: '.stytil_getOption( 'stytil_st'.$stytil_num.'_color_three' ).'; }';
			echo '.secondary.color.v2 { background-color: '.stytil_getOption( 'stytil_st'.$stytil_num.'_color_four' ).'; }';
			echo '.secondary.color.v3 { background-color: '.stytil_getOption( 'stytil_st'.$stytil_num.'_color_five' ).'; }';
			
			echo 'h1.one {
				font-family: \''.stytil_getOption( 'stytil_st'.$stytil_num.'_h1_google_font' ).'\', \''.stytil_getOption( 'stytil_st'.$stytil_num.'_h1_font' ).'\';
				font-size: '.stytil_getOption( 'stytil_st'.$stytil_num.'_h1_font_size' ).';
				line-height: '.stytil_getOption( 'stytil_st'.$stytil_num.'_h1_line_height' ).';
				letter-spacing: '.stytil_getOption( 'stytil_st'.$stytil_num.'_h1_letter_spacing' ).';
				color: '.stytil_getOption( 'stytil_st'.$stytil_num.'_h1_color' ).';
				font-weight: '.stytil_getOption( 'stytil_st'.$stytil_num.'_h1_font_weight' ).';
			}';
			 
			echo 'h2.one {
				font-family: \''.stytil_getOption( 'stytil_st'.$stytil_num.'_h2_google_font' ).'\', \''.stytil_getOption( 'stytil_st'.$stytil_num.'_h2_font' ).'\';
				font-size: '.stytil_getOption( 'stytil_st'.$stytil_num.'_h2_font_size' ).';
				line-height: '.stytil_getOption( 'stytil_st'.$stytil_num.'_h2_line_height' ).';
				letter-spacing: '.stytil_getOption( 'stytil_st'.$stytil_num.'_h2_letter_spacing' ).';
				color: '.stytil_getOption( 'stytil_st'.$stytil_num.'_h2_color' ).';
				font-weight: '.stytil_getOption( 'stytil_st'.$stytil_num.'_h2_font_weight' ).';
			}';
			 
			echo 'p.one {
				font-family: \''.stytil_getOption( 'stytil_st'.$stytil_num.'_p_google_font' ).'\', \''.stytil_getOption( 'stytil_st'.$stytil_num.'_p_font' ).'\';
				font-size: '.stytil_getOption( 'stytil_st'.$stytil_num.'_p_font_size' ).';
				line-height: '.stytil_getOption( 'stytil_st'.$stytil_num.'_p_line_height' ).';
				letter-spacing: '.stytil_getOption( 'stytil_st'.$stytil_num.'_p_letter_spacing' ).';
				color: '.stytil_getOption( 'stytil_st'.$stytil_num.'_p_color' ).';
				font-weight: '.stytil_getOption( 'stytil_st'.$stytil_num.'_p_font_weight' ).';
			}';
			 
			echo 'p.one a {
				text-decoration: '.stytil_getOption( 'stytil_st'.$stytil_num.'_p_a_txt_decor' ).';
				color: '.stytil_getOption( 'stytil_st'.$stytil_num.'_p_a_color' ).';
				font-weight: '.stytil_getOption( 'stytil_st'.$stytil_num.'_p_a_font_weight' ).';
			}';
			 
			echo 'p.one a:hover {
				text-decoration: '.stytil_getOption( 'stytil_st'.$stytil_num.'_p_ahover_txt_decor' ).';
				color: '.stytil_getOption( 'stytil_st'.$stytil_num.'_p_ahover_color' ).';
				font-weight: '.stytil_getOption( 'stytil_st'.$stytil_num.'_p_ahover_font_weight' ).';
			}';
			
			
			echo 'blockquote.one {
				color: '.stytil_getOption( 'stytil_st'.$stytil_num.'_blckquote_color' ).';
				font-weight: '.stytil_getOption( 'stytil_st'.$stytil_num.'_blckquote_font_weight' ).';
				font-family: \''.stytil_getOption( 'stytil_st'.$stytil_num.'_blckquote_google_font' ).'\', \''.stytil_getOption( 'stytil_st'.$stytil_num.'_blckquote_font' ).'\';
				font-size: '.stytil_getOption( 'stytil_st'.$stytil_num.'_blckquote_font_size' ).';
				line-height: '.stytil_getOption( 'stytil_st'.$stytil_num.'_blckquote_line_height' ).';
				letter-spacing: '.stytil_getOption( 'stytil_st'.$stytil_num.'_blckquote_letter_spacing' ).';
				margin: '.stytil_getOption( 'stytil_st'.$stytil_num.'_blckquote_margin' ).';
				padding: '.stytil_getOption( 'stytil_st'.$stytil_num.'_blckquote_padding' ).';
				border-left: '.stytil_getOption( 'stytil_st'.$stytil_num.'_blckquote_border-left' ).';
			 }';
			 
		?>

	</style>
</head>

<body class="clearfix" onload="setTimeout(function() { window.scrollTo(0,1) }, 100);">

<header role="banner" class="clearfix">
	<div class="row">
	<h1><a href="<?php bloginfo( 'url' ); ?>"><?php bloginfo( 'title' ); ?></a></h1>
	
	<?php
		$header_menu = array(
			'theme_location'  => 'header_menu',
			'menu'            => '',
			'container'       => 'nav',
			'container_class' => '',
			'container_id'    => '',
			'menu_class'      => 'menu',
			'menu_id'         => '',
			'echo'            => true,
			'fallback_cb'     => 'wp_page_menu',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '%3$s',
			'depth'           => 0,
			'walker'          => new stytil_Walker_Nav_Menu()
		);
		
		wp_nav_menu( $header_menu );
	?>
	</div>
</header>
