<?php
// Este código faz com que, uma página possa ter um template expecífico para ela sendo que a mesma 
// pode estar dentro de uma pasta ou qualquer diretório.
// Inicia a função
function my_account_pages() {
  
  // Se a página atual for "editar-perfil"
	if(is_page('editar-perfil')) {
  
    // Retorne que o layout desta página será o seguinte diretório
		return locate_template(array('minha-conta/editar-profile.php'));
	}
	
  // Adiciona o filtro
} add_filter('page_template', 'my_account_pages', 99);

// Documentação
# https://codex.wordpress.org/Plugin_API/Filter_Reference/page_template
?>
