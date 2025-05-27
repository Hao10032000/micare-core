<?php

class Themesflat_Recent_Services extends WP_Widget {

    /**
     * Holds widget settings defaults, populated in constructor.
     *
     * @var array
     */
    protected $defaults;

    /**
     * Constructor
     */
    function __construct() {
        $this->defaults = array(
            'title'      => 'Popular Services',
            'category'   => '',
            'ids'        => '',
            'count'      => 3,
            'show_date'  => true,
        );

        parent::__construct(
            'widget_recent_services',
            esc_html__( 'Themesflat - Services List', 'themesflat' ),
            array(
                'classname'   => 'widget-recent-services',
                'description' => esc_html__( 'Services List.', 'themesflat' )
            )
        );
    }

    /**
     * Display widget
     */
    function widget( $args, $instance ) {
        $instance = wp_parse_args( $instance, $this->defaults );
        extract( $args );
        extract( $instance );

        // Open widget container
        echo wp_kses_post( $before_widget );

        // Build and display services list
        $query_args = array(
            'post_type'      => 'services',
            'posts_per_page' => intval( $count ),
        );
        if ( ! empty( $category ) ) {
            $query_args['tax_query'] = array(
                array(
                    'taxonomy' => 'category',
                    'terms'    => $category,
                ),
            );
        }
        if ( $ids !== '' ) {
            $query_args['post__in'] = explode( ',', $ids );
            $query_args['orderby']  = 'post__in';
        }
        $flat_post = new WP_Query( $query_args );

        $classes = array( 'recent-services' );

                // Display title after list
                if ( ! empty( $title ) ) {
                    echo wp_kses_post( $before_title . esc_html( $title ) . $after_title );
                }
        ?>

    

        <ul class="<?php echo esc_attr( implode( ' ', $classes ) ); ?> clearfix">
            <?php if ( $flat_post->have_posts() ) : ?>
                <?php while ( $flat_post->have_posts() ) : $flat_post->the_post(); ?>
                    <li class="item">
                        <div class="text">
                            <?php the_title( sprintf( '<h6><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h6>' ); ?>
                        </div>
                    </li>
                <?php endwhile; wp_reset_postdata(); ?>
            <?php else : ?>
                <li><?php esc_html_e( 'Oops, category not found.', 'themesflat' ); ?></li>
            <?php endif; ?>
        </ul>
        <?php

        // Close widget container
        echo wp_kses_post( $after_widget );
    }

    /**
     * Update widget settings
     */
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title']    = sanitize_text_field( $new_instance['title'] );
        $instance['ids']      = $new_instance['ids'];
        $instance['count']    = intval( $new_instance['count'] );
        $instance['category'] = array_filter( (array) $new_instance['category'] );
        return $instance;
    }

    /**
     * Widget settings form
     */
    function form( $instance ) {
        $instance = wp_parse_args( $instance, $this->defaults );
        $title    = esc_attr( $instance['title'] );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'themesflat' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo $title; ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>"><?php esc_html_e( 'Select Category:', 'themesflat' ); ?></label>
            <select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'category' ) ); ?>[]">
                <option value="" <?php selected( empty( $instance['category'] ) ); ?>><?php esc_html_e( 'All', 'themesflat' ); ?></option>
                <?php
                $categories = get_categories();
                foreach ( $categories as $category ) {
                    printf(
                        '<option value="%1$s" %4$s>%2$s (%3$s)</option>',
                        esc_attr( $category->term_id ),
                        esc_html( $category->name ),
                        esc_attr( $category->count ),
                        in_array( $category->term_id, (array) $instance['category'] ) ? 'selected' : ''
                    );
                }
                ?>
            </select>
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'ids' ) ); ?>"><?php esc_html_e( 'Get Post by IDs (e.g. 1,2,3):', 'themesflat' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'ids' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'ids' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['ids'] ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>"><?php esc_html_e( 'Count:', 'themesflat' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'count' ) ); ?>" type="number" value="<?php echo esc_attr( $instance['count'] ); ?>">
        </p>
        <?php
    }
}

add_action( 'widgets_init', 'themesflat_register_recent_services' );

/**
 * Register widget
 */
function themesflat_register_recent_services() {
    register_widget( 'Themesflat_Recent_Services' );
}
