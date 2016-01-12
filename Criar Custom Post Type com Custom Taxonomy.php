<?php
// Altere CPT para o nome de sua Custom Post Type
// Altere cpt para o nome de sua Custom Post Type (será a slug)
// Altere Taxonomy_Name para o nome de sua Custom Taxonomy
// Altere taxonomy_slug para o nome de sua Custom Taxonomy (será a slug)

function thenule_cpt() {
$labels = array(
                'name'                => _x( 'CPT', 'Post Type General Name', 'text_domain' ),
                'singular_name'       => _x( 'CPT', 'Post Type Singular Name', 'text_domain' ),
                'menu_name'           => __( 'CPT', 'text_domain' ),
                'parent_item_colon'   => __( 'CPT Semelhantes', 'text_domain' ),
                'all_items'           => __( 'Exibir CPT', 'text_domain' ),
                'view_item'           => __( 'Ver CPT', 'text_domain' ),
                'add_new_item'        => __( 'Criar Cadastro', 'text_domain' ),
                'add_new'             => __( 'Novo Cadastro', 'text_domain' ),
                'edit_item'           => __( 'Editar Cadastro', 'text_domain' ),
                'update_item'         => __( 'Atualizar Cadastro', 'text_domain' ),
                'search_items'        => __( 'Procurar CPT', 'text_domain' ),
                'not_found'           => __( 'Nenhuma postagem existente', 'text_domain' ),
                'not_found_in_trash'  => __( 'Nenhum registro de postagem encontrado na lixeira', 'text_domain' ),);

$args = array(
                'label'               => __( 'CPT', 'text_domain' ),
                'description'         => __( 'Conteúdo dos CPT', 'text_domain' ),
                'labels'              => $labels,
                'supports'            => array( 'title'),
                'hierarchical'        => true,
                'public'              => true,
                'show_ui'             => true,
                'show_in_menu'        => true,
                'show_in_nav_menus'   => true,
                'show_in_admin_bar'   => true,
                'menu_position'       => 5,
                'menu_icon'           => '',
                'can_export'          => true,
                'has_archive'         => true,
                'exclude_from_search' => false,
                'publicly_queryable'  => true,
                'capability_type'     => 'post',);
        
register_post_type( 'cpt', $args );}
add_action( 'init', 'thenule_cpt', 0 );

add_filter( 'enter_title_here', 'thenule_cpt_titulo' );
function thenule_cpt_titulo( $input ) {global $post_type;
if ( is_admin() && 'cpt' == $post_type )
return __( 'Digite o titulo', 'your_textdomain' );
return $input;}

add_action( 'admin_head', 'thenule_cpt_icone' ); function thenule_cpt_icone() {?>
<style type="text/css" media="screen">
#adminmenu #menu-posts-cpt div.wp-menu-image:before { content: "\f233"; }
</style><?php }
// - Finaliza as configurações da adição do CPT - //


function thenule_taxonomy_slug()  {
$labels = array(
                'name'                       => _x( 'Taxonomy_Name', 'Taxonomy General Name', 'text_domain' ),
                'singular_name'              => _x( 'Taxonomy_Name', 'Taxonomy Singular Name', 'text_domain' ),
                'menu_name'                  => __( 'Gerenciar Taxonomy_Name', 'text_domain' ),
                'all_items'                  => __( 'Taxonomy_Name', 'text_domain' ),
                'parent_item'                => __( 'Taxonomy_Name Semelhantes', 'text_domain' ),
                'parent_item_colon'          => __( 'Taxonomy_Name Semelhantes', 'text_domain' ),
                'new_item_name'              => __( 'Adicionar Taxonomy_Name', 'text_domain' ),
                'add_new_item'               => __( 'Adicionar Taxonomy_Name', 'text_domain' ),
                'edit_item'                  => __( 'Editar Taxonomy_Name', 'text_domain' ),
                'update_item'                => __( 'Atualizar Taxonomy_Name', 'text_domain' ),
                'separate_items_with_commas' => __( 'Taxonomy_Name separados em virgula', 'text_domain' ),
                'search_items'               => __( 'Procurar Taxonomy_Name', 'text_domain' ),
                'add_or_remove_items'        => __( 'Adicionar ou remover ítens das Taxonomy', 'text_domain' ),
                'choose_from_most_used'      => __( 'Veja as Taxonomy_Name mais usadas', 'text_domain' ),);

$args = array(
                'labels'                     => $labels,
                'hierarchical'               => true,
                'public'                     => true,
                'show_ui'                    => true,
                'show_admin_column'          => true,
                'show_in_nav_menus'          => true,
                'show_tagcloud'              => true,);
        
register_taxonomy( 'taxonomy_slug', 'cpt', $args );}
add_action( 'init', 'thenule_taxonomy_slug', 0 );
?>


