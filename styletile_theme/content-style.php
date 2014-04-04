<?php

	if( is_page_template( 'page-style1.php' ) ) $stytil_num = 1;
	else if( is_page_template( 'page-style2.php' ) ) $stytil_num = 2;
	else if( is_page_template( 'page-style3.php' ) ) $stytil_num = 3;

?>

<section id="brand" class="toggle">
	<div class="row">
		<h1><?php the_title(); ?></h1>
		<div class="group">
			<img src="<?php echo stytil_getOption( 'stytil_st'.$stytil_num.'_logo' ); ?>" class="logo">
		</div>
		<div class="group">
			<h2>Possible color palette</h2>
			<div class="primary color"></div>
			<div class="secondary color v1"></div>
			<div class="background color"></div>
			<div class="secondary color v2"></div>
			<div class="secondary color v3"></div>
		</div>
		<div class="group">
			<h2 class="second">Accents</h2>
			<img class="texture" src="<?php echo stytil_getOption( 'stytil_st'.$stytil_num.'_accent' ); ?>" alt="plaid" >
		</div>				
		<div class="group">
			<h2>Descriptive adjectives</h2>
			<ul class="adjectives">
				<li><?php echo stytil_getOption( 'stytil_st'.$stytil_num.'_adjective_one' ); ?></li>
				<li><?php echo stytil_getOption( 'stytil_st'.$stytil_num.'_adjective_two' ); ?></li>
				<li><?php echo stytil_getOption( 'stytil_st'.$stytil_num.'_adjective_three' ); ?></li>
				<li><?php echo stytil_getOption( 'stytil_st'.$stytil_num.'_adjective_four' ); ?></li>
				<li><?php echo stytil_getOption( 'stytil_st'.$stytil_num.'_adjective_five' ); ?></li>
			</ul>
		</div>
		<a href="#typography" class="btn forward">Typography</a>
	</div>

</section>
<section id="typography" class="toggle">
	<div class="row">
		<h1>Typography</h1>			
		<h1 class="one">A Page Title Could Look Like This [h1]</h1>
		<h2 class="one">Followed by a sub title [h2]</h2>
		<p class="one">Then there would be body copy. Lucas ipsum dolor sit amet lobot hutt moff dooku c-3p0 jabba antilles skywalker solo jade. Tatooine fett ben leia organa lando. Hutt <a href="http://nooooooooooooooo.com/">darth vader</a> wicket wampa antilles fett amidala. Skywalker yoda maul mara yoda. Jade thrawn calrissian endor jango moff <a href="http://instantchewbacca.com/">chewbacca</a>. Qui-gon jade mara antilles calrissian. Gamorrean obi-wan ahsoka yoda twi'lek moff ponda antilles. Darth dagobah padmé antilles dantooine jinn mace skywalker jade. Mon anakin vader thrawn dantooine skywalker qui-gon. Kenobi ben palpatine organa thrawn jawa skywalker tatooine kamino.</p>
		<blockquote class="one">This is a blockquote! Gamorrean obi-wan ahsoka yoda twi'lek moff ponda&nbsp;antilles.</blockquote>
		<a href="#media" class="btn forward">Media</a>
	</div>
</section>
	  
<section id="media" class="toggle">
	<div class="row">
		<h1>Media</h1>
		<div class="grid full">
			<img class="one" src="<?php echo stytil_getOption( 'stytil_st'.$stytil_num.'_media_image_one' ); ?>" >
		</div>
		<div class="grid third">
			<img class="one" src="<?php echo stytil_getOption( 'stytil_st'.$stytil_num.'_media_image_two' ); ?>" >
		</div>
		<div class="grid third">
			<img class="one" src="<?php echo stytil_getOption( 'stytil_st'.$stytil_num.'_media_image_three' ); ?>">
		</div>
		<div class="grid third">
			<img class="one" src="<?php echo stytil_getOption( 'stytil_st'.$stytil_num.'_media_image_four' ); ?>" >
		</div>
		<div class="grid full clearfix">
			<a href="#brand" class="btn forward">Entire Style Tile</a>
		</div>
	</div>
</section>