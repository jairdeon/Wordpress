<?php 
$args = array('post_type' => 'cardapio','posts_per_page' => -1, // Cria o loop
'tax_query' => array( // Cria o array
array(
    'taxonomy'  => 'categorias', // nome da taxonomy
    'field'     => 'slug', // por slug
    'terms'     => 'bebidas', // categorias que deseja ocultar
    'operator'  => 'NOT IN' // Não indexe os termos acima
    ),
  )
);
$posts_total = new WP_Query( $args ); 
if ( $posts_total->have_posts() ) {
while ( $posts_total->have_posts() ) {
$posts_total->the_post(); ?>
  <?php echo get_the_title();?>
<?php }} wp_reset_postdata(); 
?> 
