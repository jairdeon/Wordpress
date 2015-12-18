<?php $args = array('post_type' => 'produtos','posts_per_page' => 4);
$posts_total = new WP_Query( $args ); 
if ( $posts_total->have_posts() ) {
while ( $posts_total->have_posts() ) {
$posts_total->the_post(); ?>

<!--Conteúdo HTML -->
<!--Fecha HTML -->

<?php }} wp_reset_postdata(); ?> 
