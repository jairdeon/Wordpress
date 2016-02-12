<?php 
global $post; 
$terms = get_the_terms($post->id, 'categorias'); 
echo $terms[0]->name;

// O echo pode obter os seguintes dados:
// $terms[0]->term_id;
// $terms[0]->name;
// $terms[0]->slug;
// $terms[0]->term_group;
// $terms[0]->term_taxonomy_id;
// $terms[0]->taxonomy;
// $terms[0]->description;
// $terms[0]->parent;
// $terms[0]->count;
?>
