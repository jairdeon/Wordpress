<?php
// No lugar de "sua_custom_taxonomy", coloque sua custom taxonomy.
$terms = get_terms('sua_custom_taxonomy'); 
foreach ( $terms as $term ):
// Abre o código
$codigo .= '<li><a class="filters-a" data-filter=".';
$codigo .= $term->name;
$codigo .= '" href="#">';
$codigo .= $term->name;
// Fecha o código
$codigo .= '</a></li>';
endforeach;

// Imprime o código
echo $codigo;
?>

<!-- Versão para Sublime -->
<snippet>
	<content><![CDATA[
\$terms = get_terms('${1: Sua custom Taxonomy}'); 
foreach ( \$terms as \$term ):
// Abre o código
\$codigo .= '${2:Seu código HTMl}';
\$codigo .= \$term->name;
// Fecha o código
\$codigo .= '${3: Fecha seu código HTML}';
endforeach;

// Imprime o código
echo \$codigo;
?>
]]></content>
	<tabTrigger>custom-taxonomy-foreach</tabTrigger>
	<scope>source.php</scope>
</snippet>
