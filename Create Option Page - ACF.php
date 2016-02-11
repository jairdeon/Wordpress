<?php
// Cria a aba - Configurações
acf_add_options_page(array(
		'page_title' 	=> 'Configurações',
		'menu_title'	=> 'Configurações',
		'menu_slug' 	=> 'configuracoes',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

// Para Sublime
<snippet>
	<content><![CDATA[
// Cria a aba - ${1:Nome da Aba}
acf_add_options_page(array(
		'page_title' 	=> '${1:Nome da Aba}',
		'menu_title'	=> '${1:Nome da Aba}',
		'menu_slug' 	=> '${2:slug}',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

]]></content>
	<tabTrigger>create_option_page</tabTrigger>
	<scope>source.php</scope>
</snippet>
?>
