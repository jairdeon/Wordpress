// Função
function remove_menus_current_user_can() {

    // Se o usuário online tiver o ROLE == a cliente, execute o código
    if(current_user_can( 'cliente' ) ):
        // Remove post_type "clientes"
        remove_menu_page( 'edit.php?post_type=clientes' );
        // Remove post_type "jobs"
        remove_menu_page( 'edit.php?post_type=jobs' );
    endif;
}

add_action( 'admin_menu', 'remove_menus_current_user_can' );
