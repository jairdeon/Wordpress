<?php 
// Exibe todos os itens de uma custom_taxonomy - slug_taxonomia
$terms = get_terms('slug_taxonomia');
echo '<ul>'; foreach ($terms as $term) { $term_link = get_term_link( $term, 'slug_taxonomia' ); if( is_wp_error( $term_link ) ) continue;
echo '<li><a href="' . $term_link . '">' . $term->name . '</a></li>';}
echo '</ul>'; ?>
