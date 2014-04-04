<?php get_header(); ?>
<div class="content clearfix">
	<div id='page_holder'>
		<section>
		<?php 
			if( have_posts() ) : while( have_posts() ) : the_post();
					get_template_part( 'content-home' ); 
				endwhile; 
			else : 
          		echo '<article><h2>We couldn\'t find what you\'re looking for.</article></h2>';
          	endif; 
        ?>
		</section>

	</div><!-- / page_content -->
</div><!-- / content -->

<?php get_footer(); ?>