<!-- Snippet para sublime -->
<snippet>
	<content><![CDATA[
function thenule_${1:nome_da_cpt}() {
\$labels = array(
                'name'                => _x( '${2:nome_da_cpt}', 'Post Type General Name', 'text_domain' ),
                'singular_name'       => _x( '${2:nome_da_cpt}', 'Post Type Singular Name', 'text_domain' ),
                'menu_name'           => __( '${2:nome_da_cpt}', 'text_domain' ),
                'parent_item_colon'   => __( '${2:nome_da_cpt} Semelhantes', 'text_domain' ),
                'all_items'           => __( 'Exibir ${2:nome_da_cpt}', 'text_domain' ),
                'view_item'           => __( 'Ver ${2:nome_da_cpt}', 'text_domain' ),
                'add_new_item'        => __( 'Criar Cadastro', 'text_domain' ),
                'add_new'             => __( 'Novo Cadastro', 'text_domain' ),
                'edit_item'           => __( 'Editar Cadastro', 'text_domain' ),
                'update_item'         => __( 'Atualizar Cadastro', 'text_domain' ),
                'search_items'        => __( 'Procurar ${2:nome_da_cpt}', 'text_domain' ),
                'not_found'           => __( 'Nenhuma postagem existente', 'text_domain' ),
                'not_found_in_trash'  => __( 'Nenhum registro de postagem encontrado na lixeira', 'text_domain' ),);
\$args = array(
                'label'               => __( '${2:nome_da_cpt}', 'text_domain' ),
                'description'         => __( 'Conteúdo dos ${2:nome_da_cpt}', 'text_domain' ),
                'labels'              => $labels,
                'supports'            => array( 'title'),
                'hierarchical'        => true,
                'public'              => true,
                'show_ui'             => true,
                'show_in_menu'        => true,
                'show_in_nav_menus'   => true,
                'show_in_admin_bar'   => true,
                'menu_position'       => 5,
                'menu_icon'           => '',
                'can_export'          => true,
                'has_archive'         => true,
                'exclude_from_search' => false,
                'publicly_queryable'  => true,
                'capability_type'     => 'post',);
        
register_post_type( '${1:nome_da_cpt}', $args );}
add_action( 'init', 'thenule_${1:nome_da_cpt}', 0 );
add_filter( 'enter_title_here', 'thenule_${1:nome_da_cpt}_titulo' );
function thenule_${1:nome_da_cpt}_titulo( $input ) {global $post_type;
if ( is_admin() && '${1:nome_da_cpt}' == $post_type )
return __( 'Digite o titulo', 'your_textdomain' );
return $input;}
add_action( 'admin_head', 'thenule_${1:nome_da_cpt}_icone' ); function thenule_${1:nome_da_cpt}_icone() {?>
<style type="text/css" media="screen">
#adminmenu #menu-posts-${1:nome_da_cpt} div.wp-menu-image:before { content: "\f233"; }
</style><?php }
// - Finaliza as configurações da adição do ${2:nome_da_cpt} - //

function thenule_${3:slug_da_taxonomy}()  {
\$labels = array(
                'name'                       => _x( '${4:nome_da_taxonomy}', 'Taxonomy General Name', 'text_domain' ),
                'singular_name'              => _x( '${4:nome_da_taxonomy}', 'Taxonomy Singular Name', 'text_domain' ),
                'menu_name'                  => __( 'Gerenciar ${4:nome_da_taxonomy}', 'text_domain' ),
                'all_items'                  => __( '${4:nome_da_taxonomy}', 'text_domain' ),
                'parent_item'                => __( '${4:nome_da_taxonomy} Semelhantes', 'text_domain' ),
                'parent_item_colon'          => __( '${4:nome_da_taxonomy} Semelhantes', 'text_domain' ),
                'new_item_name'              => __( 'Adicionar ${4:nome_da_taxonomy}', 'text_domain' ),
                'add_new_item'               => __( 'Adicionar ${4:nome_da_taxonomy}', 'text_domain' ),
                'edit_item'                  => __( 'Editar ${4:nome_da_taxonomy}', 'text_domain' ),
                'update_item'                => __( 'Atualizar ${4:nome_da_taxonomy}', 'text_domain' ),
                'separate_items_with_commas' => __( '${4:nome_da_taxonomy} separados em virgula', 'text_domain' ),
                'search_items'               => __( 'Procurar ${4:nome_da_taxonomy}', 'text_domain' ),
                'add_or_remove_items'        => __( 'Adicionar ou remover ítens das Taxonomy', 'text_domain' ),
                'choose_from_most_used'      => __( 'Veja as ${4:nome_da_taxonomy} mais usadas', 'text_domain' ),);
\$args = array(
                'labels'                     => $labels,
                'hierarchical'               => true,
                'public'                     => true,
                'show_ui'                    => true,
                'show_admin_column'          => true,
                'show_in_nav_menus'          => true,
                'show_tagcloud'              => true,);
        
register_taxonomy( '{3:slug_da_taxonomy}', '${1:nome_da_cpt}', $args );}
add_action( 'init', 'thenule_${3:slug_da_taxonomy}', 0 );
?>
]]></content>
	<tabTrigger>create_nome_da_cpt</tabTrigger>
	<scope>source.php</scope>
</snippet>
