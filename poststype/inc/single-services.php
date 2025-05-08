<?php

get_header(); 
$services_single_style = themesflat_get_opt('services_single_style');
if (themesflat_get_opt_elementor('services_single_style') != '') {
    $services_single_style = themesflat_get_opt_elementor('services_single_style');
}
$services_layout = themesflat_get_opt('services_layout');
if (themesflat_get_opt_elementor('services_layout') != '') {
    $services_layout = themesflat_get_opt_elementor('services_layout');
}
?>

<div class="container services-posttype">

	<div class="row">

		<div class="col-md-12">

			<div class="wrap-content-area">

				<div id="primary" class="content-area">	

					<main id="main" class="main-content" role="main">

						<div class="entry-content">	

							<?php while ( have_posts() ) : the_post(); ?>	


								<?php if ( themesflat_get_opt('services_title_single') ) :?>	

								<h2 class="post-title"><?php the_title(); ?></h2>

								<?php endif;?>

								

								<?php the_content(); ?>

						

							<?php endwhile; // end of the loop. ?>

						</div><!-- ./entry-content -->

					</main><!-- #main -->

				</div><!-- #primary -->

				<?php 
					get_sidebar();
				?>

			</div>

		</div>

	</div>

</div>



<?php get_footer(); ?>