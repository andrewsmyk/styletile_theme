<?php 

class stytil_settings_setup {
	
	public function __construct() {
		add_action( 'admin_init', array( $this, 'stytil_settings') ); /* Hook into admin init to call settings function */	
		add_action( 'admin_menu', array( $this, 'stytil_menu_page' ) ); /* Hook into admin_menus to call the astonish_menu function */
		add_action( 'customize_register', array( $this, 'stytil_customizer' ) );
	}
	
	
	function stytil_settings() {
		register_setting( 'stytil_options_group', 'stytil_options', array( $this, 'stytil_sanitize_settings' ) );
		add_settings_section( 'stytil_settings_group', '', '__return_false', 'stytil_settings_page'); 
		
		
	}
	
	var $menu_position	= '61';
	var $user_capabilities	= 'manage_options';
	var $namespace	= 'stytil_';
	
	
	/********************************************//**
	 * Creates Menus and Submenus
	 ***********************************************/
	function stytil_menu_page() {
	
		add_menu_page( 'Style Tile', 'Style Tile', $this->user_capabilities, $this->namespace . 'settings', array( $this, $this->namespace . 'settings_page' ), get_template_directory_uri() .'/img/option-icon-16.png', $this->menu_position );
								
	}	
	
	function stytil_settings_page() {
		if( isset( $_GET[ 'tab' ] ) ) $active_tab = $_GET[ 'tab' ];
		else $active_tab = 'styleone';
		
		global $title; 
		
		echo '<div class="wrap"><div class="icon32"><img src="' . get_template_directory_uri() . '/img/option-icon-32.png"></div><h2>'.$title.'</h2>';	
    	
    	echo '<a href="?page=stytil_settings&tab=styleone" class="nav-tab ';
    	if( $active_tab == 'styleone' || !$active_tab ) echo 'nav-tab-active';
    	echo '">Style Tile 1</a>';
		
		echo '<a href="?page=stytil_settings&tab=styletwo" class="nav-tab ';
    	if( $active_tab == 'styletwo' ) echo 'nav-tab-active';
    	echo '">Style Tile 2</a>';
    	
    	echo '<a href="?page=stytil_settings&tab=stylethree" class="nav-tab ';
    	if( $active_tab == 'stylethree' ) echo 'nav-tab-active';
    	echo '">Style Tile 3</a>';
    	
    	
		echo '<form action="'.admin_url('options.php').'" method="post" id="'.$this->namespace.'options_form" enctype="multipart/form-data">';
		settings_fields($this->namespace . 'options_group'); 
		
		$form_fields = $this->stytil_menu_sub_title ( 'Document', false, 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('Background Image', 'st1_bg_image', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('Background Color', 'st1_bg_color', 'styleone', $active_tab );
		
		$form_fields .= $this->stytil_menu_sub_title ( 'Tone and Brand', true, 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('Logo', 'st1_logo', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('Color 1', 'st1_color_one', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('Color 2', 'st1_color_two', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('Color 3', 'st1_color_three', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('Color 4', 'st1_color_four', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('Color 5', 'st1_color_five', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('Accent', 'st1_accent', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('Descriptive Adjective 1', 'st1_adjective_one', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('Descriptive Adjective 2', 'st1_adjective_two', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('Descriptive Adjective 3', 'st1_adjective_four', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('Descriptive Adjective 4', 'st1_adjective_four', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('Descriptive Adjective 5', 'st1_adjective_five', 'styleone', $active_tab );
		
		$form_fields .= $this->stytil_menu_sub_title ( 'Typography', true, 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('h1 font', 'st1_h1_font', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('h1 Google Font', 'st1_h1_google_font', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('h1 Google Font Styles', 'st1_h1_google_font_styles', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('h1 font-size', 'st1_h1_font_size', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('h1 line-height', 'st1_h1_line_height', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('h1 letter-spacing', 'st1_h1_letter_spacing', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('h1 color', 'st1_h1_color', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('h1 font-weight', 'st1_h1_font_weight', 'styleone', $active_tab );	
		
		$form_fields .= $this->stytil_textinput('h2 font', 'st1_h2_font', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('h2 Google Font', 'st1_h2_google_font', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('h2 Google Font Styles', 'st1_h2_google_font_styles', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('h2 font-size', 'st1_h2_font_size', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('h2 line-height', 'st1_h2_line_height', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('h2 letter-spacing', 'st1_h2_letter_spacing', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('h2 color', 'st1_h2_color', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('h2 font-weight', 'st1_h2_font_weight', 'styleone', $active_tab );		
		
		$form_fields .= $this->stytil_textinput('p font', 'st1_p_font', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('p Google Font', 'st1_p_google_font', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('p Google Font Styles', 'st1_p_google_font_styles', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('p font-size', 'st1_p_font_size', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('p line-height', 'st1_p_line_height', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('p letter-spacing', 'st1_p_letter_spacing', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('p color', 'st1_p_color', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('p font-weight', 'st1_p_font_weight', 'styleone', $active_tab );		
		
		$form_fields .= $this->stytil_textinput('p a text-decoration', 'st1_p_a_txt_decor', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('p a color', 'st1_p_a_color', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('p a font-weight', 'st1_p_a_font_weight', 'styleone', $active_tab );	
		
		$form_fields .= $this->stytil_textinput('p a:hover text-decoration', 'st1_p_ahover_txt_decor', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('p a:hover color', 'st1_p_ahover_color', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('p a:hover font-weight', 'st1_p_ahover_font_weight', 'styleone', $active_tab );
		
		$form_fields .= $this->stytil_textinput('blockquote font', 'st1_blckquote_font', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('blockquote Google Font', 'st1_blockquote_google_font', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('blockquote Google Font Styles', 'st1_blockquote_google_font_styles', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('blockquote font-size', 'st1_blckquote_font_size', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('blockquote line-height', 'st1_blckquote_line_height', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('blockquote letter-spacing', 'st1_blckquote_letter_spacing', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('blockquote color', 'st1_blckquote_color', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('blockquote font-weight', 'st1_blckquote_font_weight', 'styleone', $active_tab );	
		$form_fields .= $this->stytil_textinput('blockquote margin (shorthand)', 'st1_blckquote_margin', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('blockquote padding (shorthand)', 'st1_blckquote_padding', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('blockquote boder left', 'st1_blckquote_border-left', 'styleone', $active_tab );		

		$form_fields .= $this->stytil_menu_sub_title ( 'Media', true, 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('image upload 1', 'st1_media_image_one', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('image upload 2', 'st1_media_image_two', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('image upload 3', 'st1_media_image_three', 'styleone', $active_tab );
		$form_fields .= $this->stytil_textinput('image upload 4', 'st1_media_image_four', 'styleone', $active_tab );
		
		
		$form_fields .= $this->stytil_menu_sub_title ( 'Document', false, 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('Background Image', 'st2_bg_image', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('Background Color', 'st2_bg_color', 'styletwo', $active_tab );
		
		$form_fields .= $this->stytil_menu_sub_title ( 'Tone and Brand', true, 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('Logo', 'st2_logo', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('Color 1', 'st2_color_one', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('Color 2', 'st2_color_two', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('Color 3', 'st2_color_three', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('Color 4', 'st2_color_four', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('Color 5', 'st2_color_five', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('Accent', 'st2_accent', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('Descriptive Adjective 1', 'st2_adjective_one', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('Descriptive Adjective 2', 'st2_adjective_two', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('Descriptive Adjective 3', 'st2_adjective_four', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('Descriptive Adjective 4', 'st2_adjective_four', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('Descriptive Adjective 5', 'st2_adjective_five', 'styletwo', $active_tab );
		
		$form_fields .= $this->stytil_menu_sub_title ( 'Typography', true, 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('h1 font', 'st2_h1_font', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('h1 Google Font', 'st2_h1_google_font', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('h1 Google Font Styles', 'st2_h1_google_font_styles', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('h1 font-size', 'st2_h1_font_size', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('h1 line-height', 'st2_h1_line_height', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('h1 letter-spacing', 'st2_h1_letter_spacing', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('h1 color', 'st2_h1_color', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('h1 font-weight', 'st2_h1_font_weight', 'styletwo', $active_tab );	
		
		$form_fields .= $this->stytil_textinput('h2 font', 'st2_h2_font', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('h2 Google Font', 'st2_h2_google_font', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('h2 Google Font Styles', 'st2_h2_google_font_styles', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('h2 font-size', 'st2_h2_font_size', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('h2 line-height', 'st2_h2_line_height', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('h2 letter-spacing', 'st2_h2_letter_spacing', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('h2 color', 'st2_h2_color', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('h2 font-weight', 'st2_h2_font_weight', 'styletwo', $active_tab );		
		
		$form_fields .= $this->stytil_textinput('p font', 'st2_p_font', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('p Google Font', 'st2_p_google_font', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('p Google Font Styles', 'st2_p_google_font_styles', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('p font-size', 'st2_p_font_size', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('p line-height', 'st2_p_line_height', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('p letter-spacing', 'st2_p_letter_spacing', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('p color', 'st2_p_color', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('p font-weight', 'st2_p_font_weight', 'styletwo', $active_tab );		
		
		$form_fields .= $this->stytil_textinput('p a text-decoration', 'st2_p_a_txt_decor', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('p a color', 'st2_p_a_color', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('p a font-weight', 'st2_p_a_font_weight', 'styletwo', $active_tab );	
		
		$form_fields .= $this->stytil_textinput('p a:hover text-decoration', 'st2_p_ahover_txt_decor', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('p a:hover color', 'st2_p_ahover_color', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('p a:hover font-weight', 'st2_p_ahover_font_weight', 'styletwo', $active_tab );
		
		$form_fields .= $this->stytil_textinput('blockquote font', 'st2_blckquote_font', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('blockquote Google Font', 'st2_blockquote_google_font', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('blockquote Google Font Styles', 'st2_blockquote_google_font_styles', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('blockquote font-size', 'st2_blckquote_font_size', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('blockquote line-height', 'st2_blckquote_line_height', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('blockquote letter-spacing', 'st2_blckquote_letter_spacing', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('blockquote color', 'st2_blckquote_color', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('blockquote font-weight', 'st2_blckquote_font_weight', 'styletwo', $active_tab );	
		$form_fields .= $this->stytil_textinput('blockquote margin (shorthand)', 'st2_blckquote_margin', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('blockquote padding (shorthand)', 'st2_blckquote_padding', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('blockquote boder left', 'st2_blckquote_border-left', 'styletwo', $active_tab );		

		$form_fields .= $this->stytil_menu_sub_title ( 'Media', true, 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('image upload 1', 'st2_media_image_one', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('image upload 2', 'st2_media_image_two', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('image upload 3', 'st2_media_image_three', 'styletwo', $active_tab );
		$form_fields .= $this->stytil_textinput('image upload 4', 'st2_media_image_four', 'styletwo', $active_tab );
		
		
		$form_fields .= $this->stytil_menu_sub_title ( 'Document', false, 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('Background Image', 'st3_bg_image', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('Background Color', 'st3_bg_color', 'stylethree', $active_tab );
		
		$form_fields .= $this->stytil_menu_sub_title ( 'Tone and Brand', true, 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('Logo', 'st3_logo', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('Color 1', 'st3_color_one', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('Color 2', 'st3_color_two', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('Color 3', 'st3_color_three', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('Color 4', 'st3_color_four', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('Color 5', 'st3_color_five', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('Accent', 'st3_accent', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('Descriptive Adjective 1', 'st3_adjective_one', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('Descriptive Adjective 2', 'st3_adjective_two', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('Descriptive Adjective 3', 'st3_adjective_four', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('Descriptive Adjective 4', 'st3_adjective_four', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('Descriptive Adjective 5', 'st3_adjective_five', 'stylethree', $active_tab );
		
		$form_fields .= $this->stytil_menu_sub_title ( 'Typography', true, 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('h1 font', 'st3_h1_font', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('h1 Google Font', 'st3_h1_google_font', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('h1 Google Font Styles', 'st3_h1_google_font_styles', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('h1 font-size', 'st3_h1_font_size', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('h1 line-height', 'st3_h1_line_height', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('h1 letter-spacing', 'st3_h1_letter_spacing', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('h1 color', 'st3_h1_color', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('h1 font-weight', 'st3_h1_font_weight', 'stylethree', $active_tab );	
		
		$form_fields .= $this->stytil_textinput('h2 font', 'st3_h2_font', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('h2 Google Font', 'st3_h2_google_font', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('h2 Google Font Styles', 'st3_h2_google_font_styles', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('h2 font-size', 'st3_h2_font_size', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('h2 line-height', 'st3_h2_line_height', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('h2 letter-spacing', 'st3_h2_letter_spacing', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('h2 color', 'st3_h2_color', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('h2 font-weight', 'st3_h2_font_weight', 'stylethree', $active_tab );		
		
		$form_fields .= $this->stytil_textinput('p font', 'st3_p_font', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('p Google Font', 'st3_p_google_font', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('p Google Font Styles', 'st3_p_google_font_styles', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('p font-size', 'st3_p_font_size', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('p line-height', 'st3_p_line_height', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('p letter-spacing', 'st3_p_letter_spacing', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('p color', 'st3_p_color', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('p font-weight', 'st3_p_font_weight', 'stylethree', $active_tab );		
		
		$form_fields .= $this->stytil_textinput('p a text-decoration', 'st3_p_a_txt_decor', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('p a color', 'st3_p_a_color', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('p a font-weight', 'st3_p_a_font_weight', 'stylethree', $active_tab );	
		
		$form_fields .= $this->stytil_textinput('p a:hover text-decoration', 'st3_p_ahover_txt_decor', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('p a:hover color', 'st3_p_ahover_color', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('p a:hover font-weight', 'st3_p_ahover_font_weight', 'stylethree', $active_tab );
		
		$form_fields .= $this->stytil_textinput('blockquote font', 'st3_blckquote_font', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('blockquote Google Font', 'st3_blockquote_google_font', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('blockquote Google Font Styles', 'st3_blockquote_google_font_styles', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('blockquote font-size', 'st3_blckquote_font_size', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('blockquote line-height', 'st3_blckquote_line_height', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('blockquote letter-spacing', 'st3_blckquote_letter_spacing', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('blockquote color', 'st3_blckquote_color', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('blockquote font-weight', 'st3_blckquote_font_weight', 'stylethree', $active_tab );	
		$form_fields .= $this->stytil_textinput('blockquote margin (shorthand)', 'st3_blckquote_margin', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('blockquote padding (shorthand)', 'st3_blckquote_padding', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('blockquote boder left', 'st3_blckquote_border-left', 'stylethree', $active_tab );		

		$form_fields .= $this->stytil_menu_sub_title ( 'Media', true, 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('image upload 1', 'st3_media_image_one', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('image upload 2', 'st3_media_image_two', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('image upload 3', 'st3_media_image_three', 'stylethree', $active_tab );
		$form_fields .= $this->stytil_textinput('image upload 4', 'st3_media_image_four', 'stylethree', $active_tab );
		echo '<table class="form-table">'.$form_fields.'</table>';

		submit_button(); 
		echo '</form></div><!-- .wrap -->';		
		

	}
	
	/********************************************//**
	 * Function: to apply settings to theme customizer
	 ***********************************************/
	function stytil_customizer($wp_customize) {
		
		//Create Customize Section: 1. Style Tile One Doc
		$wp_customize->add_section( 'stytil_one_doc', array(
		    'title'          => __( '1. Document', 'styltil' ),
		    'priority'       => 34,
		) );
		
		
		//Add option BG Image
		$wp_customize->add_setting( 'stytil_options[stytil_st1_bg_image]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'stytil_st1_bg_image', array(
			'label'   => __( 'Background Image', 'stytil' ),
			'section' => 'stytil_one_doc',
			'settings'   => 'stytil_options[stytil_st1_bg_image]',
			'priority' => 1
		) ) );
		
		//Add Option BG Color
		$wp_customize->add_setting( 'stytil_options[stytil_st1_bg_color]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st1_bg_color', array(
			'label'   => __( 'Background Color', 'stytil' ),
			'section' => 'stytil_one_doc',
			'settings'   => 'stytil_options[stytil_st1_bg_color]',
			'priority' => 2
		) ) );
		
		
		
		//Create Customize Section: 1. Style Tile One Tone and Brand
		$wp_customize->add_section( 'stytil_one_tone', array(
		    'title'          => __( '1. Tone and Brand', 'styltil' ),
		    'priority'       => 35,
		) );	
		
		//Add Option logo
		$wp_customize->add_setting( 'stytil_options[stytil_st1_logo]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'st1_logo', array(
			'label'   => __( 'Logo', 'stytil' ),
			'section' => 'stytil_one_tone',
			'settings'   => 'stytil_options[stytil_st1_logo]',
			'priority' => 0
		) ) );	
		
		//Add Option color palette 1 
		$wp_customize->add_setting( 'stytil_options[stytil_st1_color_one]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st1_color_one', array(
			'label'   => __( 'Color 1', 'stytil' ),
			'section' => 'stytil_one_tone',
			'settings'   => 'stytil_options[stytil_st1_color_one]',
			'priority' => 1
		) ) );

		
		//Add Option color palette 2 
		$wp_customize->add_setting( 'stytil_options[stytil_st1_color_two]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st1_color_two', array(
			'label'   => __( 'Color 2', 'stytil' ),
			'section' => 'stytil_one_tone',
			'settings'   => 'stytil_options[stytil_st1_color_two]',
			'priority' => 2
		) ) );
		
		//Add Option color palette 3 
		$wp_customize->add_setting( 'stytil_options[stytil_st1_color_three]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st1_color_three', array(
			'label'   => __( 'Color 3', 'stytil' ),
			'section' => 'stytil_one_tone',
			'settings'   => 'stytil_options[stytil_st1_color_three]',
			'priority' => 3
		) ) );
		
		//Add Option color palette 4 
		$wp_customize->add_setting( 'stytil_options[stytil_st1_color_four]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st1_color_four', array(
			'label'   => __( 'Color 4', 'stytil' ),
			'section' => 'stytil_one_tone',
			'settings'   => 'stytil_options[stytil_st1_color_four]',
			'priority' => 4
		) ) );
		
		//Add Option color palette 5 
		$wp_customize->add_setting( 'stytil_options[stytil_st1_color_five]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st1_color_five', array(
			'label'   => __( 'Color 5', 'stytil' ),
			'section' => 'stytil_one_tone',
			'settings'   => 'stytil_options[stytil_st1_color_five]',
			'priority' => 5
		) ) );


		//Add Option logo
		$wp_customize->add_setting( 'stytil_options[stytil_st1_accent]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'st1_accent', array(
			'label'   => __( 'Accent', 'stytil' ),
			'section' => 'stytil_one_tone',
			'settings'   => 'stytil_options[stytil_st1_accent]',
			'priority' => 6
		) ) );	


		//Add Option Descriptive Adjective 1
		$wp_customize->add_setting( 'stytil_options[stytil_st1_adjective_one]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st1_adjective_one', array(
			'label'   => __( 'Descriptive Adjective 1', 'stytil' ),
			'section' => 'stytil_one_tone',
			'settings'   => 'stytil_options[stytil_st1_adjective_one]',
			'priority' => 7
		) );	

		//Add Option Descriptive Adjective 2
		$wp_customize->add_setting( 'stytil_options[stytil_st1_adjective_two]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st1_adjective_two', array(
			'label'   => __( 'Descriptive Adjective 2', 'stytil' ),
			'section' => 'stytil_one_tone',
			'settings'   => 'stytil_options[stytil_st1_adjective_two]',
			'priority' => 8
		) );	

		//Add Option Descriptive Adjective 3
		$wp_customize->add_setting( 'stytil_options[stytil_st1_adjective_three]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st1_adjective_three', array(
			'label'   => __( 'Descriptive Adjective 3', 'stytil' ),
			'section' => 'stytil_one_tone',
			'settings'   => 'stytil_options[stytil_st1_adjective_three]',
			'priority' => 9
		) );		

		//Add Option Descriptive Adjective 4
		$wp_customize->add_setting( 'stytil_options[stytil_st1_adjective_four]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st1_adjective_four', array(
			'label'   => __( 'Descriptive Adjective 4', 'stytil' ),
			'section' => 'stytil_one_tone',
			'settings'   => 'stytil_options[stytil_st1_adjective_four]',
			'priority' => 10
		) );	

		//Add Option Descriptive Adjective 5
		$wp_customize->add_setting( 'stytil_options[stytil_st1_adjective_five]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st1_adjective_five', array(
			'label'   => __( 'Descriptive Adjective 5', 'stytil' ),
			'section' => 'stytil_one_tone',
			'settings'   => 'stytil_options[stytil_st1_adjective_five]',
			'priority' => 11
		) );	
		
		
		
		//Create Customize Section: 1. Style Tile One Typography
		$wp_customize->add_section( 'stytil_one_type', array(
		    'title'          => __( '1. Typography', 'styltil' ),
		    'priority'       => 36,
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st1_h1_font]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st1_h1_font', array(
			'label'   => __( '<h1> font', 'stytil' ),
			'section' => 'stytil_one_type',
			'settings'   => 'stytil_options[stytil_st1_h1_font]',
			'priority' => 0
		) );
		
		$wp_customize->add_setting( 'stytil_options[stytil_st1_h1_google_font]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st1_h1_google_font', array(
			'label'   => __( '<h1> Google Font', 'stytil' ),
			'section' => 'stytil_one_type',
			'settings'   => 'stytil_options[stytil_st1_h1_google_font]',
			'priority' => 1
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st1_h1_google_font_styles]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st1_h1_google_font_styles', array(
			'label'   => __( '<h1> Google Font Styles', 'stytil' ),
			'section' => 'stytil_one_type',
			'settings'   => 'stytil_options[stytil_st1_h1_google_font_styles]',
			'priority' => 2
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st1_h1_font_size]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st1_h1_font_size', array(
			'label'   => __( '<h1> font size', 'stytil' ),
			'section' => 'stytil_one_type',
			'settings'   => 'stytil_options[stytil_st1_h1_font_size]',
			'priority' => 3
		) );
		
		$wp_customize->add_setting( 'stytil_options[stytil_st1_h1_font_weight]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st1_h1_font_weight', array(
			'label'   => __( '<h1> font weight', 'stytil' ),
			'section' => 'stytil_one_type',
			'settings'   => 'stytil_options[stytil_st1_h1_font_weight]',
			'priority' => 4
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st1_h1_line_height]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st1_h1_line_height', array(
			'label'   => __( '<h1> line height', 'stytil' ),
			'section' => 'stytil_one_type',
			'settings'   => 'stytil_options[stytil_st1_h1_line_height]',
			'priority' => 5
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st1_h1_letter_spacing]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st1_h1_letter_spacing', array(
			'label'   => __( '<h1> letter spacing', 'stytil' ),
			'section' => 'stytil_one_type',
			'settings'   => 'stytil_options[stytil_st1_h1_letter_spacing]',
			'priority' => 6
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st1_h1_color]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st1_h1_color', array(
			'label'   => __( '<h1> color', 'stytil' ),
			'section' => 'stytil_one_type',
			'settings'   => 'stytil_options[stytil_st1_h1_color]',
			'priority' => 7
		) ) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st1_h2_font]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st1_h2_font', array(
			'label'   => __( '<h2> font', 'stytil' ),
			'section' => 'stytil_one_type',
			'settings'   => 'stytil_options[stytil_st1_h2_font]',
			'priority' => 8
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st1_h2_google_font]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st1_h2_google_font', array(
			'label'   => __( '<h2> Google Font', 'stytil' ),
			'section' => 'stytil_one_type',
			'settings'   => 'stytil_options[stytil_st1_h2_google_font]',
			'priority' => 9
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st1_h2_google_font_styles]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st1_h2_google_font_styles', array(
			'label'   => __( '<h2> Google Font Styles', 'stytil' ),
			'section' => 'stytil_one_type',
			'settings'   => 'stytil_options[stytil_st1_h2_google_font_styles]',
			'priority' => 10
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st1_h2_font_size]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st1_h2_font_size', array(
			'label'   => __( '<h2> font size', 'stytil' ),
			'section' => 'stytil_one_type',
			'settings'   => 'stytil_options[stytil_st1_h2_font_size]',
			'priority' => 11
		) );
		
		$wp_customize->add_setting( 'stytil_options[stytil_st1_h2_font_weight]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st1_h2_font_weight', array(
			'label'   => __( '<h2> font weight', 'stytil' ),
			'section' => 'stytil_one_type',
			'settings'   => 'stytil_options[stytil_st1_h2_font_weight]',
			'priority' => 12
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st1_h2_line_height]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st1_h2_line_height', array(
			'label'   => __( '<h2> line height', 'stytil' ),
			'section' => 'stytil_one_type',
			'settings'   => 'stytil_options[stytil_st1_h2_line_height]',
			'priority' => 13
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st1_h2_letter_spacing]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st1_h2_letter_spacing', array(
			'label'   => __( '<h2> letter spacing', 'stytil' ),
			'section' => 'stytil_one_type',
			'settings'   => 'stytil_options[stytil_st1_h2_letter_spacing]',
			'priority' => 14
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st1_h2_color]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st1_h2_color', array(
			'label'   => __( '<h2> color', 'stytil' ),
			'section' => 'stytil_one_type',
			'settings'   => 'stytil_options[stytil_st1_h2_color]',
			'priority' => 15
		) ) );
		
		$wp_customize->add_setting( 'stytil_options[stytil_st1_p_font]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st1_p_font', array(
			'label'   => __( '<p> font', 'stytil' ),
			'section' => 'stytil_one_type',
			'settings'   => 'stytil_options[stytil_st1_p_font]',
			'priority' => 16
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st1_p_google_font]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st1_p_google_font', array(
			'label'   => __( '<p> Google Font', 'stytil' ),
			'section' => 'stytil_one_type',
			'settings'   => 'stytil_options[stytil_st1_p_google_font]',
			'priority' => 17
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st1_p_google_font_styles]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st1_p_google_font_styles', array(
			'label'   => __( '<p> Google Font Styles', 'stytil' ),
			'section' => 'stytil_one_type',
			'settings'   => 'stytil_options[stytil_st1_p_google_font_styles]',
			'priority' => 18
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st1_p_font_size]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st1_p_font_size', array(
			'label'   => __( '<p> font size', 'stytil' ),
			'section' => 'stytil_one_type',
			'settings'   => 'stytil_options[stytil_st1_p_font_size]',
			'priority' => 19
		) );
		
		$wp_customize->add_setting( 'stytil_options[stytil_st1_p_font_weight]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st1_p_font_weight', array(
			'label'   => __( '<p> font weight', 'stytil' ),
			'section' => 'stytil_one_type',
			'settings'   => 'stytil_options[stytil_st1_p_font_weight]',
			'priority' => 20
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st1_p_line_height]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st1_p_line_height', array(
			'label'   => __( '<p> line height', 'stytil' ),
			'section' => 'stytil_one_type',
			'settings'   => 'stytil_options[stytil_st1_p_line_height]',
			'priority' => 21
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st1_p_letter_spacing]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st1_p_letter_spacing', array(
			'label'   => __( '<p> letter spacing', 'stytil' ),
			'section' => 'stytil_one_type',
			'settings'   => 'stytil_options[stytil_st1_p_letter_spacing]',
			'priority' => 22
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st1_p_color]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st1_p_color', array(
			'label'   => __( '<p> color', 'stytil' ),
			'section' => 'stytil_one_type',
			'settings'   => 'stytil_options[stytil_st1_p_color]',
			'priority' => 23
		) ) );		
		
		$wp_customize->add_setting( 'stytil_options[stytil_st1_p_a_txt_decor]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st1_p_a_txt_decor', array(
			'label'   => __( '<p> <a> text decoration', 'stytil' ),
			'section' => 'stytil_one_type',
			'settings'   => 'stytil_options[stytil_st1_p_a_txt_decor]',
			'priority' => 24
		) );		
		
		$wp_customize->add_setting( 'stytil_options[stytil_st1_p_a_color]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st1_p_a_color', array(
			'label'   => __( '<p> <a> color', 'stytil' ),
			'section' => 'stytil_one_type',
			'settings'   => 'stytil_options[stytil_st1_p_a_color]',
			'priority' => 25
		) ) );				
		
		$wp_customize->add_setting( 'stytil_options[stytil_st1_p_a_font_weight]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st1_p_a_font_weight', array(
			'label'   => __( '<p> <a> font-weight', 'stytil' ),
			'section' => 'stytil_one_type',
			'settings'   => 'stytil_options[stytil_st1_p_a_font_weight]',
			'priority' => 26
		) );	

		$wp_customize->add_setting( 'stytil_options[stytil_st1_p_ahover_txt_decor]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st1_p_ahover_txt_decor', array(
			'label'   => __( '<p> <a> hover text decoration', 'stytil' ),
			'section' => 'stytil_one_type',
			'settings'   => 'stytil_options[stytil_st1_p_ahover_txt_decor]',
			'priority' => 27
		) );		
		
		$wp_customize->add_setting( 'stytil_options[stytil_st1_p_ahover_color]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st1_p_ahover_color', array(
			'label'   => __( '<p> <a> hover color', 'stytil' ),
			'section' => 'stytil_one_type',
			'settings'   => 'stytil_options[stytil_st1_p_ahover_color]',
			'priority' => 28
		) ) );				
		
		$wp_customize->add_setting( 'stytil_options[stytil_st1_p_ahover_font_weight]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st1_p_ahover_font_weight', array(
			'label'   => __( '<p> <a> hover font-weight', 'stytil' ),
			'section' => 'stytil_one_type',
			'settings'   => 'stytil_options[stytil_st1_p_ahover_font_weight]',
			'priority' => 29
		) );	
		
		
		$wp_customize->add_setting( 'stytil_options[stytil_st1_p_ahover_font_weight]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st1_p_ahover_font_weight', array(
			'label'   => __( '<p> <a> hover font-weight', 'stytil' ),
			'section' => 'stytil_one_type',
			'settings'   => 'stytil_options[stytil_st1_p_ahover_font_weight]',
			'priority' => 30
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st1_blckquote_font]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st1_blckquote_font', array(
			'label'   => __( '<blckquote> font', 'stytil' ),
			'section' => 'stytil_one_type',
			'settings'   => 'stytil_options[stytil_st1_blckquote_font]',
			'priority' => 31
		) );	
		$wp_customize->add_setting( 'stytil_options[stytil_st1_blckquote_google_font]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st1_blckquote_google_font', array(
			'label'   => __( '<blckquote> Google Font', 'stytil' ),
			'section' => 'stytil_one_type',
			'settings'   => 'stytil_options[stytil_st1_blckquote_google_font]',
			'priority' => 32
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st1_blckquote_google_font_styles]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st1_blckquote_google_font_styles', array(
			'label'   => __( '<blckquote> Google Font Styles', 'stytil' ),
			'section' => 'stytil_one_type',
			'settings'   => 'stytil_options[stytil_st1_blckquote_google_font_styles]',
			'priority' => 33
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st1_blckquote_font_size]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st1_blckquote_font_size', array(
			'label'   => __( '<blckquote> font size', 'stytil' ),
			'section' => 'stytil_one_type',
			'settings'   => 'stytil_options[stytil_st1_blckquote_font_size]',
			'priority' => 34
		) );
		
		$wp_customize->add_setting( 'stytil_options[stytil_st1_blckquote_font_weight]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st1_blckquote_font_weight', array(
			'label'   => __( '<blckquote> font weight', 'stytil' ),
			'section' => 'stytil_one_type',
			'settings'   => 'stytil_options[stytil_st1_blckquote_font_weight]',
			'priority' => 35
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st1_blckquote_line_height]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st1_blckquote_line_height', array(
			'label'   => __( '<blckquote> line height', 'stytil' ),
			'section' => 'stytil_one_type',
			'settings'   => 'stytil_options[stytil_st1_blckquote_line_height]',
			'priority' => 36
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st1_blckquote_letter_spacing]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st1_blckquote_letter_spacing', array(
			'label'   => __( '<blckquote> letter spacing', 'stytil' ),
			'section' => 'stytil_one_type',
			'settings'   => 'stytil_options[stytil_st1_blckquote_letter_spacing]',
			'priority' => 37
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st1_blckquote_color]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st1_blckquote_color', array(
			'label'   => __( '<blckquote> color', 'stytil' ),
			'section' => 'stytil_one_type',
			'settings'   => 'stytil_options[stytil_st1_blckquote_color]',
			'priority' => 38
		) ) );
		
		$wp_customize->add_setting( 'stytil_options[stytil_st1_blckquote_margin]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st1_blckquote_margin', array(
			'label'   => __( '<blckquote> margin', 'stytil' ),
			'section' => 'stytil_one_type',
			'settings'   => 'stytil_options[stytil_st1_blckquote_margin]',
			'priority' => 39
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st1_blckquote_padding]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st1_blckquote_padding', array(
			'label'   => __( '<blckquote> padding', 'stytil' ),
			'section' => 'stytil_one_type',
			'settings'   => 'stytil_options[stytil_st1_blckquote_padding]',
			'priority' => 40
		) );
		
		$wp_customize->add_setting( 'stytil_options[stytil_st1_blckquote_border-left]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st1_blckquote_border-left', array(
			'label'   => __( '<blckquote> border-left', 'stytil' ),
			'section' => 'stytil_one_type',
			'settings'   => 'stytil_options[stytil_st1_blckquote_border-left]',
			'priority' => 41
		) );		
		
		
		
		//Create Customize Section: 1. Media
		$wp_customize->add_section( 'stytil_one_media', array(
		    'title'          => __( '1. Media', 'styltil' ),
		    'priority'       => 38,
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st1_media_image_one]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'stytil_st1_media_image_one', array(
			'label'   => __( 'Photo 1', 'stytil' ),
			'section' => 'stytil_one_media',
			'settings'   => 'stytil_options[stytil_st1_media_image_one]',
			'priority' => 0
		) ) );
		
		$wp_customize->add_setting( 'stytil_options[stytil_st1_media_image_two]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'stytil_st1_media_image_two', array(
			'label'   => __( 'Photo 2', 'stytil' ),
			'section' => 'stytil_one_media',
			'settings'   => 'stytil_options[stytil_st1_media_image_two]',
			'priority' => 2
		) ) );
		
		$wp_customize->add_setting( 'stytil_options[stytil_st1_media_image_three]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'stytil_st1_media_image_three', array(
			'label'   => __( 'Photo 3', 'stytil' ),
			'section' => 'stytil_one_media',
			'settings'   => 'stytil_options[stytil_st1_media_image_three]',
			'priority' => 3
		) ) );
		
		$wp_customize->add_setting( 'stytil_options[stytil_st1_media_image_four]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'stytil_st1_media_image_four', array(
			'label'   => __( 'Photo 4', 'stytil' ),
			'section' => 'stytil_one_media',
			'settings'   => 'stytil_options[stytil_st1_media_image_four]',
			'priority' => 4
		) ) );
		
		
		
		//Create Customize Section: 2. Style Tile One Doc
		$wp_customize->add_section( 'stytil_two_doc', array(
		    'title'          => __( '2. Document', 'styltil' ),
		    'priority'       => 39,
		) );
		
		
		//Add option BG Image
		$wp_customize->add_setting( 'stytil_options[stytil_st2_bg_image]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'stytil_st2_bg_image', array(
			'label'   => __( 'Background Image', 'stytil' ),
			'section' => 'stytil_two_doc',
			'settings'   => 'stytil_options[stytil_st2_bg_image]',
			'priority' => 1
		) ) );
		
		//Add Option BG Color
		$wp_customize->add_setting( 'stytil_options[stytil_st2_bg_color]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st2_bg_color', array(
			'label'   => __( 'Background Color', 'stytil' ),
			'section' => 'stytil_two_doc',
			'settings'   => 'stytil_options[stytil_st2_bg_color]',
			'priority' => 2
		) ) );
		
		
		
		//Create Customize Section: 2. Style Tile One Tone and Brand
		$wp_customize->add_section( 'stytil_two_tone', array(
		    'title'          => __( '2. Tone and Brand', 'styltil' ),
		    'priority'       => 40,
		) );	
		
		//Add Option logo
		$wp_customize->add_setting( 'stytil_options[stytil_st2_logo]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'st2_logo', array(
			'label'   => __( 'Logo', 'stytil' ),
			'section' => 'stytil_two_tone',
			'settings'   => 'stytil_options[stytil_st2_logo]',
			'priority' => 3
		) ) );	
		
		//Add Option color palette 1 
		$wp_customize->add_setting( 'stytil_options[stytil_st2_color_one]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st2_color_one', array(
			'label'   => __( 'Color 1', 'stytil' ),
			'section' => 'stytil_two_tone',
			'settings'   => 'stytil_options[stytil_st2_color_one]',
			'priority' => 4
		) ) );

		
		//Add Option color palette 2 
		$wp_customize->add_setting( 'stytil_options[stytil_st2_color_two]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st2_color_two', array(
			'label'   => __( 'Color 2', 'stytil' ),
			'section' => 'stytil_two_tone',
			'settings'   => 'stytil_options[stytil_st2_color_two]',
			'priority' => 5
		) ) );
		
		//Add Option color palette 3 
		$wp_customize->add_setting( 'stytil_options[stytil_st2_color_four]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st2_color_four', array(
			'label'   => __( 'Color 3', 'stytil' ),
			'section' => 'stytil_two_tone',
			'settings'   => 'stytil_options[stytil_st2_color_four]',
			'priority' => 6
		) ) );
		
		//Add Option color palette 4 
		$wp_customize->add_setting( 'stytil_options[stytil_st2_color_four]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st2_color_four', array(
			'label'   => __( 'Color 4', 'stytil' ),
			'section' => 'stytil_two_tone',
			'settings'   => 'stytil_options[stytil_st2_color_four]',
			'priority' => 7
		) ) );
		
		//Add Option color palette 5 
		$wp_customize->add_setting( 'stytil_options[stytil_st2_color_five]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st2_color_five', array(
			'label'   => __( 'Color 5', 'stytil' ),
			'section' => 'stytil_two_tone',
			'settings'   => 'stytil_options[stytil_st2_color_five]',
			'priority' => 8
		) ) );


		//Add Option logo
		$wp_customize->add_setting( 'stytil_options[stytil_st2_accent]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'st2_accent', array(
			'label'   => __( 'Accent', 'stytil' ),
			'section' => 'stytil_two_tone',
			'settings'   => 'stytil_options[stytil_st2_accent]',
			'priority' => 9
		) ) );	


		//Add Option Descriptive Adjective 1
		$wp_customize->add_setting( 'stytil_options[stytil_st2_adjective_one]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st2_adjective_one', array(
			'label'   => __( 'Descriptive Adjective 1', 'stytil' ),
			'section' => 'stytil_two_tone',
			'settings'   => 'stytil_options[stytil_st2_adjective_one]',
			'priority' => 10
		) );	

		//Add Option Descriptive Adjective 2
		$wp_customize->add_setting( 'stytil_options[stytil_st2_adjective_two]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st2_adjective_two', array(
			'label'   => __( 'Descriptive Adjective 2', 'stytil' ),
			'section' => 'stytil_two_tone',
			'settings'   => 'stytil_options[stytil_st2_adjective_two]',
			'priority' => 11
		) );	

		//Add Option Descriptive Adjective 3
		$wp_customize->add_setting( 'stytil_options[stytil_st2_adjective_three]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st2_adjective_three', array(
			'label'   => __( 'Descriptive Adjective 3', 'stytil' ),
			'section' => 'stytil_two_tone',
			'settings'   => 'stytil_options[stytil_st2_adjective_three]',
			'priority' => 12
		) );		

		//Add Option Descriptive Adjective 4
		$wp_customize->add_setting( 'stytil_options[stytil_st2_adjective_four]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st2_adjective_four', array(
			'label'   => __( 'Descriptive Adjective 4', 'stytil' ),
			'section' => 'stytil_two_tone',
			'settings'   => 'stytil_options[stytil_st2_adjective_four]',
			'priority' => 13
		) );	

		//Add Option Descriptive Adjective 5
		$wp_customize->add_setting( 'stytil_options[stytil_st2_adjective_five]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st2_adjective_five', array(
			'label'   => __( 'Descriptive Adjective 5', 'stytil' ),
			'section' => 'stytil_two_tone',
			'settings'   => 'stytil_options[stytil_st2_adjective_five]',
			'priority' => 14
		) );	
		
		
		
		//Create Customize Section: 2. Style Tile One Typography
		$wp_customize->add_section( 'stytil_two_type', array(
		    'title'          => __( '2. Typography', 'styltil' ),
		    'priority'       => 41,
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st2_h1_font]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st2_h1_font', array(
			'label'   => __( '<h1> font', 'stytil' ),
			'section' => 'stytil_two_type',
			'settings'   => 'stytil_options[stytil_st2_h1_font]',
			'priority' => 0
		) );	
		$wp_customize->add_setting( 'stytil_options[stytil_st2_h1_google_font]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st2_h1_google_font', array(
			'label'   => __( '<h1> Google Font', 'stytil' ),
			'section' => 'stytil_two_type',
			'settings'   => 'stytil_options[stytil_st2_h1_google_font]',
			'priority' => 1
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st2_h1_google_font_styles]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st2_h1_google_font_styles', array(
			'label'   => __( '<h1> Google Font Styles', 'stytil' ),
			'section' => 'stytil_two_type',
			'settings'   => 'stytil_options[stytil_st2_h1_google_font_styles]',
			'priority' => 2
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st2_h1_font_size]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st2_h1_font_size', array(
			'label'   => __( '<h1> font size', 'stytil' ),
			'section' => 'stytil_two_type',
			'settings'   => 'stytil_options[stytil_st2_h1_font_size]',
			'priority' => 3
		) );
		
		$wp_customize->add_setting( 'stytil_options[stytil_st2_h1_font_weight]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st2_h1_font_weight', array(
			'label'   => __( '<h1> font weight', 'stytil' ),
			'section' => 'stytil_two_type',
			'settings'   => 'stytil_options[stytil_st2_h1_font_weight]',
			'priority' => 4
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st2_h1_line_height]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st2_h1_line_height', array(
			'label'   => __( '<h1> line height', 'stytil' ),
			'section' => 'stytil_two_type',
			'settings'   => 'stytil_options[stytil_st2_h1_line_height]',
			'priority' => 5
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st2_h1_letter_spacing]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st2_h1_letter_spacing', array(
			'label'   => __( '<h1> letter spacing', 'stytil' ),
			'section' => 'stytil_two_type',
			'settings'   => 'stytil_options[stytil_st2_h1_letter_spacing]',
			'priority' => 6
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st2_h1_color]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st2_h1_color', array(
			'label'   => __( '<h1> color', 'stytil' ),
			'section' => 'stytil_two_type',
			'settings'   => 'stytil_options[stytil_st2_h1_color]',
			'priority' => 7
		) ) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st2_h2_font]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st2_h2_font', array(
			'label'   => __( '<h2> font', 'stytil' ),
			'section' => 'stytil_two_type',
			'settings'   => 'stytil_options[stytil_st2_h2_font]',
			'priority' => 8
		) );	
		$wp_customize->add_setting( 'stytil_options[stytil_st2_h2_google_font]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st2_h2_google_font', array(
			'label'   => __( '<h2> Google Font', 'stytil' ),
			'section' => 'stytil_two_type',
			'settings'   => 'stytil_options[stytil_st2_h2_google_font]',
			'priority' => 9
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st2_h2_google_font_styles]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st2_h2_google_font_styles', array(
			'label'   => __( '<h2> Google Font Styles', 'stytil' ),
			'section' => 'stytil_two_type',
			'settings'   => 'stytil_options[stytil_st2_h2_google_font_styles]',
			'priority' => 10
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st2_h2_font_size]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st2_h2_font_size', array(
			'label'   => __( '<h2> font size', 'stytil' ),
			'section' => 'stytil_two_type',
			'settings'   => 'stytil_options[stytil_st2_h2_font_size]',
			'priority' => 11
		) );
		
		$wp_customize->add_setting( 'stytil_options[stytil_st2_h2_font_weight]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st2_h2_font_weight', array(
			'label'   => __( '<h2> font weight', 'stytil' ),
			'section' => 'stytil_two_type',
			'settings'   => 'stytil_options[stytil_st2_h2_font_weight]',
			'priority' => 12
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st2_h2_line_height]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st2_h2_line_height', array(
			'label'   => __( '<h2> line height', 'stytil' ),
			'section' => 'stytil_two_type',
			'settings'   => 'stytil_options[stytil_st2_h2_line_height]',
			'priority' => 13
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st2_h2_letter_spacing]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st2_h2_letter_spacing', array(
			'label'   => __( '<h2> letter spacing', 'stytil' ),
			'section' => 'stytil_two_type',
			'settings'   => 'stytil_options[stytil_st2_h2_letter_spacing]',
			'priority' => 14
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st2_h2_color]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st2_h2_color', array(
			'label'   => __( '<h2> color', 'stytil' ),
			'section' => 'stytil_two_type',
			'settings'   => 'stytil_options[stytil_st2_h2_color]',
			'priority' => 15
		) ) );
		
		$wp_customize->add_setting( 'stytil_options[stytil_st2_p_font]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st2_p_font', array(
			'label'   => __( '<p> font', 'stytil' ),
			'section' => 'stytil_two_type',
			'settings'   => 'stytil_options[stytil_st2_p_font]',
			'priority' => 16
		) );	
		$wp_customize->add_setting( 'stytil_options[stytil_st2_p_google_font]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st2_p_google_font', array(
			'label'   => __( '<p> Google Font', 'stytil' ),
			'section' => 'stytil_two_type',
			'settings'   => 'stytil_options[stytil_st2_p_google_font]',
			'priority' => 17
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st2_p_google_font_styles]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st2_p_google_font_styles', array(
			'label'   => __( '<p> Google Font Styles', 'stytil' ),
			'section' => 'stytil_two_type',
			'settings'   => 'stytil_options[stytil_st2_p_google_font_styles]',
			'priority' => 18
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st2_p_font_size]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st2_p_font_size', array(
			'label'   => __( '<p> font size', 'stytil' ),
			'section' => 'stytil_two_type',
			'settings'   => 'stytil_options[stytil_st2_p_font_size]',
			'priority' => 19
		) );
		
		$wp_customize->add_setting( 'stytil_options[stytil_st2_p_font_weight]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st2_p_font_weight', array(
			'label'   => __( '<p> font weight', 'stytil' ),
			'section' => 'stytil_two_type',
			'settings'   => 'stytil_options[stytil_st2_p_font_weight]',
			'priority' => 20
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st2_p_line_height]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st2_p_line_height', array(
			'label'   => __( '<p> line height', 'stytil' ),
			'section' => 'stytil_two_type',
			'settings'   => 'stytil_options[stytil_st2_p_line_height]',
			'priority' => 21
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st2_p_letter_spacing]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st2_p_letter_spacing', array(
			'label'   => __( '<p> letter spacing', 'stytil' ),
			'section' => 'stytil_two_type',
			'settings'   => 'stytil_options[stytil_st2_p_letter_spacing]',
			'priority' => 22
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st2_p_color]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st2_p_color', array(
			'label'   => __( '<p> color', 'stytil' ),
			'section' => 'stytil_two_type',
			'settings'   => 'stytil_options[stytil_st2_p_color]',
			'priority' => 23
		) ) );		
		
		$wp_customize->add_setting( 'stytil_options[stytil_st2_p_a_txt_decor]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st2_p_a_txt_decor', array(
			'label'   => __( '<p> <a> text decoration', 'stytil' ),
			'section' => 'stytil_two_type',
			'settings'   => 'stytil_options[stytil_st2_p_a_txt_decor]',
			'priority' => 24
		) );		
		
		$wp_customize->add_setting( 'stytil_options[stytil_st2_p_a_color]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st2_p_a_color', array(
			'label'   => __( '<p> <a> color', 'stytil' ),
			'section' => 'stytil_two_type',
			'settings'   => 'stytil_options[stytil_st2_p_a_color]',
			'priority' => 25
		) ) );				
		
		$wp_customize->add_setting( 'stytil_options[stytil_st2_p_a_font_weight]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st2_p_a_font_weight', array(
			'label'   => __( '<p> <a> font-weight', 'stytil' ),
			'section' => 'stytil_two_type',
			'settings'   => 'stytil_options[stytil_st2_p_a_font_weight]',
			'priority' => 26
		) );	

		$wp_customize->add_setting( 'stytil_options[stytil_st2_p_ahover_txt_decor]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st2_p_ahover_txt_decor', array(
			'label'   => __( '<p> <a> hover text decoration', 'stytil' ),
			'section' => 'stytil_two_type',
			'settings'   => 'stytil_options[stytil_st2_p_ahover_txt_decor]',
			'priority' => 27
		) );		
		
		$wp_customize->add_setting( 'stytil_options[stytil_st2_p_ahover_color]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st2_p_ahover_color', array(
			'label'   => __( '<p> <a> hover color', 'stytil' ),
			'section' => 'stytil_two_type',
			'settings'   => 'stytil_options[stytil_st2_p_ahover_color]',
			'priority' => 28
		) ) );				
		
		$wp_customize->add_setting( 'stytil_options[stytil_st2_p_ahover_font_weight]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st2_p_ahover_font_weight', array(
			'label'   => __( '<p> <a> hover font-weight', 'stytil' ),
			'section' => 'stytil_two_type',
			'settings'   => 'stytil_options[stytil_st2_p_ahover_font_weight]',
			'priority' => 29
		) );	
		
		
		$wp_customize->add_setting( 'stytil_options[stytil_st2_p_ahover_font_weight]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st2_p_ahover_font_weight', array(
			'label'   => __( '<p> <a> hover font-weight', 'stytil' ),
			'section' => 'stytil_two_type',
			'settings'   => 'stytil_options[stytil_st2_p_ahover_font_weight]',
			'priority' => 30
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st2_blckquote_font]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st2_blckquote_font', array(
			'label'   => __( '<blckquote> font', 'stytil' ),
			'section' => 'stytil_two_type',
			'settings'   => 'stytil_options[stytil_st2_blckquote_font]',
			'priority' => 31
		) );	
		$wp_customize->add_setting( 'stytil_options[stytil_st2_blckquote_google_font]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st2_blckquote_google_font', array(
			'label'   => __( '<blckquote> Google Font', 'stytil' ),
			'section' => 'stytil_two_type',
			'settings'   => 'stytil_options[stytil_st2_blckquote_google_font]',
			'priority' => 32
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st2_blckquote_google_font_styles]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st2_blckquote_google_font_styles', array(
			'label'   => __( '<blckquote> Google Font Styles', 'stytil' ),
			'section' => 'stytil_two_type',
			'settings'   => 'stytil_options[stytil_st2_blckquote_google_font_styles]',
			'priority' => 33
		) );	
		$wp_customize->add_setting( 'stytil_options[stytil_st2_blckquote_font_size]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st2_blckquote_font_size', array(
			'label'   => __( '<blckquote> font size', 'stytil' ),
			'section' => 'stytil_two_type',
			'settings'   => 'stytil_options[stytil_st2_blckquote_font_size]',
			'priority' => 34
		) );
		
		$wp_customize->add_setting( 'stytil_options[stytil_st2_blckquote_font_weight]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st2_blckquote_font_weight', array(
			'label'   => __( '<blckquote> font weight', 'stytil' ),
			'section' => 'stytil_two_type',
			'settings'   => 'stytil_options[stytil_st2_blckquote_font_weight]',
			'priority' => 35
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st2_blckquote_line_height]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st2_blckquote_line_height', array(
			'label'   => __( '<blckquote> line height', 'stytil' ),
			'section' => 'stytil_two_type',
			'settings'   => 'stytil_options[stytil_st2_blckquote_line_height]',
			'priority' => 36
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st2_blckquote_letter_spacing]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st2_blckquote_letter_spacing', array(
			'label'   => __( '<blckquote> letter spacing', 'stytil' ),
			'section' => 'stytil_two_type',
			'settings'   => 'stytil_options[stytil_st2_blckquote_letter_spacing]',
			'priority' => 37
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st2_blckquote_color]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st2_blckquote_color', array(
			'label'   => __( '<blckquote> color', 'stytil' ),
			'section' => 'stytil_two_type',
			'settings'   => 'stytil_options[stytil_st2_blckquote_color]',
			'priority' => 38
		) ) );
		
		$wp_customize->add_setting( 'stytil_options[stytil_st2_blckquote_margin]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st2_blckquote_margin', array(
			'label'   => __( '<blckquote> margin', 'stytil' ),
			'section' => 'stytil_two_type',
			'settings'   => 'stytil_options[stytil_st2_blckquote_margin]',
			'priority' => 39
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st2_blckquote_padding]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st2_blckquote_padding', array(
			'label'   => __( '<blckquote> padding', 'stytil' ),
			'section' => 'stytil_two_type',
			'settings'   => 'stytil_options[stytil_st2_blckquote_padding]',
			'priority' => 40
		) );
		
		$wp_customize->add_setting( 'stytil_options[stytil_st2_blckquote_border-left]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st2_blckquote_border-left', array(
			'label'   => __( '<blckquote> border-left', 'stytil' ),
			'section' => 'stytil_two_type',
			'settings'   => 'stytil_options[stytil_st2_blckquote_border-left]',
			'priority' => 41
		) );		
		
		
		
		//Create Customize Section: 2. Media
		$wp_customize->add_section( 'stytil_two_media', array(
		    'title'          => __( '2. Media', 'styltil' ),
		    'priority'       => 42,
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st2_media_image_one]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'stytil_st2_media_image_one', array(
			'label'   => __( 'Photo 1', 'stytil' ),
			'section' => 'stytil_two_media',
			'settings'   => 'stytil_options[stytil_st2_media_image_one]',
			'priority' => 0
		) ) );
		
		$wp_customize->add_setting( 'stytil_options[stytil_st2_media_image_two]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'stytil_st2_media_image_two', array(
			'label'   => __( 'Photo 2', 'stytil' ),
			'section' => 'stytil_two_media',
			'settings'   => 'stytil_options[stytil_st2_media_image_two]',
			'priority' => 2
		) ) );
		
		$wp_customize->add_setting( 'stytil_options[stytil_st2_media_image_three]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'stytil_st2_media_image_three', array(
			'label'   => __( 'Photo 3', 'stytil' ),
			'section' => 'stytil_two_media',
			'settings'   => 'stytil_options[stytil_st2_media_image_three]',
			'priority' => 3
		) ) );
		
		$wp_customize->add_setting( 'stytil_options[stytil_st2_media_image_four]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'stytil_st2_media_image_four', array(
			'label'   => __( 'Photo 4', 'stytil' ),
			'section' => 'stytil_two_media',
			'settings'   => 'stytil_options[stytil_st2_media_image_four]',
			'priority' => 4
		) ) );
		
		
		
		
		
		
		//Create Customize Section: 3. Style Tile Three Doc
		$wp_customize->add_section( 'stytil_three_doc', array(
		    'title'          => __( '3. Document', 'styltil' ),
		    'priority'       => 43,
		) );
		
		
		//Add option BG Image
		$wp_customize->add_setting( 'stytil_options[stytil_st3_bg_image]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'stytil_st3_bg_image', array(
			'label'   => __( 'Background Image', 'stytil' ),
			'section' => 'stytil_three_doc',
			'settings'   => 'stytil_options[stytil_st3_bg_image]',
			'priority' => 1
		) ) );
		
		//Add Option BG Color
		$wp_customize->add_setting( 'stytil_options[stytil_st3_bg_color]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'stytil_st3_bg_color', array(
			'label'   => __( 'Background Color', 'stytil' ),
			'section' => 'stytil_three_doc',
			'settings'   => 'stytil_options[stytil_st3_bg_color]',
			'priority' => 2
		) ) );
		
		
		
		//Create Customize Section: 3. Style Tile Three Tone and Brand
		$wp_customize->add_section( 'stytil_three_tone', array(
		    'title'          => __( '3. Tone and Brand', 'styltil' ),
		    'priority'       => 44,
		) );	
		
		//Add Option logo
		$wp_customize->add_setting( 'stytil_options[stytil_st3_logo]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'stytil_st3_logo', array(
			'label'   => __( 'Logo', 'stytil' ),
			'section' => 'stytil_three_tone',
			'settings'   => 'stytil_options[stytil_st3_logo]',
			'priority' => 0
		) ) );	
		
		//Add Option color palette 1 
		$wp_customize->add_setting( 'stytil_options[stytil_st3_color_one]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'stytil_st3_color_one', array(
			'label'   => __( 'Color 1', 'stytil' ),
			'section' => 'stytil_three_tone',
			'settings'   => 'stytil_options[stytil_st3_color_one]',
			'priority' => 1
		) ) );

		
		//Add Option color palette 2 
		$wp_customize->add_setting( 'stytil_options[stytil_st3_color_two]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'stytil_st3_color_two', array(
			'label'   => __( 'Color 2', 'stytil' ),
			'section' => 'stytil_three_tone',
			'settings'   => 'stytil_options[stytil_st3_color_two]',
			'priority' => 2
		) ) );
		
		//Add Option color palette 3 
		$wp_customize->add_setting( 'stytil_options[stytil_st3_color_four]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'stytil_st3_color_four', array(
			'label'   => __( 'Color 3', 'stytil' ),
			'section' => 'stytil_three_tone',
			'settings'   => 'stytil_options[stytil_st3_color_four]',
			'priority' => 3
		) ) );
		
		//Add Option color palette 4 
		$wp_customize->add_setting( 'stytil_options[stytil_st3_color_four]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'stytil_st3_color_four', array(
			'label'   => __( 'Color 4', 'stytil' ),
			'section' => 'stytil_three_tone',
			'settings'   => 'stytil_options[stytil_st3_color_four]',
			'priority' => 4
		) ) );
		
		//Add Option color palette 5 
		$wp_customize->add_setting( 'stytil_options[stytil_st3_color_five]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'stytil_st3_color_five', array(
			'label'   => __( 'Color 5', 'stytil' ),
			'section' => 'stytil_three_tone',
			'settings'   => 'stytil_options[stytil_st3_color_five]',
			'priority' => 5
		) ) );


		//Add Option logo
		$wp_customize->add_setting( 'stytil_options[stytil_st3_accent]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'stytil_st3_accent', array(
			'label'   => __( 'Accent', 'stytil' ),
			'section' => 'stytil_three_tone',
			'settings'   => 'stytil_options[stytil_st3_accent]',
			'priority' => 6
		) ) );	


		//Add Option Descriptive Adjective 1
		$wp_customize->add_setting( 'stytil_options[stytil_st3_adjective_one]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st3_adjective_one', array(
			'label'   => __( 'Descriptive Adjective 1', 'stytil' ),
			'section' => 'stytil_three_tone',
			'settings'   => 'stytil_options[stytil_st3_adjective_one]',
			'priority' => 7
		) );	

		//Add Option Descriptive Adjective 2
		$wp_customize->add_setting( 'stytil_options[stytil_st3_adjective_two]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st3_adjective_two', array(
			'label'   => __( 'Descriptive Adjective 2', 'stytil' ),
			'section' => 'stytil_three_tone',
			'settings'   => 'stytil_options[stytil_st3_adjective_two]',
			'priority' => 8
		) );	

		//Add Option Descriptive Adjective 3
		$wp_customize->add_setting( 'stytil_options[stytil_st3_adjective_three]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st3_adjective_three', array(
			'label'   => __( 'Descriptive Adjective 3', 'stytil' ),
			'section' => 'stytil_three_tone',
			'settings'   => 'stytil_options[stytil_st3_adjective_three]',
			'priority' => 9
		) );		

		//Add Option Descriptive Adjective 4
		$wp_customize->add_setting( 'stytil_options[stytil_st3_adjective_four]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st3_adjective_four', array(
			'label'   => __( 'Descriptive Adjective 4', 'stytil' ),
			'section' => 'stytil_three_tone',
			'settings'   => 'stytil_options[stytil_st3_adjective_four]',
			'priority' => 10
		) );	

		//Add Option Descriptive Adjective 5
		$wp_customize->add_setting( 'stytil_options[stytil_st3_adjective_five]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st3_adjective_five', array(
			'label'   => __( 'Descriptive Adjective 5', 'stytil' ),
			'section' => 'stytil_three_tone',
			'settings'   => 'stytil_options[stytil_st3_adjective_five]',
			'priority' => 11
		) );	
		
		
		
		//Create Customize Section: 3. Style Tile Three Typography
		$wp_customize->add_section( 'stytil_three_type', array(
		    'title'          => __( '3. Typography', 'styltil' ),
		    'priority'       => 45,
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st3_h1_font]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st3_h1_font', array(
			'label'   => __( '<h1> font', 'stytil' ),
			'section' => 'stytil_three_type',
			'settings'   => 'stytil_options[stytil_st3_h1_font]',
			'priority' => 0
		) );	
		$wp_customize->add_setting( 'stytil_options[stytil_st3_h1_google_font]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st3_h1_google_font', array(
			'label'   => __( '<h1> Google Font', 'stytil' ),
			'section' => 'stytil_three_type',
			'settings'   => 'stytil_options[stytil_st3_h1_google_font]',
			'priority' => 1
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st3_h1_google_font_styles]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st3_h1_google_font_styles', array(
			'label'   => __( '<h1> Google Font Styles', 'stytil' ),
			'section' => 'stytil_three_type',
			'settings'   => 'stytil_options[stytil_st3_h1_google_font_styles]',
			'priority' => 2
		) );	
		$wp_customize->add_setting( 'stytil_options[stytil_st3_h1_font_size]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st3_h1_font_size', array(
			'label'   => __( '<h1> font size', 'stytil' ),
			'section' => 'stytil_three_type',
			'settings'   => 'stytil_options[stytil_st3_h1_font_size]',
			'priority' => 3
		) );
		
		$wp_customize->add_setting( 'stytil_options[stytil_st3_h1_font_weight]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st3_h1_font_weight', array(
			'label'   => __( '<h1> font weight', 'stytil' ),
			'section' => 'stytil_three_type',
			'settings'   => 'stytil_options[stytil_st3_h1_font_weight]',
			'priority' => 4
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st3_h1_line_height]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st3_h1_line_height', array(
			'label'   => __( '<h1> line height', 'stytil' ),
			'section' => 'stytil_three_type',
			'settings'   => 'stytil_options[stytil_st3_h1_line_height]',
			'priority' => 5
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st3_h1_letter_spacing]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st3_h1_letter_spacing', array(
			'label'   => __( '<h1> letter spacing', 'stytil' ),
			'section' => 'stytil_three_type',
			'settings'   => 'stytil_options[stytil_st3_h1_letter_spacing]',
			'priority' => 6
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st3_h1_color]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st3_h1_color', array(
			'label'   => __( '<h1> color', 'stytil' ),
			'section' => 'stytil_three_type',
			'settings'   => 'stytil_options[stytil_st3_h1_color]',
			'priority' => 7
		) ) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st3_h2_font]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st3_h2_font', array(
			'label'   => __( '<h2> font', 'stytil' ),
			'section' => 'stytil_three_type',
			'settings'   => 'stytil_options[stytil_st3_h2_font]',
			'priority' => 8
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st3_h2_google_font]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st3_h2_google_font', array(
			'label'   => __( '<h2> Google Font', 'stytil' ),
			'section' => 'stytil_three_type',
			'settings'   => 'stytil_options[stytil_st3_h2_google_font]',
			'priority' => 9
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st3_h2_google_font_styles]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st3_h2_google_font_styles', array(
			'label'   => __( '<h2> Google Font Styles', 'stytil' ),
			'section' => 'stytil_three_type',
			'settings'   => 'stytil_options[stytil_st3_h2_google_font_styles]',
			'priority' => 10
		) );	
		$wp_customize->add_setting( 'stytil_options[stytil_st3_h2_font_size]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st3_h2_font_size', array(
			'label'   => __( '<h2> font size', 'stytil' ),
			'section' => 'stytil_three_type',
			'settings'   => 'stytil_options[stytil_st3_h2_font_size]',
			'priority' => 11
		) );
		
		$wp_customize->add_setting( 'stytil_options[stytil_st3_h2_font_weight]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st3_h2_font_weight', array(
			'label'   => __( '<h2> font weight', 'stytil' ),
			'section' => 'stytil_three_type',
			'settings'   => 'stytil_options[stytil_st3_h2_font_weight]',
			'priority' => 12
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st3_h2_line_height]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st3_h2_line_height', array(
			'label'   => __( '<h2> line height', 'stytil' ),
			'section' => 'stytil_three_type',
			'settings'   => 'stytil_options[stytil_st3_h2_line_height]',
			'priority' => 13
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st3_h2_letter_spacing]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st3_h2_letter_spacing', array(
			'label'   => __( '<h2> letter spacing', 'stytil' ),
			'section' => 'stytil_three_type',
			'settings'   => 'stytil_options[stytil_st3_h2_letter_spacing]',
			'priority' => 14
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st3_h2_color]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st3_h2_color', array(
			'label'   => __( '<h2> color', 'stytil' ),
			'section' => 'stytil_three_type',
			'settings'   => 'stytil_options[stytil_st3_h2_color]',
			'priority' => 15
		) ) );
		
		$wp_customize->add_setting( 'stytil_options[stytil_st3_p_font]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st3_p_font', array(
			'label'   => __( '<p> font', 'stytil' ),
			'section' => 'stytil_three_type',
			'settings'   => 'stytil_options[stytil_st3_p_font]',
			'priority' => 16
		) );	
		$wp_customize->add_setting( 'stytil_options[stytil_st3_p_google_font]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st3_p_google_font', array(
			'label'   => __( '<p> Google Font', 'stytil' ),
			'section' => 'stytil_three_type',
			'settings'   => 'stytil_options[stytil_st3_p_google_font]',
			'priority' => 17
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st3_p_google_font_styles]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st3_p_google_font_styles', array(
			'label'   => __( '<p> Google Font Styles', 'stytil' ),
			'section' => 'stytil_three_type',
			'settings'   => 'stytil_options[stytil_st3_p_google_font_styles]',
			'priority' => 18
		) );	
		$wp_customize->add_setting( 'stytil_options[stytil_st3_p_font_size]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st3_p_font_size', array(
			'label'   => __( '<p> font size', 'stytil' ),
			'section' => 'stytil_three_type',
			'settings'   => 'stytil_options[stytil_st3_p_font_size]',
			'priority' => 19
		) );
		
		$wp_customize->add_setting( 'stytil_options[stytil_st3_p_font_weight]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st3_p_font_weight', array(
			'label'   => __( '<p> font weight', 'stytil' ),
			'section' => 'stytil_three_type',
			'settings'   => 'stytil_options[stytil_st3_p_font_weight]',
			'priority' => 20
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st3_p_line_height]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st3_p_line_height', array(
			'label'   => __( '<p> line height', 'stytil' ),
			'section' => 'stytil_three_type',
			'settings'   => 'stytil_options[stytil_st3_p_line_height]',
			'priority' => 21
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st3_p_letter_spacing]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st3_p_letter_spacing', array(
			'label'   => __( '<p> letter spacing', 'stytil' ),
			'section' => 'stytil_three_type',
			'settings'   => 'stytil_options[stytil_st3_p_letter_spacing]',
			'priority' => 22
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st3_p_color]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st3_p_color', array(
			'label'   => __( '<p> color', 'stytil' ),
			'section' => 'stytil_three_type',
			'settings'   => 'stytil_options[stytil_st3_p_color]',
			'priority' => 23
		) ) );		
		
		$wp_customize->add_setting( 'stytil_options[stytil_st3_p_a_txt_decor]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st3_p_a_txt_decor', array(
			'label'   => __( '<p> <a> text decoration', 'stytil' ),
			'section' => 'stytil_three_type',
			'settings'   => 'stytil_options[stytil_st3_p_a_txt_decor]',
			'priority' => 24
		) );		
		
		$wp_customize->add_setting( 'stytil_options[stytil_st3_p_a_color]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st3_p_a_color', array(
			'label'   => __( '<p> <a> color', 'stytil' ),
			'section' => 'stytil_three_type',
			'settings'   => 'stytil_options[stytil_st3_p_a_color]',
			'priority' => 25
		) ) );				
		
		$wp_customize->add_setting( 'stytil_options[stytil_st3_p_a_font_weight]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st3_p_a_font_weight', array(
			'label'   => __( '<p> <a> font-weight', 'stytil' ),
			'section' => 'stytil_three_type',
			'settings'   => 'stytil_options[stytil_st3_p_a_font_weight]',
			'priority' => 26
		) );	

		$wp_customize->add_setting( 'stytil_options[stytil_st3_p_ahover_txt_decor]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st3_p_ahover_txt_decor', array(
			'label'   => __( '<p> <a> hover text decoration', 'stytil' ),
			'section' => 'stytil_three_type',
			'settings'   => 'stytil_options[stytil_st3_p_ahover_txt_decor]',
			'priority' => 27
		) );		
		
		$wp_customize->add_setting( 'stytil_options[stytil_st3_p_ahover_color]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st3_p_ahover_color', array(
			'label'   => __( '<p> <a> hover color', 'stytil' ),
			'section' => 'stytil_three_type',
			'settings'   => 'stytil_options[stytil_st3_p_ahover_color]',
			'priority' => 28
		) ) );				
		
		$wp_customize->add_setting( 'stytil_options[stytil_st3_p_ahover_font_weight]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st3_p_ahover_font_weight', array(
			'label'   => __( '<p> <a> hover font-weight', 'stytil' ),
			'section' => 'stytil_three_type',
			'settings'   => 'stytil_options[stytil_st3_p_ahover_font_weight]',
			'priority' => 29
		) );	
		
		
		$wp_customize->add_setting( 'stytil_options[stytil_st3_p_ahover_font_weight]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st3_p_ahover_font_weight', array(
			'label'   => __( '<p> <a> hover font-weight', 'stytil' ),
			'section' => 'stytil_three_type',
			'settings'   => 'stytil_options[stytil_st3_p_ahover_font_weight]',
			'priority' => 30
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st3_blckquote_font]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st3_blckquote_font', array(
			'label'   => __( '<blckquote> font', 'stytil' ),
			'section' => 'stytil_three_type',
			'settings'   => 'stytil_options[stytil_st3_blckquote_font]',
			'priority' => 31
		) );	
		$wp_customize->add_setting( 'stytil_options[stytil_st3_blckquote_google_font]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st3_blckquote_google_font', array(
			'label'   => __( '<blckquote> Google Font', 'stytil' ),
			'section' => 'stytil_three_type',
			'settings'   => 'stytil_options[stytil_st3_blckquote_google_font]',
			'priority' => 32
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st3_blckquote_google_font_styles]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st3_blckquote_google_font_styles', array(
			'label'   => __( '<blckquote> Google Font Styles', 'stytil' ),
			'section' => 'stytil_three_type',
			'settings'   => 'stytil_options[stytil_st3_blckquote_google_font_styles]',
			'priority' => 33
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st3_blckquote_font_size]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st3_blckquote_font_size', array(
			'label'   => __( '<blckquote> font size', 'stytil' ),
			'section' => 'stytil_three_type',
			'settings'   => 'stytil_options[stytil_st3_blckquote_font_size]',
			'priority' => 34
		) );
		
		$wp_customize->add_setting( 'stytil_options[stytil_st3_blckquote_font_weight]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st3_blckquote_font_weight', array(
			'label'   => __( '<blckquote> font weight', 'stytil' ),
			'section' => 'stytil_three_type',
			'settings'   => 'stytil_options[stytil_st3_blckquote_font_weight]',
			'priority' => 35
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st3_blckquote_line_height]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st3_blckquote_line_height', array(
			'label'   => __( '<blckquote> line height', 'stytil' ),
			'section' => 'stytil_three_type',
			'settings'   => 'stytil_options[stytil_st3_blckquote_line_height]',
			'priority' => 36
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st3_blckquote_letter_spacing]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st3_blckquote_letter_spacing', array(
			'label'   => __( '<blckquote> letter spacing', 'stytil' ),
			'section' => 'stytil_three_type',
			'settings'   => 'stytil_options[stytil_st3_blckquote_letter_spacing]',
			'priority' => 37
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st3_blckquote_color]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'st3_blckquote_color', array(
			'label'   => __( '<blckquote> color', 'stytil' ),
			'section' => 'stytil_three_type',
			'settings'   => 'stytil_options[stytil_st3_blckquote_color]',
			'priority' => 38
		) ) );
		
		$wp_customize->add_setting( 'stytil_options[stytil_st3_blckquote_margin]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st3_blckquote_margin', array(
			'label'   => __( '<blckquote> margin', 'stytil' ),
			'section' => 'stytil_three_type',
			'settings'   => 'stytil_options[stytil_st3_blckquote_margin]',
			'priority' => 39
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st3_blckquote_padding]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st3_blckquote_padding', array(
			'label'   => __( '<blckquote> padding', 'stytil' ),
			'section' => 'stytil_three_type',
			'settings'   => 'stytil_options[stytil_st3_blckquote_padding]',
			'priority' => 40
		) );
		
		$wp_customize->add_setting( 'stytil_options[stytil_st3_blckquote_border-left]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( 'stytil_st3_blckquote_border-left', array(
			'label'   => __( '<blckquote> border-left', 'stytil' ),
			'section' => 'stytil_three_type',
			'settings'   => 'stytil_options[stytil_st3_blckquote_border-left]',
			'priority' => 41
		) );		
		
		
		
		//Create Customize Section: 3. Media
		$wp_customize->add_section( 'stytil_three_media', array(
		    'title'          => __( '3. Media', 'styltil' ),
		    'priority'       => 46,
		) );	
		
		$wp_customize->add_setting( 'stytil_options[stytil_st3_media_image_one]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'stytil_st3_media_image_one', array(
			'label'   => __( 'Photo 1', 'stytil' ),
			'section' => 'stytil_three_media',
			'settings'   => 'stytil_options[stytil_st3_media_image_one]',
			'priority' => 0
		) ) );
		
		$wp_customize->add_setting( 'stytil_options[stytil_st3_media_image_two]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'stytil_st3_media_image_two', array(
			'label'   => __( 'Photo 2', 'stytil' ),
			'section' => 'stytil_three_media',
			'settings'   => 'stytil_options[stytil_st3_media_image_two]',
			'priority' => 2
		) ) );
		
		$wp_customize->add_setting( 'stytil_options[stytil_st3_media_image_three]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'stytil_st3_media_image_three', array(
			'label'   => __( 'Photo 3', 'stytil' ),
			'section' => 'stytil_three_media',
			'settings'   => 'stytil_options[stytil_st3_media_image_three]',
			'priority' => 3
		) ) );
		
		$wp_customize->add_setting( 'stytil_options[stytil_st3_media_image_four]', array(
			'type'           => 'option',
			'capability'     => 'edit_theme_options',
		) );
	
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'stytil_st3_media_image_four', array(
			'label'   => __( 'Photo 4', 'stytil' ),
			'section' => 'stytil_three_media',
			'settings'   => 'stytil_options[stytil_st3_media_image_four]',
			'priority' => 4
		) ) );
	}
		
