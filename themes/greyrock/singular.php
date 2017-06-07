<?php get_header(); ?>

	<div class="content-wrap">
		<div class="container">
			<div class="content">

				<?php 
					if ( have_posts() ) : while ( have_posts() ) : the_post();

						the_title('<h2 class="section-title">', '</h2>');

			    		the_content();
			    		
			    	endwhile; else: endif; 
			    ?>

			</div>
		</div>
	</div>

<?php get_footer(); ?>