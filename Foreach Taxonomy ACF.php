
<?php $taxonomy_slug = get_field('slug'); foreach( $taxonomy_slug as $result_slug ): ?>
<a href="<?php echo get_term_link( $result_slug ); ?>"><?php echo $result_slug->name; ?></a>
<?php endforeach; ?>

Para Sublime:
<snippet>
	<content><![CDATA[ 
\$taxonomy_${1:slug} = get_field('${1:slug}'); foreach( \$taxonomy_${1:slug} as \$result_${1:slug} ): ?>
<a href="<?php echo get_term_link( \$result_${1:slug} ); ?>"><?php echo \$result_${1:slug}->name; ?></a>
<?php endforeach; ?>
]]></content>
	<tabTrigger>foreach_taxonomy_acf</tabTrigger>
	<scope>source.php</scope>
</snippet>
