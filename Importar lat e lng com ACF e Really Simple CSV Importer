// https://wordpress.org/support/topic/import-acf-google-map-field
// Código Original - https://gist.github.com/hissy/ebb1d317f9abc190b901
// Use o really-simple-csv-importer para importar suas postagens.
// Use este código (adaptado para sua necessidade) para importar os dados com latitude e longitude.

"post_title","post_type","lat","lng"
"Map","post",35.710115,139.810203

-------------------------------------------
Crie uma pasta em seu diretorio "plugins" e dentro, crie um index.php com este código:
<?php
/*
Plugin Name: Really Simple CSV Importer add-on: ACF Google Map
Version: 0.1
*/
 
class rscsvimporter_acf_gmap {
    // singleton instance
    private static $instance;
    
    public static function instance() {
        if ( isset( self::$instance ) )
            return self::$instance;
        
        self::$instance = new rscsvimporter_acf_gmap;
        self::$instance->run_init();
        return self::$instance;
    }
    
    private function __construct() {
        /** Do nothing **/
    }
    
    protected function run_init() {
        add_action( 'init', array( $this, 'add_filter' ) );
    }
    
    public function add_filter() {
        add_filter( 'really_simple_csv_importer_save_meta', array( $this, 'convert_gmap'), 50, 3 );
    }
    
    public function convert_gmap($meta, $post, $is_update) {
        
        // serialize metadata
        $gmap_field = array();
        if (isset($meta['lat']) && isset($meta['lng'])){
            $gmap_field['lat'] = $meta['lat'];
            $gmap_field['lng'] = $meta['lng'];
            $gmap_field['address'] = $meta['address'];
            unset($meta['lat']);
            unset($meta['lng']);
            unset($meta['address']);
        }
        $meta['field_54899effa7dbe'] = $gmap_field; // please change the field key to yours
        
        return $meta;
    }
    
}
 
$rscsvimporter_acf_gmap = rscsvimporter_acf_gmap::instance();
