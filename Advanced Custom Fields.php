<?php
// Adiciona Página de opções "Informações"
if( function_exists('acf_add_options_page') ) {
 
    $page = acf_add_options_page(array(
        'page_title'    => 'Informações',
        'menu_title'    => 'Informações',
        'menu_slug'     => 'informacoes',
        'capability'    => 'edit_posts',
        'redirect'  => false
    ));
}
?>
