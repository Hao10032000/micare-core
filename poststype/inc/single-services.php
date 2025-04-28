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

<div class="container">

	<div class="row">

		<?php if ( $services_single_style != 'default' ) :?>	
			<div class="col-md-12">
				<div class="widget-layout-single">

				</div>
			</div>
		<?php endif;?>

		<div class="col-md-12">

			<div class="wrap-content-area <?php echo esc_attr($services_single_style); ?>">

				<div id="primary" class="content-area">	

					<main id="main" class="main-content" role="main">

						<div class="entry-content">	

							<?php while ( have_posts() ) : the_post(); ?>	

								<div class="featured-post"><?php the_post_thumbnail(); ?></div>



								<?php if ( themesflat_get_opt('services_title_single') ) :?>	

								<h4 class="post-title"><?php the_title(); ?></h4>

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