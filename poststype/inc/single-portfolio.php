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

							<?php while ( have_posts() ) : the_post(); 
								global $post;
								// information
								$desc = get_post_meta($post->ID, 'desc_case_value', true);
								$client = get_post_meta($post->ID, 'client_case_value', true);
								$date = get_post_meta($post->ID, 'date_case_value', true);
							?>	

								<div class="content-top-infor">
									<div class="featured-post"><?php the_post_thumbnail(); ?></div>
								</div>

								<div class="group-infor-portfolio">

									<div class="content-left">
										<h2 class="post-title"><?php the_title(); ?></h2>
										<p><?php echo $desc; ?></p>
									</div>
									<div class="content-right">
										<div class="project-infor">
											  <?php
											    $tags      = get_the_terms( get_the_ID(), 'portfolio_tags' );
											    $categories= get_the_terms( get_the_ID(), 'portfolio_category' );
											  ?>

											  <h3><?php esc_html_e( 'Project Info', 'themesflat-core' ); ?></h3>

											  <ul>
											    <?php if ( ! empty( $client ) ) : ?>
											      <li>
											        <span class="label"><?php esc_html_e( 'Clients', 'themesflat-core' ); ?></span>
											        <span class="dot">:</span>
											        <span class="value"><?php echo esc_html( $client ); ?></span>
											      </li>
											    <?php endif; ?>
												
											    <?php if ( $tags && ! is_wp_error( $tags ) ) : ?>
											      <li>
											        <span class="label"><?php esc_html_e( 'Tags', 'themesflat-core' ); ?></span>
											        <span class="dot">:</span>
											        <span class="value">
											          <?php
											            $out = array();
											            foreach ( $tags as $t ) {
											              $out[] = sprintf(
											                '<a href="%s">%s</a>',
											                esc_url( get_term_link( $t ) ),
											                esc_html( $t->name )
											              );
											            }
											            echo implode( ', ', $out );
											          ?>
											        </span>
											      </li>
											    <?php endif; ?>
													
											    <?php if ( $categories && ! is_wp_error( $categories ) ) : ?>
											      <li>
											        <span class="label"><?php esc_html_e( 'Category', 'themesflat-core' ); ?></span>
											        <span class="dot">:</span>
											        <span class="value">
											          <?php
											            $out = array();
											            foreach ( $categories as $c ) {
											              $out[] = sprintf(
											                '<a href="%s">%s</a>',
											                esc_url( get_term_link( $c ) ),
											                esc_html( $c->name )
											              );
											            }
											            echo implode( ', ', $out );
											          ?>
											        </span>
											      </li>
											    <?php endif; ?>
													
											    <?php if ( ! empty( $date ) ) : ?>
											      <li>
											        <span class="label"><?php esc_html_e( 'Date', 'themesflat-core' ); ?></span>
											        <span class="dot">:</span>
											        <span class="value"><?php echo esc_html( $date ); ?></span>
											      </li>
											    <?php endif; ?>
											  </ul>
											</div>

									</div>

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