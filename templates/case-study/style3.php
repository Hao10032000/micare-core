<?php 
global $post;
        $id = $post->ID;
        $termsArray = get_the_terms( $id, 'case_study_category' );
        $termsString = "";

        if ( $termsArray ) {
            foreach ( $termsArray as $term ) {
                $itemname = strtolower( $term->slug ); 
                $itemname = str_replace( ' ', '-', $itemname );
                $termsString .= $itemname.' ';
            }
        }
?>

<div class="item <?php echo esc_attr( $termsString ); ?>" data-item="<?php echo esc_attr($count); ?>">				

    <div class="case-study-post">

        <div class="content"> 

            <h5 class="title border_eff">
                <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
            </h5>
            <div class="category-case-study"><?php echo esc_attr ( the_terms( get_the_ID(), 'case_study_category', '', ', ', '' ) ); ?></div>

        </div>

    </div>

</div>