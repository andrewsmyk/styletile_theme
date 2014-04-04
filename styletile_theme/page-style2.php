<?php 
/*
Template Name: Style Tile 2
*/
get_header(); ?>
<div class="content clearfix">
	<div id='page_holder'>
	<?php 
		if( have_posts() ) : while( have_posts() ) : the_post();
				get_template_part( 'content-style' ); 
			endwhile; 
		else : 
      		echo '<article><h2>We couldn\'t find what you\'re looking for.</article></h2>';
      	endif; 
    ?>
	</div><!-- / page_content -->
</div><!-- / content -->

<?php get_footer(); ?>