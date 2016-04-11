<?php 
// Exibe todos os itens de uma custom_taxonomy - slug_taxonomia
// Altere abaixo para sua custom taxonomy.
$categoria = 'sua_custom_taxonomy';
$terms = get_terms($categoria);
echo '<ul>'; foreach ($terms as $term) { $term_link = get_term_link( $term, $categoria); if( is_wp_error( $term_link ) ) continue;
echo '<li><a href="' . $term_link . '">' . $term->name . '</a></li>';}
echo '</ul>'; ?>
