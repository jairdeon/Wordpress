<?php
function thenule_telefones()  {
$labels = array(
                'name'                       => _x( 'Telefones', 'Taxonomy General Name', 'text_domain' ),
                'singular_name'              => _x( 'Telefones', 'Taxonomy Singular Name', 'text_domain' ),
                'menu_name'                  => __( 'Gerenciar Telefones', 'text_domain' ),
                'all_items'                  => __( 'Telefones', 'text_domain' ),
                'parent_item'                => __( 'Telefones Semelhantes', 'text_domain' ),
                'parent_item_colon'          => __( 'Telefones Semelhantes', 'text_domain' ),
                'new_item_name'              => __( 'Adicionar Telefone', 'text_domain' ),
                'add_new_item'               => __( 'Adicionar Telefone', 'text_domain' ),
                'edit_item'                  => __( 'Editar Telefones', 'text_domain' ),
                'update_item'                => __( 'Atualizar Telefones', 'text_domain' ),
                'separate_items_with_commas' => __( 'Telefones separados em virgula', 'text_domain' ),
                'search_items'               => __( 'Procurar Telefones', 'text_domain' ),
                'add_or_remove_items'        => __( 'Adicionar ou remover ítens das Taxonomy', 'text_domain' ),
                'choose_from_most_used'      => __( 'Veja os Telefones mais usadas', 'text_domain' ),);
$args = array(
                'labels'                     => $labels,
                'hierarchical'               => true,
                'public'                     => true,
                'show_ui'                    => true,
                'show_admin_column'          => true,
                'show_in_nav_menus'          => true,
                'show_tagcloud'              => true,);
        
register_taxonomy( 'telefones', 'post',  $args);}
add_action( 'init', 'thenule_telefone', 0 );
?>

<!-- Snippet para Sublime -->
<snippet>
	<content><![CDATA[
function thenule_${1:taxonomy_slug}()  {
\$labels = array(
                'name'                       => _x( '${2:nome_da_taxonomy}', 'Taxonomy General Name', 'text_domain' ),
                'singular_name'              => _x( '${2:nome_da_taxonomy}', 'Taxonomy Singular Name', 'text_domain' ),
                'menu_name'                  => __( 'Gerenciar ${2:nome_da_taxonomy}', 'text_domain' ),
                'all_items'                  => __( '${2:nome_da_taxonomy}', 'text_domain' ),
                'parent_item'                => __( '${2:nome_da_taxonomy} Semelhantes', 'text_domain' ),
                'parent_item_colon'          => __( '${2:nome_da_taxonomy} Semelhantes', 'text_domain' ),
                'new_item_name'              => __( 'Adicionar ${2:nome_da_taxonomy}', 'text_domain' ),
                'add_new_item'               => __( 'Adicionar ${2:nome_da_taxonomy}', 'text_domain' ),
                'edit_item'                  => __( 'Editar ${2:nome_da_taxonomy}', 'text_domain' ),
                'update_item'                => __( 'Atualizar ${2:nome_da_taxonomy}', 'text_domain' ),
                'separate_items_with_commas' => __( '${2:nome_da_taxonomy} separados em virgula', 'text_domain' ),
                'search_items'               => __( 'Procurar ${2:nome_da_taxonomy}', 'text_domain' ),
                'add_or_remove_items'        => __( 'Adicionar ou remover ítens das Taxonomy', 'text_domain' ),
                'choose_from_most_used'      => __( 'Veja as ${2:nome_da_taxonomy} mais usadas', 'text_domain' ),);
\$args = array(
                'labels'                     => \$labels,
                'hierarchical'               => true,
                'public'                     => true,
                'show_ui'                    => true,
                'show_admin_column'          => true,
                'show_in_nav_menus'          => true,
                'show_tagcloud'              => true,);
        
register_taxonomy( '${1:taxonomy_slug}', '${3:nome_da_cpt}', \$args );}
add_action( 'init', 'thenule_${1:taxonomy_slug}', 0 );
?>
]]></content>
	<tabTrigger>create_taxonomy</tabTrigger>
	<scope>source.php</scope>
</snippet>
