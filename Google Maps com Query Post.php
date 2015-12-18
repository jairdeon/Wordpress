<?php 
// Global
// Utilize o Advanced Custom Fields e leia sua documentação para que o código funcione corretamente.
// Aqui eu conto quantos posts existem na minha CPT "area-de-atuacao"
$count_posts = wp_count_posts('area-de-atuacao');
// $total conta quantos posts publicados existem.
$total = $count_posts->publish;
?>

<!-- onload inicia a função "initialize" do Google Maps -->
<body onload="initialize()">
<style type="text/css">
/* Regras para dispositivos menores que 300px de largura */
@media (min-width:300px) {#map {height: 350px;}}
/* Regras para dispositivos menores que 300px de largura */
@media (min-width:1000px) {#map {height: 750px;}}
/* Regras para dispositivos menores que 1500px de largura */
@media (min-width:1500px) {#map {height: 750px;}}
hr {border-color: #d9d9d9 -moz-use-text-color -moz-use-text-color; margin-bottom: 5px; margin-top: 5px;}

#map_canvas {width:100%; height: 100%;}
</style>

<!-- Inicia o script -->
<script type="text/javascript">
jQuery(function($) {
    // Asynchronously Load the map API 
    var script = document.createElement('script');
    script.src = "http://maps.googleapis.com/maps/api/js?sensor=false&callback=initialize";
    document.body.appendChild(script);
});

// Inicia a função "initialize"
function initialize() {
    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap'
    };
                    
// Exibe o mapa na div id #map (no fim do código)
map = new google.maps.Map(document.getElementById("map"), mapOptions);
map.setTilt(45);


// Cria um estilo personalizado
// Veja mais em  https://snazzymaps.com/
var styles = [
{
        "featureType": "administrative",
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "color": "#444444"
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "all",
        "stylers": [
            {
                "color": "#f2f2f2"
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "road",
        "elementType": "all",
        "stylers": [
            {
                "saturation": -100
            },
            {
                "lightness": 45
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "simplified"
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "all",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "water",
        "elementType": "all",
        "stylers": [
            {
                "color": "#46bcec"
            },
            {
                "visibility": "on"
            }
        ]
    }
];

map.setOptions({styles: styles});
//
        
// Multiple Markers
var markers = [
<?php
// Aqui eu utilizo o query_post para poder obter as publicações.
$args = array('post_type' => 'area-de-atuacao','posts_per_page' => $total, 'order' => 'DESC');
$posts_total = new WP_Query( $args ); 
if ( $posts_total->have_posts() ) {
while ( $posts_total->have_posts() ) {
$posts_total->the_post(); 
$location = get_field('cidade'); $cidade = explode(",", $location['address']);$endereco = $location['address']; $latitude = $location['lat']; $longitude = $location['lng']; ?>
['<?php echo $endereco; ?>', '<?php echo $latitude; ?>', '<?php echo $longitude; ?>'],
<?php }} wp_reset_postdata(); ?>
];
                        
// Janela das informações quando clicado em cima do marcador.
var infoWindowContent = [
<?php
$args = array('post_type' => 'area-de-atuacao','posts_per_page' => $total, 'order'   => 'DESC');
$posts_total = new WP_Query( $args ); 
if ( $posts_total->have_posts() ) {
while ( $posts_total->have_posts() ) {
$posts_total->the_post(); 
$location = get_field('cidade'); $cidade = explode(",", $location['address']);$endereco = $location['address']; $latitude = $location['lat']; $longitude = $location['lng']; ?>
['<b>Supervisor:</b> Th3nule<br>' +
'<b>Telefone:</b> <?php echo get_field('telefone_1'); ?><br>' +
'<b>Email:</b> contato@email.com.br<hr>' +
'<b>Nome:</b> <?php echo get_the_title(); ?><br>' +
'<b>Cidade:</b> <?php echo $cidade[0]; ?><br>' +
'<b>Telefone:</b> <?php echo get_field('telefone_1'); ?><br>' +
'<b>Cidades atendidas:</b><?php $terms = get_field("cidades_de_atuacao"); foreach( $terms as $term ): ?> <a href="<?php the_permalink(); ?>"><?php echo $term->name; ?>, </a><?php endforeach; ?><br>' + 
'</div>'],
<?php }} wp_reset_postdata(); ?>
];
        
    // Display multiple markers on a map
    var infoWindow = new google.maps.InfoWindow(), marker, i;
    
    // Executa um FOR listando todas os marcadores encontrados pela busca e define as propriedades de cada parte. 
    for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            title: markers[i][0]
        });
        
        // Allow each marker to have an info window    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        // Automatically center the map fitting all markers on the screen
        map.fitBounds(bounds);
    }

    // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
    this.setZoom(7);
    google.maps.event.removeListener(boundsListener);
    });
    
}
</script>

<!-- Esta div imprime exibe o mapa -->
<div id="map"><div id="map_canvas" class="mapping"></div></div>
