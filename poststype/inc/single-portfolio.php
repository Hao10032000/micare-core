<?php

get_header(); 

?>

<div class="container">

	<div class="row">

		<div class="col-md-12">

			<div class="wrap-content-area">

				<div id="primary" class="content-area">	

					<main id="main" class="main-content" role="main">

						<div class="entry-content">	

							<?php while ( have_posts() ) : the_post(); ?>	

								<div class="content-top-infor">
									<div class="featured-post"><?php the_post_thumbnail(); ?></div>
									<h4 class="post-title"><?php the_title(); ?></h4>
								</div>

								<?php the_content(); ?>


								<?php themesflat_post_navigation_postype(); ?>

						

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