	function stytil_get_options() {
		return get_option( 'stytil_options' );
	}
	
	
	function stytil_textinput( $label, $field_name, $parent_tab = null, $active_tab = null ) {
		$full_field_name = $this->namespace . $field_name;
		$id = esc_attr( $full_field_name );
		$option = $this->namespace . 'options';
		$stytil_options = $this->stytil_get_options();
		$val = empty( $stytil_options[$full_field_name] ) ? '' : esc_attr( $stytil_options[$full_field_name] );
		
		if( $active_tab != $parent_tab )$displayclass='style="display: none;"';
		else $displayclass = '';
		
		return '<tr valign="top" '.$displayclass.'>
					<th scope="row">
						<label class="textinput" for="'.$id.'">'.$label.':</label>
					</th>
					<td>
						<input class="textinput" type="text" id="'.$id.'" name="'.$option.'['.$id.']" value="'.$val.'"/>' . '<br class="clear" />
					</td>
				</tr>';	
	}		
	
	
	function stytil_menu_sub_title( $label, $wrapped, $parent_tab = null, $active_tab = null ) {
		if( $active_tab != $parent_tab ) $output = '';
		else {
			if( $wrapped ) $output = '</table><h3>'.$label.'</h3><table class="form-table">';
			else {
				$output = '<h3>'.$label.'</h3><table class="form-table">';
			}
		}
		return $output;
	}
	
	
	function stytil_sanitize_settings( $input ) {
	
		foreach($input as $key => $value) {
			$new_value = wp_filter_nohtml_kses( $value );
			$input[$key] = stripslashes( $new_value );
		}
		return $input;
	}

