<?php
// É necessário ter em sua pasta de plugins o seguinte plugin:
// https://github.com/torounit/custom-post-type-permalinks

$labels = array(
                'name'                => _x( 'Empresas', 'Post Type General Name', 'text_domain' ),
                'singular_name'       => _x( 'Empresas', 'Post Type Singular Name', 'text_domain' ),
                'menu_name'           => __( 'Empresas', 'text_domain' ),
                'parent_item_colon'   => __( 'Empresas Semelhantes', 'text_domain' ),
                'all_items'           => __( 'Exibir Empresas', 'text_domain' ),
                'view_item'           => __( 'Ver Empresas', 'text_domain' ),
                'add_new_item'        => __( 'Criar Cadastro', 'text_domain' ),
                'add_new'             => __( 'Novo Cadastro', 'text_domain' ),
                'edit_item'           => __( 'Editar Cadastro', 'text_domain' ),
                'update_item'         => __( 'Atualizar Cadastro', 'text_domain' ),
                'search_items'        => __( 'Procurar Empresas', 'text_domain' ),
                'not_found'           => __( 'Nenhuma postagem existente', 'text_domain' ),
                'not_found_in_trash'  => __( 'Nenhum registro de postagem encontrado na lixeira', 'text_domain' ));

$args = array('labels' => $labels, 
    'public' => true,
    'has_archive' => true, 
    'rewrite' => [ 'with_front' => true ], 
    'cptp_permalink_structure' => '/%cidades%/%postname%',);
    register_post_type( 'empresas', $args);


add_action( 'init', 'thenule_categorias', 0 );
function thenule_cidades()  {
$labels = array(
                'name'                       => _x( 'Cidades', 'Taxonomy General Name', 'text_domain' ),
                'singular_name'              => _x( 'Cidades', 'Taxonomy Singular Name', 'text_domain' ),
                'menu_name'                  => __( 'Gerenciar Cidades', 'text_domain' ),
                'all_items'                  => __( 'Cidades', 'text_domain' ),
                'parent_item'                => __( 'Cidades Semelhantes', 'text_domain' ),
                'parent_item_colon'          => __( 'Cidades Semelhantes', 'text_domain' ),
                'new_item_name'              => __( 'Adicionar Cidades', 'text_domain' ),
                'add_new_item'               => __( 'Adicionar Cidades', 'text_domain' ),
                'edit_item'                  => __( 'Editar Cidades', 'text_domain' ),
                'update_item'                => __( 'Atualizar Cidades', 'text_domain' ),
                'separate_items_with_commas' => __( 'Cidades separadas em virgula', 'text_domain' ),
                'search_items'               => __( 'Procurar Cidades', 'text_domain' ),
                'add_or_remove_items'        => __( 'Adicionar ou remover ítens da Taxonomy', 'text_domain' ),
                'choose_from_most_used'      => __( 'Veja as Cidades mais usadas', 'text_domain' ),);
$args = array(
                'labels'                     => $labels,
                'hierarchical' 				       => true,
                'public'                     => true,
                'show_ui'                    => true,
                'show_admin_column'          => true,
                'show_in_nav_menus'          => true,
                'show_tagcloud'              => true,);

register_taxonomy( 'cidades', 'empresas',  $args);}
add_action( 'init', 'thenule_cidades', 0 );
