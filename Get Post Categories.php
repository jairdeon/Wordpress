<?php

// Adiciona o nome da função, caso não tenha parametros, ele considera ser o id da publicação atual.
function get_post_categories_name($param = null){
  
    // Cria um array para hospedarmos dados na $categories
    $categories = [];
    
    // Se parametro for null, ele atribui ao id da publicação atual
    $param = ($param == null) ? get_the_id() : $param;
    
    // Faz um loop no post, detectando suas categorias
    foreach(wp_get_post_categories(get_the_id()) as $data){
        
        // Hospeda dados na variavel $categories (nome e link)
        array_push($categories, ['name' => get_cat_name($data), 'link' => get_category_link($data)]);
       
       // Retorna as categorias
    } return $categories;
}

# Para usar no tema, use foreach(wp_get_post_categories() as $category)
# Para obter o nome, $category['name'] e link $category['link']