	function stytil_sanitize_images($input) { 
		 $newinput = array();
		 if ($_FILES['stytil_image_option']) {
	     	$overrides = array('test_form' => false); 
	     	$file = wp_handle_upload($_FILES['stytil_image_option'], $overrides);
	     	$newinput['file'] = $file;
	     }
	     return $newinput;
    }
		
}
$stytil_settings_setup = new stytil_settings_setup;




/*///////////////////////////
/* Registering of Menu Locations 
/*/////////////////////////*/
register_nav_menus( array(
	'header_menu' => 'Primary Header Menu',
	'footer_menu' => 'Footer Menu'
) );




/*///////////////////////////
/* Registering of Custom Walker
/*/////////////////////////*/
class stytil_Walker_Nav_Menu extends Walker_Nav_Menu {
	
	function start_el(&$output, $item, $depth, $args) {
		global $wp_query;           

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

                // new addition for active class on the a tag
                if(in_array('current-menu-item', $classes)) {
                    $attributes .= ' class="active"';
                }

		$item_output = '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}


/********************************************//**
* Echo Post Custom Field
***********************************************/
function stytil_getOption( $setting ) {
	$stytil_options = get_option( 'stytil_options' ); 
	return $stytil_options[$setting];
}


/********************************************//**
* Enque Scripts
***********************************************/
function my_scripts_method() {
    wp_enqueue_script('jquery');  
    
    //I Have to check the referer to prevent the javascript show hide while in the customize.php section
    $host  = $_SERVER['HTTP_REFERER'];
	$host_pieces = explode('/', $host);
	if ( end($host_pieces) != 'customize.php' ){
	    wp_register_script( 'custom_scripts', get_template_directory_uri().'/js/script.js', jquery, '1.0.0' );
		wp_enqueue_script( 'custom_scripts' );   
	}
}    
 
add_action('wp_enqueue_scripts', 'my_scripts_method'); // For use on the Front end (ie. Theme)


