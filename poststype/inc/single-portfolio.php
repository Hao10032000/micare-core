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
								$duration = get_post_meta($post->ID, 'duration_case_value', true);
								$location = get_post_meta($post->ID, 'location_case_value', true);
							?>	

								<div class="content-top-infor">
										<div class="featured-post"><?php the_post_thumbnail(); ?></div>
										<?php if ( themesflat_get_opt('case_study_title_single') ) :?>	
											<h4 class="post-title"><?php the_title(); ?></h4>
										<?php endif;?>
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

<!-- Related -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
			<?php		
		$grid_columns = themesflat_get_opt( 'case_study_related_grid_columns' );
		$layout =  'case-study-grid';

		if ( get_query_var('paged') ) {
		    $paged = get_query_var('paged');
		} elseif ( get_query_var('page') ) {
		    $paged = get_query_var('page');
		} else {
		    $paged = 1;
		}

		$terms = get_the_terms( $post->ID, 'case_study_category' );
		if ( $terms != '' ){
			$term_ids = wp_list_pluck( $terms, 'term_id' );
			$args = array(
				'post_type' => 'case-study',
				'posts_per_page'      => -1,
				'tax_query' => array(
					array(
					'taxonomy' => 'case_study_category',
					'field' => 'term_id',
					'terms' => $term_ids,
					'operator'=> 'IN'
					)),
				'posts_per_page'      => themesflat_get_opt( 'number_related_post_case_study' ),
				'ignore_sticky_posts' => 1,
				'post__not_in'=> array( $post->ID )
			);

			if ( $layout != '' ) {
			    $class[] = $layout;
			}
			if ( $grid_columns != '' ) {
			    $class[] = 'column-' . $grid_columns ;
			}
			
			?>
			<div class="related-post related-posts-box">
			    <div class="box-wrapper">
					<div class="box-title">
			        <h3><?php esc_html_e( 'Related Projects
', 'themesflat' ) ?></h3>
					<p><?php esc_html_e( 'Discover how weve helped clients achieve remarkable results.
', 'themesflat' ) ?></p>
					</div>
			        <div class="themesflat-case-study-taxonomy">			            
		            	<div class="<?php echo esc_attr( implode( ' ', $class ) ) ?> wrap-case-study-post style6 row">
				            <?php 
				            $query = new WP_Query($args);
				            if( $query->have_posts() ) {
				                while ( $query->have_posts() ) : $query->the_post(); ?>           
				                    <div class="item">
				                        <div class="case-post style6 scale-hover case-post-<?php the_ID(); ?>">
				                            <div class="featured-post">
				                            	<a href="<?php echo get_the_permalink(); ?>">
				                                <?php 
				                                    if ( has_post_thumbnail() ) { 
				                                        $themesflat_thumbnail = "themesflat-project-grid";                              
				                                        the_post_thumbnail( $themesflat_thumbnail );
				                                    }                                           
				                                ?>
				                                </a>
				                            </div>
				                            <div class="content">
				                                    <div class="post-meta">
			                                            <?php echo the_terms( get_the_ID(), 'case_study_category', '', ' , ', '' ); ?>
				                                    </div>
				                                    <h5 class="title border_eff">
				                                         <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
				                                    </h5>				                                
            										<p class="description"><?php echo wp_trim_words( get_the_content(),13, '' ); ?></p>
				                            </div>
				                        </div>
				                    </div>                    
				                    <?php 
				                endwhile; 
				            }
				            wp_reset_postdata();
				            ?>            
				        </div>			            
			        </div>
			    </div>
			</div>
		<?php } ?>
	</div>	
			</div>
		</div>
	



<?php get_footer(); ?>