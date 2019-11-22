<?php

/**
 * @package LMS
 * @copyright Copyright (c) 2014, Chimp Studio 
 */
/**
 * @get google font list
 */
/* * ** google font from Api *** */
/* get google font list */
global $fonts;

function cs_googlefont_list() {
    global $fonts,$cs_theme_options;
    if (!($cs_theme_options)) {
        $font_array = get_option('cs_font_list');
    } else {
        $google_apikey = 'AIzaSyDXgT0NYjLhDmUzdcxC5RITeEDimRmpq3s';
        $google_api_url = 'https://www.googleapis.com/webfonts/v1/webfonts?key=' . $google_apikey;
// 	$google_apikey = '';
        //$google_api_url = '';

        $cachetime = 86400 * 7;
        $transient = 'google_font_list';
        $value = 'true';
        $check_transient = get_transient($transient);
        if ($check_transient === false) {
            $get_response = wp_remote_get($google_api_url, array('sslverify' => false));
            $response = wp_remote_retrieve_body($get_response);
            if (isset($response) and $response <> '' and ! is_wp_error($response)) {
                $font_array = cs_get_google_fontlist($response);
            } else {
                if (get_option('cs_font_list') <> '' and get_option('cs_font_attribute') <> '') {
                    $font_array = get_option('cs_font_list');
                    $font_attribute = get_option('cs_font_attribute');
                } else {
                    if (isset($fonts) and $fonts <> '') {
                        $font_array = cs_get_google_fontlist($fonts);
                        $font_attribute = cs_font_attribute($fonts);
                    }
                }
            }
            if (is_array($font_array) and count($font_array) > 0 and is_array($font_attribute) and count($font_attribute) > 0) {
                update_option('cs_font_list', $font_array);
                update_option('cs_font_attribute', $font_attribute);
                set_transient($transient, $value, $cachetime);
            }
        } else {
            if (get_option('cs_font_list') <> '' and get_option('cs_font_attribute') <> '') {
                $font_array = get_option('cs_font_list');
            } else {
                $font_array = cs_get_google_fontlist($fonts);
                $font_attribute = cs_font_attribute($fonts);
                if (is_array($font_array) and count($font_array) > 0 and is_array($font_attribute) and count($font_attribute) > 0) {
                    update_option('cs_font_list', $font_array);
                    update_option('cs_font_attribute', $font_attribute);
                }
            }
        }
    }
    return $font_array;
}

function cs_get_google_init_arrays() {
    $font_list_init = array
        (
        'ABeeZee' => 'ABeeZee',
        'Abel' => 'Abel',
        'Abril Fatface' => 'Abril Fatface',
        'Aclonica' => 'Aclonica',
        'Acme' => 'Acme',
        'Actor' => 'Actor',
        'Adamina' => 'Adamina',
        'Advent Pro' => 'Advent Pro',
        'Aguafina Script' => 'Aguafina Script',
        'Akronim' => 'Akronim',
        'Aladin' => 'Aladin',
        'Aldrich' => 'Aldrich',
        'Alegreya' => 'Alegreya',
        'Alegreya SC' => 'Alegreya SC',
        'Alex Brush' => 'Alex Brush',
        'Alfa Slab One' => 'Alfa Slab One',
        'Alice' => 'Alice',
        'Alike' => 'Alike',
        'Alike Angular' => 'Alike Angular',
        'Allan' => 'Allan',
        'Allerta' => 'Allerta',
        'Allerta Stencil' => 'Allerta Stencil',
        'Allura' => 'Allura',
        'Almendra' => 'Almendra',
        'Almendra Display' => 'Almendra Display',
        'Almendra SC' => 'Almendra SC',
        'Amarante' => 'Amarante',
        'Amaranth' => 'Amaranth',
        'Amatic SC' => 'Amatic SC',
        'Amethysta' => 'Amethysta',
        'Anaheim' => 'Anaheim',
        'Andada' => 'Andada',
        'Andika' => 'Andika',
        'Angkor' => 'Angkor',
        'Annie Use Your Telescope' => 'Annie Use Your Telescope',
        'Anonymous Pro' => 'Anonymous Pro',
        'Antic' => 'Antic',
        'Antic Didone' => 'Antic Didone',
        'Antic Slab' => 'Antic Slab',
        'Anton' => 'Anton',
        'Arapey' => 'Arapey',
        'Arbutus' => 'Arbutus',
        'Arbutus Slab' => 'Arbutus Slab',
        'Architects Daughter' => 'Architects Daughter',
        'Archivo Black' => 'Archivo Black',
        'Archivo Narrow' => 'Archivo Narrow',
        'Arimo' => 'Arimo',
        'Arizonia' => 'Arizonia',
        'Armata' => 'Armata',
        'Artifika' => 'Artifika',
        'Arvo' => 'Arvo',
        'Asap' => 'Asap',
        'Asset' => 'Asset',
        'Astloch' => 'Astloch',
        'Asul' => 'Asul',
        'Atomic Age' => 'Atomic Age',
        'Aubrey' => 'Aubrey',
        'Audiowide' => 'Audiowide',
        'Autour One' => 'Autour One',
        'Average' => 'Average',
        'Average Sans' => 'Average Sans',
        'Averia Gruesa Libre' => 'Averia Gruesa Libre',
        'Averia Libre' => 'Averia Libre',
        'Averia Sans Libre' => 'Averia Sans Libre',
        'Averia Serif Libre' => 'Averia Serif Libre',
        'Bad Script' => 'Bad Script',
        'Balthazar' => 'Balthazar',
        'Bangers' => 'Bangers',
        'Basic' => 'Basic',
        'Battambang' => 'Battambang',
        'Baumans' => 'Baumans',
        'Bayon' => 'Bayon',
        'Belgrano' => 'Belgrano',
        'Belleza' => 'Belleza',
        'BenchNine' => 'BenchNine',
        'Bentham' => 'Bentham',
        'Berkshire Swash' => 'Berkshire Swash',
        'Bevan' => 'Bevan',
        'Bigelow Rules' => 'Bigelow Rules',
        'Bigshot One' => 'Bigshot One',
        'Bilbo' => 'Bilbo',
        'Bilbo Swash Caps' => 'Bilbo Swash Caps',
        'Bitter' => 'Bitter',
        'Black Ops One' => 'Black Ops One',
        'Bokor' => 'Bokor',
        'Bonbon' => 'Bonbon',
        'Boogaloo' => 'Boogaloo',
        'Bowlby One' => 'Bowlby One',
        'Bowlby One SC' => 'Bowlby One SC',
        'Brawler' => 'Brawler',
        'Bree Serif' => 'Bree Serif',
        'Bubblegum Sans' => 'Bubblegum Sans',
        'Bubbler One' => 'Bubbler One',
        'Buda' => 'Buda',
        'Buenard' => 'Buenard',
        'Butcherman' => 'Butcherman',
        'Butterfly Kids' => 'Butterfly Kids',
        'Cabin' => 'Cabin',
        'Cabin Condensed' => 'Cabin Condensed',
        'Cabin Sketch' => 'Cabin Sketch',
        'Caesar Dressing' => 'Caesar Dressing',
        'Cagliostro' => 'Cagliostro',
        'Calligraffitti' => 'Calligraffitti',
        'Cambo' => 'Cambo',
        'Candal' => 'Candal',
        'Cantarell' => 'Cantarell',
        'Cantata One' => 'Cantata One',
        'Cantora One' => 'Cantora One',
        'Capriola' => 'Capriola',
        'Cardo' => 'Cardo',
        'Carme' => 'Carme',
        'Carrois Gothic' => 'Carrois Gothic',
        'Carrois Gothic SC' => 'Carrois Gothic SC',
        'Carter One' => 'Carter One',
        'Caudex' => 'Caudex',
        'Cedarville Cursive' => 'Cedarville Cursive',
        'Ceviche One' => 'Ceviche One',
        'Changa One' => 'Changa One',
        'Chango' => 'Chango',
        'Chau Philomene One' => 'Chau Philomene One',
        'Chela One' => 'Chela One',
        'Chelsea Market' => 'Chelsea Market',
        'Chenla' => 'Chenla',
        'Cherry Cream Soda' => 'Cherry Cream Soda',
        'Cherry Swash' => 'Cherry Swash',
        'Chewy' => 'Chewy',
        'Chicle' => 'Chicle',
        'Chivo' => 'Chivo',
        'Cinzel' => 'Cinzel',
        'Cinzel Decorative' => 'Cinzel Decorative',
        'Clicker Script' => 'Clicker Script',
        'Coda' => 'Coda',
        'Coda Caption' => 'Coda Caption',
        'Codystar' => 'Codystar',
        'Combo' => 'Combo',
        'Comfortaa' => 'Comfortaa',
        'Coming Soon' => 'Coming Soon',
        'Concert One' => 'Concert One',
        'Condiment' => 'Condiment',
        'Content' => 'Content',
        'Contrail One' => 'Contrail One',
        'Convergence' => 'Convergence',
        'Cookie' => 'Cookie',
        'Copse' => 'Copse',
        'Corben' => 'Corben',
        'Courgette' => 'Courgette',
        'Cousine' => 'Cousine',
        'Coustard' => 'Coustard',
        'Covered By Your Grace' => 'Covered By Your Grace',
        'Crafty Girls' => 'Crafty Girls',
        'Creepster' => 'Creepster',
        'Crete Round' => 'Crete Round',
        'Crimson Text' => 'Crimson Text',
        'Croissant One' => 'Croissant One',
        'Crushed' => 'Crushed',
        'Cuprum' => 'Cuprum',
        'Cutive' => 'Cutive',
        'Cutive Mono' => 'Cutive Mono',
        'Damion' => 'Damion',
        'Dancing Script' => 'Dancing Script',
        'Dangrek' => 'Dangrek',
        'Dawning of a New Day' => 'Dawning of a New Day',
        'Days One' => 'Days One',
        'Delius' => 'Delius',
        'Delius Swash Caps' => 'Delius Swash Caps',
        'Delius Unicase' => 'Delius Unicase',
        'Della Respira' => 'Della Respira',
        'Denk One' => 'Denk One',
        'Devonshire' => 'Devonshire',
        'Didact Gothic' => 'Didact Gothic',
        'Diplomata' => 'Diplomata',
        'Diplomata SC' => 'Diplomata SC',
        'Domine' => 'Domine',
        'Donegal One' => 'Donegal One',
        'Doppio One' => 'Doppio One',
        'Dorsa' => 'Dorsa',
        'Dosis' => 'Dosis',
        'Dr Sugiyama' => 'Dr Sugiyama',
        'Droid Sans' => 'Droid Sans',
        'Droid Sans Mono' => 'Droid Sans Mono',
        'Droid Serif' => 'Droid Serif',
        'Duru Sans' => 'Duru Sans',
        'Dynalight' => 'Dynalight',
        'EB Garamond' => 'EB Garamond',
        'Eagle Lake' => 'Eagle Lake',
        'Eater' => 'Eater',
        'Economica' => 'Economica',
        'Electrolize' => 'Electrolize',
        'Elsie' => 'Elsie',
        'Elsie Swash Caps' => 'Elsie Swash Caps',
        'Emblema One' => 'Emblema One',
        'Emilys Candy' => 'Emilys Candy',
        'Engagement' => 'Engagement',
        'Englebert' => 'Englebert',
        'Enriqueta' => 'Enriqueta',
        'Erica One' => 'Erica One',
        'Esteban' => 'Esteban',
        'Euphoria Script' => 'Euphoria Script',
        'Ewert' => 'Ewert',
        'Exo' => 'Exo',
        'Expletus Sans' => 'Expletus Sans',
        'Fanwood Text' => 'Fanwood Text',
        'Fascinate' => 'Fascinate',
        'Fascinate Inline' => 'Fascinate Inline',
        'Faster One' => 'Faster One',
        'Fasthand' => 'Fasthand',
        'Federant' => 'Federant',
        'Federo' => 'Federo',
        'Felipa' => 'Felipa',
        'Fenix' => 'Fenix',
        'Finger Paint' => 'Finger Paint',
        'Fjalla One' => 'Fjalla One',
        'Fjord One' => 'Fjord One',
        'Flamenco' => 'Flamenco',
        'Flavors' => 'Flavors',
        'Fondamento' => 'Fondamento',
        'Fontdiner Swanky' => 'Fontdiner Swanky',
        'Forum' => 'Forum',
        'Francois One' => 'Francois One',
        'Freckle Face' => 'Freckle Face',
        'Fredericka the Great' => 'Fredericka the Great',
        'Fredoka One' => 'Fredoka One',
        'Freehand' => 'Freehand',
        'Fresca' => 'Fresca',
        'Frijole' => 'Frijole',
        'Fruktur' => 'Fruktur',
        'Fugaz One' => 'Fugaz One',
        'GFS Didot' => 'GFS Didot',
        'GFS Neohellenic' => 'GFS Neohellenic',
        'Gabriela' => 'Gabriela',
        'Gafata' => 'Gafata',
        'Galdeano' => 'Galdeano',
        'Galindo' => 'Galindo',
        'Gentium Basic' => 'Gentium Basic',
        'Gentium Book Basic' => 'Gentium Book Basic',
        'Geo' => 'Geo',
        'Geostar' => 'Geostar',
        'Geostar Fill' => 'Geostar Fill',
        'Germania One' => 'Germania One',
        'Gilda Display' => 'Gilda Display',
        'Give You Glory' => 'Give You Glory',
        'Glass Antiqua' => 'Glass Antiqua',
        'Glegoo' => 'Glegoo',
        'Gloria Hallelujah' => 'Gloria Hallelujah',
        'Goblin One' => 'Goblin One',
        'Gochi Hand' => 'Gochi Hand',
        'Gorditas' => 'Gorditas',
        'Goudy Bookletter 1911' => 'Goudy Bookletter 1911',
        'Graduate' => 'Graduate',
        'Grand Hotel' => 'Grand Hotel',
        'Gravitas One' => 'Gravitas One',
        'Great Vibes' => 'Great Vibes',
        'Griffy' => 'Griffy',
        'Gruppo' => 'Gruppo',
        'Gudea' => 'Gudea',
        'Habibi' => 'Habibi',
        'Hammersmith One' => 'Hammersmith One',
        'Hanalei' => 'Hanalei',
        'Hanalei Fill' => 'Hanalei Fill',
        'Handlee' => 'Handlee',
        'Hanuman' => 'Hanuman',
        'Happy Monkey' => 'Happy Monkey',
        'Headland One' => 'Headland One',
        'Henny Penny' => 'Henny Penny',
        'Herr Von Muellerhoff' => 'Herr Von Muellerhoff',
        'Holtwood One SC' => 'Holtwood One SC',
        'Homemade Apple' => 'Homemade Apple',
        'Homenaje' => 'Homenaje',
        'IM Fell DW Pica' => 'IM Fell DW Pica',
        'IM Fell DW Pica SC' => 'IM Fell DW Pica SC',
        'IM Fell Double Pica' => 'IM Fell Double Pica',
        'IM Fell Double Pica SC' => 'IM Fell Double Pica SC',
        'IM Fell English' => 'IM Fell English',
        'IM Fell English SC' => 'IM Fell English SC',
        'IM Fell French Canon' => 'IM Fell French Canon',
        'IM Fell French Canon SC' => 'IM Fell French Canon SC',
        'IM Fell Great Primer' => 'IM Fell Great Primer',
        'IM Fell Great Primer SC' => 'IM Fell Great Primer SC',
        'Iceberg' => 'Iceberg',
        'Iceland' => 'Iceland',
        'Imprima' => 'Imprima',
        'Inconsolata' => 'Inconsolata',
        'Inder' => 'Inder',
        'Indie Flower' => 'Indie Flower',
        'Inika' => 'Inika',
        'Irish Grover' => 'Irish Grover',
        'Istok Web' => 'Istok Web',
        'Italiana' => 'Italiana',
        'Italianno' => 'Italianno',
        'Jacques Francois' => 'Jacques Francois',
        'Jacques Francois Shadow' => 'Jacques Francois Shadow',
        'Jim Nightshade' => 'Jim Nightshade',
        'Jockey One' => 'Jockey One',
        'Jolly Lodger' => 'Jolly Lodger',
        'Josefin Sans' => 'Josefin Sans',
        'Josefin Slab' => 'Josefin Slab',
        'Joti One' => 'Joti One',
        'Judson' => 'Judson',
        'Julee' => 'Julee',
        'Julius Sans One' => 'Julius Sans One',
        'Junge' => 'Junge',
        'Jura' => 'Jura',
        'Just Another Hand' => 'Just Another Hand',
        'Just Me Again Down Here' => 'Just Me Again Down Here',
        'Kameron' => 'Kameron',
        'Karla' => 'Karla',
        'Kaushan Script' => 'Kaushan Script',
        'Kavoon' => 'Kavoon',
        'Keania One' => 'Keania One',
        'Kelly Slab' => 'Kelly Slab',
        'Kenia' => 'Kenia',
        'Khmer' => 'Khmer',
        'Kite One' => 'Kite One',
        'Knewave' => 'Knewave',
        'Kotta One' => 'Kotta One',
        'Koulen' => 'Koulen',
        'Kranky' => 'Kranky',
        'Kreon' => 'Kreon',
        'Kristi' => 'Kristi',
        'Krona One' => 'Krona One',
        'La Belle Aurore' => 'La Belle Aurore',
        'Lancelot' => 'Lancelot',
        'Lato' => 'Lato',
        'League Script' => 'League Script',
        'Leckerli One' => 'Leckerli One',
        'Ledger' => 'Ledger',
        'Lekton' => 'Lekton',
        'Lemon' => 'Lemon',
        'Libre Baskerville' => 'Libre Baskerville',
        'Life Savers' => 'Life Savers',
        'Lilita One' => 'Lilita One',
        'Limelight' => 'Limelight',
        'Linden Hill' => 'Linden Hill',
        'Lobster' => 'Lobster',
        'Lobster Two' => 'Lobster Two',
        'Londrina Outline' => 'Londrina Outline',
        'Londrina Shadow' => 'Londrina Shadow',
        'Londrina Sketch' => 'Londrina Sketch',
        'Londrina Solid' => 'Londrina Solid',
        'Lora' => 'Lora',
        'Love Ya Like A Sister' => 'Love Ya Like A Sister',
        'Loved by the King' => 'Loved by the King',
        'Lovers Quarrel' => 'Lovers Quarrel',
        'Luckiest Guy' => 'Luckiest Guy',
        'Lusitana' => 'Lusitana',
        'Lustria' => 'Lustria',
        'Macondo' => 'Macondo',
        'Macondo Swash Caps' => 'Macondo Swash Caps',
        'Magra' => 'Magra',
        'Maiden Orange' => 'Maiden Orange',
        'Mako' => 'Mako',
        'Marcellus' => 'Marcellus',
        'Marcellus SC' => 'Marcellus SC',
        'Marck Script' => 'Marck Script',
        'Margarine' => 'Margarine',
        'Marko One' => 'Marko One',
        'Marmelad' => 'Marmelad',
        'Marvel' => 'Marvel',
        'Mate' => 'Mate',
        'Mate SC' => 'Mate SC',
        'Maven Pro' => 'Maven Pro',
        'McLaren' => 'McLaren',
        'Meddon' => 'Meddon',
        'MedievalSharp' => 'MedievalSharp',
        'Medula One' => 'Medula One',
        'Megrim' => 'Megrim',
        'Meie Script' => 'Meie Script',
        'Merienda' => 'Merienda',
        'Merienda One' => 'Merienda One',
        'Merriweather' => 'Merriweather',
        'Merriweather Sans' => 'Merriweather Sans',
        'Metal' => 'Metal',
        'Metal Mania' => 'Metal Mania',
        'Metamorphous' => 'Metamorphous',
        'Metrophobic' => 'Metrophobic',
        'Michroma' => 'Michroma',
        'Milonga' => 'Milonga',
        'Miltonian' => 'Miltonian',
        'Miltonian Tattoo' => 'Miltonian Tattoo',
        'Miniver' => 'Miniver',
        'Miss Fajardose' => 'Miss Fajardose',
        'Modern Antiqua' => 'Modern Antiqua',
        'Molengo' => 'Molengo',
        'Molle' => 'Molle',
        'Monda' => 'Monda',
        'Monofett' => 'Monofett',
        'Monoton' => 'Monoton',
        'Monsieur La Doulaise' => 'Monsieur La Doulaise',
        'Montaga' => 'Montaga',
        'Montez' => 'Montez',
        'Montserrat' => 'Montserrat',
        'Montserrat Alternates' => 'Montserrat Alternates',
        'Montserrat Subrayada' => 'Montserrat Subrayada',
        'Moul' => 'Moul',
        'Moulpali' => 'Moulpali',
        'Mountains of Christmas' => 'Mountains of Christmas',
        'Mouse Memoirs' => 'Mouse Memoirs',
        'Mr Bedfort' => 'Mr Bedfort',
        'Mr Dafoe' => 'Mr Dafoe',
        'Mr De Haviland' => 'Mr De Haviland',
        'Mrs Saint Delafield' => 'Mrs Saint Delafield',
        'Mrs Sheppards' => 'Mrs Sheppards',
        'Muli' => 'Muli',
        'Mystery Quest' => 'Mystery Quest',
        'Neucha' => 'Neucha',
        'Neuton' => 'Neuton',
        'New Rocker' => 'New Rocker',
        'News Cycle' => 'News Cycle',
        'Niconne' => 'Niconne',
        'Nixie One' => 'Nixie One',
        'Nobile' => 'Nobile',
        'Nokora' => 'Nokora',
        'Norican' => 'Norican',
        'Nosifer' => 'Nosifer',
        'Nothing You Could Do' => 'Nothing You Could Do',
        'Noticia Text' => 'Noticia Text',
        'Nova Cut' => 'Nova Cut',
        'Nova Flat' => 'Nova Flat',
        'Nova Mono' => 'Nova Mono',
        'Nova Oval' => 'Nova Oval',
        'Nova Round' => 'Nova Round',
        'Nova Script' => 'Nova Script',
        'Nova Slim' => 'Nova Slim',
        'Nova Square' => 'Nova Square',
        'Numans' => 'Numans',
        'Nunito' => 'Nunito',
        'Odor Mean Chey' => 'Odor Mean Chey',
        'Offside' => 'Offside',
        'Old Standard TT' => 'Old Standard TT',
        'Oldenburg' => 'Oldenburg',
        'Oleo Script' => 'Oleo Script',
        'Oleo Script Swash Caps' => 'Oleo Script Swash Caps',
        'Open Sans' => 'Open Sans',
        'Open Sans Condensed' => 'Open Sans Condensed',
        'Oranienbaum' => 'Oranienbaum',
        'Orbitron' => 'Orbitron',
        'Oregano' => 'Oregano',
        'Orienta' => 'Orienta',
        'Original Surfer' => 'Original Surfer',
        'Oswald' => 'Oswald',
        'Over the Rainbow' => 'Over the Rainbow',
        'Overlock' => 'Overlock',
        'Overlock SC' => 'Overlock SC',
        'Ovo' => 'Ovo',
        'Oxygen' => 'Oxygen',
        'Oxygen Mono' => 'Oxygen Mono',
        'PT Mono' => 'PT Mono',
        'PT Sans' => 'PT Sans',
        'PT Sans Caption' => 'PT Sans Caption',
        'PT Sans Narrow' => 'PT Sans Narrow',
        'PT Serif' => 'PT Serif',
        'PT Serif Caption' => 'PT Serif Caption',
        'Pacifico' => 'Pacifico',
        'Paprika' => 'Paprika',
        'Parisienne' => 'Parisienne',
        'Passero One' => 'Passero One',
        'Passion One' => 'Passion One',
        'Patrick Hand' => 'Patrick Hand',
        'Patrick Hand SC' => 'Patrick Hand SC',
        'Patua One' => 'Patua One',
        'Paytone One' => 'Paytone One',
        'Peralta' => 'Peralta',
        'Permanent Marker' => 'Permanent Marker',
        'Petit Formal Script' => 'Petit Formal Script',
        'Petrona' => 'Petrona',
        'Philosopher' => 'Philosopher',
        'Piedra' => 'Piedra',
        'Pinyon Script' => 'Pinyon Script',
        'Pirata One' => 'Pirata One',
        'Plaster' => 'Plaster',
        'Play' => 'Play',
        'Playball' => 'Playball',
        'Playfair Display' => 'Playfair Display',
        'Playfair Display SC' => 'Playfair Display SC',
        'Podkova' => 'Podkova',
        'Poiret One' => 'Poiret One',
        'Poller One' => 'Poller One',
        'Poly' => 'Poly',
        'Pompiere' => 'Pompiere',
        'Pontano Sans' => 'Pontano Sans',
        'Port Lligat Sans' => 'Port Lligat Sans',
        'Port Lligat Slab' => 'Port Lligat Slab',
        'Prata' => 'Prata',
        'Preahvihear' => 'Preahvihear',
        'Press Start 2P' => 'Press Start 2P',
        'Princess Sofia' => 'Princess Sofia',
        'Prociono' => 'Prociono',
        'Prosto One' => 'Prosto One',
        'Puritan' => 'Puritan',
        'Purple Purse' => 'Purple Purse',
        'Quando' => 'Quando',
        'Quantico' => 'Quantico',
        'Quattrocento' => 'Quattrocento',
        'Quattrocento Sans' => 'Quattrocento Sans',
        'Questrial' => 'Questrial',
        'Quicksand' => 'Quicksand',
        'Quintessential' => 'Quintessential',
        'Qwigley' => 'Qwigley',
        'Racing Sans One' => 'Racing Sans One',
        'Radley' => 'Radley',
        'Raleway' => 'Raleway',
        'Raleway Dots' => 'Raleway Dots',
        'Rambla' => 'Rambla',
        'Rammetto One' => 'Rammetto One',
        'Ranchers' => 'Ranchers',
        'Rancho' => 'Rancho',
        'Rationale' => 'Rationale',
        'Redressed' => 'Redressed',
        'Reenie Beanie' => 'Reenie Beanie',
        'Revalia' => 'Revalia',
        'Ribeye' => 'Ribeye',
        'Ribeye Marrow' => 'Ribeye Marrow',
        'Righteous' => 'Righteous',
        'Risque' => 'Risque',
        'Roboto' => 'Roboto',
        'Roboto Condensed' => 'Roboto Condensed',
        'Rochester' => 'Rochester',
        'Rock Salt' => 'Rock Salt',
        'Rokkitt' => 'Rokkitt',
        'Romanesco' => 'Romanesco',
        'Ropa Sans' => 'Ropa Sans',
        'Rosario' => 'Rosario',
        'Rosarivo' => 'Rosarivo',
        'Rouge Script' => 'Rouge Script',
        'Ruda' => 'Ruda',
        'Rufina' => 'Rufina',
        'Ruge Boogie' => 'Ruge Boogie',
        'Ruluko' => 'Ruluko',
        'Rum Raisin' => 'Rum Raisin',
        'Ruslan Display' => 'Ruslan Display',
        'Russo One' => 'Russo One',
        'Ruthie' => 'Ruthie',
        'Rye' => 'Rye',
        'Sacramento' => 'Sacramento',
        'Sail' => 'Sail',
        'Salsa' => 'Salsa',
        'Sanchez' => 'Sanchez',
        'Sancreek' => 'Sancreek',
        'Sansita One' => 'Sansita One',
        'Sarina' => 'Sarina',
        'Satisfy' => 'Satisfy',
        'Scada' => 'Scada',
        'Schoolbell' => 'Schoolbell',
        'Seaweed Script' => 'Seaweed Script',
        'Sevillana' => 'Sevillana',
        'Seymour One' => 'Seymour One',
        'Shadows Into Light' => 'Shadows Into Light',
        'Shadows Into Light Two' => 'Shadows Into Light Two',
        'Shanti' => 'Shanti',
        'Share' => 'Share',
        'Share Tech' => 'Share Tech',
        'Share Tech Mono' => 'Share Tech Mono',
        'Shojumaru' => 'Shojumaru',
        'Short Stack' => 'Short Stack',
        'Siemreap' => 'Siemreap',
        'Sigmar One' => 'Sigmar One',
        'Signika' => 'Signika',
        'Signika Negative' => 'Signika Negative',
        'Simonetta' => 'Simonetta',
        'Sintony' => 'Sintony',
        'Sirin Stencil' => 'Sirin Stencil',
        'Six Caps' => 'Six Caps',
        'Skranji' => 'Skranji',
        'Slackey' => 'Slackey',
        'Smokum' => 'Smokum',
        'Smythe' => 'Smythe',
        'Sniglet' => 'Sniglet',
        'Snippet' => 'Snippet',
        'Snowburst One' => 'Snowburst One',
        'Sofadi One' => 'Sofadi One',
        'Sofia' => 'Sofia',
        'Sonsie One' => 'Sonsie One',
        'Sorts Mill Goudy' => 'Sorts Mill Goudy',
        'Source Code Pro' => 'Source Code Pro',
        'Source Sans Pro' => 'Source Sans Pro',
        'Special Elite' => 'Special Elite',
        'Spicy Rice' => 'Spicy Rice',
        'Spinnaker' => 'Spinnaker',
        'Spirax' => 'Spirax',
        'Squada One' => 'Squada One',
        'Stalemate' => 'Stalemate',
        'Stalinist One' => 'Stalinist One',
        'Stardos Stencil' => 'Stardos Stencil',
        'Stint Ultra Condensed' => 'Stint Ultra Condensed',
        'Stint Ultra Expanded' => 'Stint Ultra Expanded',
        'Stoke' => 'Stoke',
        'Strait' => 'Strait',
        'Sue Ellen Francisco' => 'Sue Ellen Francisco',
        'Sunshiney' => 'Sunshiney',
        'Supermercado One' => 'Supermercado One',
        'Suwannaphum' => 'Suwannaphum',
        'Swanky and Moo Moo' => 'Swanky and Moo Moo',
        'Syncopate' => 'Syncopate',
        'Tangerine' => 'Tangerine',
        'Taprom' => 'Taprom',
        'Tauri' => 'Tauri',
        'Telex' => 'Telex',
        'Tenor Sans' => 'Tenor Sans',
        'Text Me One' => 'Text Me One',
        'The Girl Next Door' => 'The Girl Next Door',
        'Tienne' => 'Tienne',
        'Tinos' => 'Tinos',
        'Titan One' => 'Titan One',
        'Titillium Web' => 'Titillium Web',
        'Trade Winds' => 'Trade Winds',
        'Trocchi' => 'Trocchi',
        'Trochut' => 'Trochut',
        'Trykker' => 'Trykker',
        'Tulpen One' => 'Tulpen One',
        'Ubuntu' => 'Ubuntu',
        'Ubuntu Condensed' => 'Ubuntu Condensed',
        'Ubuntu Mono' => 'Ubuntu Mono',
        'Ultra' => 'Ultra',
        'Uncial Antiqua' => 'Uncial Antiqua',
        'Underdog' => 'Underdog',
        'Unica One' => 'Unica One',
        'UnifrakturCook' => 'UnifrakturCook',
        'UnifrakturMaguntia' => 'UnifrakturMaguntia',
        'Unkempt' => 'Unkempt',
        'Unlock' => 'Unlock',
        'Unna' => 'Unna',
        'VT323' => 'VT323',
        'Vampiro One' => 'Vampiro One',
        'Varela' => 'Varela',
        'Varela Round' => 'Varela Round',
        'Vast Shadow' => 'Vast Shadow',
        'Vibur' => 'Vibur',
        'Vidaloka' => 'Vidaloka',
        'Viga' => 'Viga',
        'Voces' => 'Voces',
        'Volkhov' => 'Volkhov',
        'Vollkorn' => 'Vollkorn',
        'Voltaire' => 'Voltaire',
        'Waiting for the Sunrise' => 'Waiting for the Sunrise',
        'Wallpoet' => 'Wallpoet',
        'Walter Turncoat' => 'Walter Turncoat',
        'Warnes' => 'Warnes',
        'Wellfleet' => 'Wellfleet',
        'Wendy One' => 'Wendy One',
        'Wire One' => 'Wire One',
        'Yanone Kaffeesatz' => 'Yanone Kaffeesatz',
        'Yellowtail' => 'Yellowtail',
        'Yeseva One' => 'Yeseva One',
        'Yesteryear' => 'Yesteryear',
        'Zeyada' => 'Zeyada'
    );

    $font_atts_int = array
        (
        'ABeeZee' => array
            ('0' => 'regular', '1' => 'italic'),
        'Abel' => array
            ('0' => 'regular'),
        'Abril Fatface' => array
            ('0' => 'regular'),
        'Aclonica' => array
            ('0' => 'regular'),
        'Acme' => array
            ('0' => 'regular'),
        'Actor' => array
            ('0' => 'regular'),
        'Adamina' => array
            ('0' => 'regular'),
        'Advent Pro' => array
            ('0' => '100', '1' => '200', '2' => '300', '3' => 'regular', '4' => '500', '5' => '600', '6' => '700'),
        'Aguafina Script' => array
            ('0' => 'regular'),
        'Akronim' => array
            ('0' => 'regular'),
        'Aladin' => array
            ('0' => 'regular'),
        'Aldrich' => array
            ('0' => 'regular'),
        'Alegreya' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700', '3' => '700italic', '4' => '900', '5' => '900italic'),
        'Alegreya SC' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700', '3' => '700italic', '4' => '900', '5' => '900italic'),
        'Alex Brush' => array
            ('0' => 'regular'),
        'Alfa Slab One' => array
            ('0' => 'regular'),
        'Alice' => array
            ('0' => 'regular'),
        'Alike' => array
            ('0' => 'regular'),
        'Alike Angular' => array
            ('0' => 'regular'),
        'Allan' => array
            ('0' => 'regular', '1' => '700'),
        'Allerta' => array
            ('0' => 'regular'),
        'Allerta Stencil' => array
            ('0' => 'regular'),
        'Allura' => array
            ('0' => 'regular'),
        'Almendra' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700', '3' => '700italic'),
        'Almendra Display' => array
            ('0' => 'regular'),
        'Almendra SC' => array
            ('0' => 'regular'),
        'Amarante' => array
            ('0' => 'regular'),
        'Amaranth' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700', '3' => '700italic'),
        'Amatic SC' => array
            ('0' => 'regular', '1' => '700'),
        'Amethysta' => array
            ('0' => 'regular'),
        'Anaheim' => array
            ('0' => 'regular'),
        'Andada' => array
            ('0' => 'regular'),
        'Andika' => array
            ('0' => 'regular'),
        'Angkor' => array
            ('0' => 'regular'),
        'Annie Use Your Telescope' => array
            ('0' => 'regular'),
        'Anonymous Pro' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700', '3' => '700italic'),
        'Antic' => array
            ('0' => 'regular'),
        'Antic Didone' => array
            ('0' => 'regular'),
        'Antic Slab' => array
            ('0' => 'regular'),
        'Anton' => array
            ('0' => 'regular'),
        'Arapey' => array
            ('0' => 'regular', '1' => 'italic'),
        'Arbutus' => array
            ('0' => 'regular'),
        'Arbutus Slab' => array
            ('0' => 'regular'),
        'Architects Daughter' => array
            ('0' => 'regular'),
        'Archivo Black' => array
            ('0' => 'regular'),
        'Archivo Narrow' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700', '3' => '700italic'),
        'Arimo' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700', '3' => '700italic'),
        'Arizonia' => array
            ('0' => 'regular'),
        'Armata' => array
            ('0' => 'regular'),
        'Artifika' => array
            ('0' => 'regular'),
        'Arvo' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700', '3' => '700italic'),
        'Asap' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700', '3' => '700italic'),
        'Asset' => array
            ('0' => 'regular'),
        'Astloch' => array
            ('0' => 'regular', '1' => '700'),
        'Asul' => array
            ('0' => 'regular', '1' => '700'),
        'Atomic Age' => array
            ('0' => 'regular'),
        'Aubrey' => array
            ('0' => 'regular'),
        'Audiowide' => array
            ('0' => 'regular'),
        'Autour One' => array
            ('0' => 'regular'),
        'Average' => array
            ('0' => 'regular'),
        'Average Sans' => array
            ('0' => 'regular'),
        'Averia Gruesa Libre' => array
            ('0' => 'regular'),
        'Averia Libre' => array
            ('0' => '300', '1' => '300italic', '2' => 'regular', '3' => 'italic', '4' => '700', '5' => '700italic'),
        'Averia Sans Libre' => array
            ('0' => '300', '1' => '300italic', '2' => 'regular', '3' => 'italic', '4' => '700', '5' => '700italic'),
        'Averia Serif Libre' => array
            ('0' => '300', '1' => '300italic', '2' => 'regular', '3' => 'italic', '4' => '700', '5' => '700italic'),
        'Bad Script' => array
            ('0' => 'regular'),
        'Balthazar' => array
            ('0' => 'regular'),
        'Bangers' => array
            ('0' => 'regular'),
        'Basic' => array
            ('0' => 'regular'),
        'Battambang' => array
            ('0' => 'regular', '1' => '700'),
        'Baumans' => array
            ('0' => 'regular'),
        'Bayon' => array
            ('0' => 'regular'),
        'Belgrano' => array
            ('0' => 'regular'),
        'Belleza' => array
            ('0' => 'regular'),
        'BenchNine' => array
            ('0' => '300', '1' => 'regular', '2' => '700'),
        'Bentham' => array
            ('0' => 'regular'),
        'Berkshire Swash' => array
            ('0' => 'regular'),
        'Bevan' => array
            ('0' => 'regular'),
        'Bigelow Rules' => array
            ('0' => 'regular'),
        'Bigshot One' => array
            ('0' => 'regular'),
        'Bilbo' => array
            ('0' => 'regular'),
        'Bilbo Swash Caps' => array
            ('0' => 'regular'),
        'Bitter' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700'),
        'Black Ops One' => array
            ('0' => 'regular'),
        'Bokor' => array
            ('0' => 'regular'),
        'Bonbon' => array
            ('0' => 'regular'),
        'Boogaloo' => array
            ('0' => 'regular'),
        'Bowlby One' => array
            ('0' => 'regular'),
        'Bowlby One SC' => array
            ('0' => 'regular'),
        'Brawler' => array
            ('0' => 'regular'),
        'Bree Serif' => array
            ('0' => 'regular'),
        'Bubblegum Sans' => array
            ('0' => 'regular'),
        'Bubbler One' => array
            ('0' => 'regular'),
        'Buda' => array
            ('0' => '300'),
        'Buenard' => array
            ('0' => 'regular', '1' => '700'),
        'Butcherman' => array
            ('0' => 'regular'),
        'Butterfly Kids' => array
            ('0' => 'regular'),
        'Cabin' => array
            ('0' => 'regular', '1' => 'italic', '2' => '500', '3' => '500italic', '4' => '600', '5' => '600italic', '6' => '700', '7' => '700italic'),
        'Cabin Condensed' => array
            ('0' => 'regular', '1' => '500', '2' => '600', '3' => '700'),
        'Cabin Sketch' => array
            ('0' => 'regular', '1' => '700'),
        'Caesar Dressing' => array
            ('0' => 'regular'),
        'Cagliostro' => array
            ('0' => 'regular'),
        'Calligraffitti' => array
            ('0' => 'regular'),
        'Cambo' => array
            ('0' => 'regular'),
        'Candal' => array
            ('0' => 'regular'),
        'Cantarell' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700', '3' => '700italic'),
        'Cantata One' => array
            ('0' => 'regular'),
        'Cantora One' => array
            ('0' => 'regular'),
        'Capriola' => array
            ('0' => 'regular'),
        'Cardo' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700'),
        'Carme' => array
            ('0' => 'regular'),
        'Carrois Gothic' => array
            ('0' => 'regular'),
        'Carrois Gothic SC' => array
            ('0' => 'regular'),
        'Carter One' => array
            ('0' => 'regular'),
        'Caudex' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700', '3' => '700italic'),
        'Cedarville Cursive' => array
            ('0' => 'regular'),
        'Ceviche One' => array
            ('0' => 'regular'),
        'Changa One' => array
            ('0' => 'regular', '1' => 'italic'),
        'Chango' => array
            ('0' => 'regular'),
        'Chau Philomene One' => array
            ('0' => 'regular', '1' => 'italic'),
        'Chela One' => array
            ('0' => 'regular'),
        'Chelsea Market' => array
            ('0' => 'regular'),
        'Chenla' => array
            ('0' => 'regular'),
        'Cherry Cream Soda' => array
            ('0' => 'regular'),
        'Cherry Swash' => array
            ('0' => 'regular', '1' => '700'),
        'Chewy' => array
            ('0' => 'regular'),
        'Chicle' => array
            ('0' => 'regular'),
        'Chivo' => array
            ('0' => 'regular', '1' => 'italic', '2' => '900', '3' => '900italic'),
        'Cinzel' => array
            ('0' => 'regular', '1' => '700', '2' => '900'),
        'Cinzel Decorative' => array
            ('0' => 'regular', '1' => '700', '2' => '900'),
        'Clicker Script' => array
            ('0' => 'regular'),
        'Coda' => array
            ('0' => 'regular', '1' => '800'),
        'Coda Caption' => array
            ('0' => '800'),
        'Codystar' => array
            ('0' => '300', '1' => 'regular'),
        'Combo' => array
            ('0' => 'regular'),
        'Comfortaa' => array
            ('0' => '300', '1' => 'regular', '2' => '700'),
        'Coming Soon' => array
            ('0' => 'regular'),
        'Concert One' => array
            ('0' => 'regular'),
        'Condiment' => array
            ('0' => 'regular'),
        'Content' => array
            ('0' => 'regular', '1' => '700'),
        'Contrail One' => array
            ('0' => 'regular'),
        'Convergence' => array
            ('0' => 'regular'),
        'Cookie' => array
            ('0' => 'regular'),
        'Copse' => array
            ('0' => 'regular'),
        'Corben' => array
            ('0' => 'regular', '1' => '700'),
        'Courgette' => array
            ('0' => 'regular'),
        'Cousine' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700', '3' => '700italic'),
        'Coustard' => array
            ('0' => 'regular', '1' => '900'),
        'Covered By Your Grace' => array
            ('0' => 'regular'),
        'Crafty Girls' => array
            ('0' => 'regular'),
        'Creepster' => array
            ('0' => 'regular'),
        'Crete Round' => array
            ('0' => 'regular', '1' => 'italic'),
        'Crimson Text' => array
            ('0' => 'regular', '1' => 'italic', '2' => '600', '3' => '600italic', '4' => '700', '5' => '700italic'),
        'Croissant One' => array
            ('0' => 'regular'),
        'Crushed' => array
            ('0' => 'regular'),
        'Cuprum' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700', '3' => '700italic'),
        'Cutive' => array
            ('0' => 'regular'),
        'Cutive Mono' => array
            ('0' => 'regular'),
        'Damion' => array
            ('0' => 'regular'),
        'Dancing Script' => array
            ('0' => 'regular', '1' => '700'),
        'Dangrek' => array
            ('0' => 'regular'),
        'Dawning of a New Day' => array
            ('0' => 'regular'),
        'Days One' => array
            ('0' => 'regular'),
        'Delius' => array
            ('0' => 'regular'),
        'Delius Swash Caps' => array
            ('0' => 'regular'),
        'Delius Unicase' => array
            ('0' => 'regular', '1' => '700'),
        'Della Respira' => array
            ('0' => 'regular'),
        'Denk One' => array
            ('0' => 'regular'),
        'Devonshire' => array
            ('0' => 'regular'),
        'Didact Gothic' => array
            ('0' => 'regular'),
        'Diplomata' => array
            ('0' => 'regular'),
        'Diplomata SC' => array
            ('0' => 'regular'),
        'Domine' => array
            ('0' => 'regular', '1' => '700'),
        'Donegal One' => array
            ('0' => 'regular'),
        'Doppio One' => array
            ('0' => 'regular'),
        'Dorsa' => array
            ('0' => 'regular'),
        'Dosis' => array
            ('0' => '200', '1' => '300', '2' => 'regular', '3' => '500', '4' => '600', '5' => '700', '6' => '800'),
        'Dr Sugiyama' => array
            ('0' => 'regular'),
        'Droid Sans' => array
            ('0' => 'regular', '1' => '700'),
        'Droid Sans Mono' => array
            ('0' => 'regular'),
        'Droid Serif' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700', '3' => '700italic'),
        'Duru Sans' => array
            ('0' => 'regular'),
        'Dynalight' => array
            ('0' => 'regular'),
        'EB Garamond' => array
            ('0' => 'regular'),
        'Eagle Lake' => array
            ('0' => 'regular'),
        'Eater' => array
            ('0' => 'regular'),
        'Economica' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700', '3' => '700italic'),
        'Electrolize' => array
            ('0' => 'regular'),
        'Elsie' => array
            ('0' => 'regular', '1' => '900'),
        'Elsie Swash Caps' => array
            ('0' => 'regular', '1' => '900'),
        'Emblema One' => array
            ('0' => 'regular'),
        'Emilys Candy' => array
            ('0' => 'regular'),
        'Engagement' => array
            ('0' => 'regular'),
        'Englebert' => array
            ('0' => 'regular'),
        'Enriqueta' => array
            ('0' => 'regular', '1' => '700'),
        'Erica One' => array
            ('0' => 'regular'),
        'Esteban' => array
            ('0' => 'regular'),
        'Euphoria Script' => array
            ('0' => 'regular'),
        'Ewert' => array
            ('0' => 'regular'),
        'Exo' => array
            ('0' => '100', '1' => '100italic', '2' => '200', '3' => '200italic', '4' => '300', '5' => '300italic', '6' => 'regular', '7' => 'italic', '8' => '500', '9' => '500italic', '10' => '600', '11' => '600italic', '12' => '700', '13' => '700italic', '14' => '800', '15' => '800italic', '16' => '900', '17' => '900italic'),
        'Expletus Sans' => array
            ('0' => 'regular', '1' => 'italic', '2' => '500', '3' => '500italic', '4' => '600', '5' => '600italic', '6' => '700', '7' => '700italic'),
        'Fanwood Text' => array
            ('0' => 'regular', '1' => 'italic'),
        'Fascinate' => array
            ('0' => 'regular'),
        'Fascinate Inline' => array
            ('0' => 'regular'),
        'Faster One' => array
            ('0' => 'regular'),
        'Fasthand' => array
            ('0' => 'regular'),
        'Federant' => array
            ('0' => 'regular'),
        'Federo' => array
            ('0' => 'regular'),
        'Felipa' => array
            ('0' => 'regular'),
        'Fenix' => array
            ('0' => 'regular'),
        'Finger Paint' => array
            ('0' => 'regular'),
        'Fjalla One' => array
            ('0' => 'regular'),
        'Fjord One' => array
            ('0' => 'regular'),
        'Flamenco' => array
            ('0' => '300', '1' => 'regular'),
        'Flavors' => array
            ('0' => 'regular'),
        'Fondamento' => array
            ('0' => 'regular', '1' => 'italic'),
        'Fontdiner Swanky' => array
            ('0' => 'regular'),
        'Forum' => array
            ('0' => 'regular'),
        'Francois One' => array
            ('0' => 'regular'),
        'Freckle Face' => array
            ('0' => 'regular'),
        'Fredericka the Great' => array
            ('0' => 'regular'),
        'Fredoka One' => array
            ('0' => 'regular'),
        'Freehand' => array
            ('0' => 'regular'),
        'Fresca' => array
            ('0' => 'regular'),
        'Frijole' => array
            ('0' => 'regular'),
        'Fruktur' => array
            ('0' => 'regular'),
        'Fugaz One' => array
            ('0' => 'regular'),
        'GFS Didot' => array
            ('0' => 'regular'),
        'GFS Neohellenic' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700', '3' => '700italic'),
        'Gabriela' => array
            ('0' => 'regular'),
        'Gafata' => array
            ('0' => 'regular'),
        'Galdeano' => array
            ('0' => 'regular'),
        'Galindo' => array
            ('0' => 'regular'),
        'Gentium Basic' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700', '3' => '700italic'),
        'Gentium Book Basic' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700', '3' => '700italic'),
        'Geo' => array
            ('0' => 'regular', '1' => 'italic'),
        'Geostar' => array
            ('0' => 'regular'),
        'Geostar Fill' => array
            ('0' => 'regular'),
        'Germania One' => array
            ('0' => 'regular'),
        'Gilda Display' => array
            ('0' => 'regular'),
        'Give You Glory' => array
            ('0' => 'regular'),
        'Glass Antiqua' => array
            ('0' => 'regular'),
        'Glegoo' => array
            ('0' => 'regular'),
        'Gloria Hallelujah' => array
            ('0' => 'regular'),
        'Goblin One' => array
            ('0' => 'regular'),
        'Gochi Hand' => array
            ('0' => 'regular'),
        'Gorditas' => array
            ('0' => 'regular', '1' => '700'),
        'Goudy Bookletter 1911' => array
            ('0' => 'regular'),
        'Graduate' => array
            ('0' => 'regular'),
        'Grand Hotel' => array
            ('0' => 'regular'),
        'Gravitas One' => array
            ('0' => 'regular'),
        'Great Vibes' => array
            ('0' => 'regular'),
        'Griffy' => array
            ('0' => 'regular'),
        'Gruppo' => array
            ('0' => 'regular'),
        'Gudea' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700'),
        'Habibi' => array
            ('0' => 'regular'),
        'Hammersmith One' => array
            ('0' => 'regular'),
        'Hanalei' => array
            ('0' => 'regular'),
        'Hanalei Fill' => array
            ('0' => 'regular'),
        'Handlee' => array
            ('0' => 'regular'),
        'Hanuman' => array
            ('0' => 'regular', '1' => '700'),
        'Happy Monkey' => array
            ('0' => 'regular'),
        'Headland One' => array
            ('0' => 'regular'),
        'Henny Penny' => array
            ('0' => 'regular'),
        'Herr Von Muellerhoff' => array
            ('0' => 'regular'),
        'Holtwood One SC' => array
            ('0' => 'regular'),
        'Homemade Apple' => array
            ('0' => 'regular'),
        'Homenaje' => array
            ('0' => 'regular'),
        'IM Fell DW Pica' => array
            ('0' => 'regular', '1' => 'italic'),
        'IM Fell DW Pica SC' => array
            ('0' => 'regular'),
        'IM Fell Double Pica' => array
            ('0' => 'regular', '1' => 'italic'),
        'IM Fell Double Pica SC' => array
            ('0' => 'regular'),
        'IM Fell English' => array
            ('0' => 'regular', '1' => 'italic'),
        'IM Fell English SC' => array
            ('0' => 'regular'),
        'IM Fell French Canon' => array
            ('0' => 'regular', '1' => 'italic'),
        'IM Fell French Canon SC' => array
            ('0' => 'regular'),
        'IM Fell Great Primer' => array
            ('0' => 'regular', '1' => 'italic'),
        'IM Fell Great Primer SC' => array
            ('0' => 'regular'),
        'Iceberg' => array
            ('0' => 'regular'),
        'Iceland' => array
            ('0' => 'regular'),
        'Imprima' => array
            ('0' => 'regular'),
        'Inconsolata' => array
            ('0' => 'regular', '1' => '700'),
        'Inder' => array
            ('0' => 'regular'),
        'Indie Flower' => array
            ('0' => 'regular'),
        'Inika' => array
            ('0' => 'regular', '1' => '700'),
        'Irish Grover' => array
            ('0' => 'regular'),
        'Istok Web' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700', '3' => '700italic'),
        'Italiana' => array
            ('0' => 'regular'),
        'Italianno' => array
            ('0' => 'regular'),
        'Jacques Francois' => array
            ('0' => 'regular'),
        'Jacques Francois Shadow' => array
            ('0' => 'regular'),
        'Jim Nightshade' => array
            ('0' => 'regular'),
        'Jockey One' => array
            ('0' => 'regular'),
        'Jolly Lodger' => array
            ('0' => 'regular'),
        'Josefin Sans' => array
            ('0' => '100', '1' => '100italic', '2' => '300', '3' => '300italic', '4' => 'regular', '5' => 'italic', '6' => '600', '7' => '600italic', '8' => '700', '9' => '700italic'),
        'Josefin Slab' => array
            ('0' => '100', '1' => '100italic', '2' => '300', '3' => '300italic', '4' => 'regular', '5' => 'italic', '6' => '600', '7' => '600italic', '8' => '700', '9' => '700italic'),
        'Joti One' => array
            ('0' => 'regular'),
        'Judson' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700'),
        'Julee' => array
            ('0' => 'regular'),
        'Julius Sans One' => array
            ('0' => 'regular'),
        'Junge' => array
            ('0' => 'regular'),
        'Jura' => array
            ('0' => '300', '1' => 'regular', '2' => '500', '3' => '600'),
        'Just Another Hand' => array
            ('0' => 'regular'),
        'Just Me Again Down Here' => array
            ('0' => 'regular'),
        'Kameron' => array
            ('0' => 'regular', '1' => '700'),
        'Karla' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700', '3' => '700italic'),
        'Kaushan Script' => array
            ('0' => 'regular'),
        'Kavoon' => array
            ('0' => 'regular'),
        'Keania One' => array
            ('0' => 'regular'),
        'Kelly Slab' => array
            ('0' => 'regular'),
        'Kenia' => array
            ('0' => 'regular'),
        'Khmer' => array
            ('0' => 'regular'),
        'Kite One' => array
            ('0' => 'regular'),
        'Knewave' => array
            ('0' => 'regular'),
        'Kotta One' => array
            ('0' => 'regular'),
        'Koulen' => array
            ('0' => 'regular'),
        'Kranky' => array
            ('0' => 'regular'),
        'Kreon' => array
            ('0' => '300', '1' => 'regular', '2' => '700'),
        'Kristi' => array
            ('0' => 'regular'),
        'Krona One' => array
            ('0' => 'regular'),
        'La Belle Aurore' => array
            ('0' => 'regular'),
        'Lancelot' => array
            ('0' => 'regular'),
        'Lato' => array
            ('0' => '100', '1' => '100italic', '2' => '300', '3' => '300italic', '4' => 'regular', '5' => 'italic', '6' => '700', '7' => '700italic', '8' => '900', '9' => '900italic'),
        'League Script' => array
            ('0' => 'regular'),
        'Leckerli One' => array
            ('0' => 'regular'),
        'Ledger' => array
            ('0' => 'regular'),
        'Lekton' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700'),
        'Lemon' => array
            ('0' => 'regular'),
        'Libre Baskerville' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700'),
        'Life Savers' => array
            ('0' => 'regular', '1' => '700'),
        'Lilita One' => array
            ('0' => 'regular'),
        'Limelight' => array
            ('0' => 'regular'),
        'Linden Hill' => array
            ('0' => 'regular', '1' => 'italic'),
        'Lobster' => array
            ('0' => 'regular'),
        'Lobster Two' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700', '3' => '700italic'),
        'Londrina Outline' => array
            ('0' => 'regular'),
        'Londrina Shadow' => array
            ('0' => 'regular'),
        'Londrina Sketch' => array
            ('0' => 'regular'),
        'Londrina Solid' => array
            ('0' => 'regular'),
        'Lora' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700', '3' => '700italic'),
        'Love Ya Like A Sister' => array
            ('0' => 'regular'),
        'Loved by the King' => array
            ('0' => 'regular'),
        'Lovers Quarrel' => array
            ('0' => 'regular'),
        'Luckiest Guy' => array
            ('0' => 'regular'),
        'Lusitana' => array
            ('0' => 'regular', '1' => '700'),
        'Lustria' => array
            ('0' => 'regular'),
        'Macondo' => array
            ('0' => 'regular'),
        'Macondo Swash Caps' => array
            ('0' => 'regular'),
        'Magra' => array
            ('0' => 'regular', '1' => '700'),
        'Maiden Orange' => array
            ('0' => 'regular'),
        'Mako' => array
            ('0' => 'regular'),
        'Marcellus' => array
            ('0' => 'regular'),
        'Marcellus SC' => array
            ('0' => 'regular'),
        'Marck Script' => array
            ('0' => 'regular'),
        'Margarine' => array
            ('0' => 'regular'),
        'Marko One' => array
            ('0' => 'regular'),
        'Marmelad' => array
            ('0' => 'regular'),
        'Marvel' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700', '3' => '700italic'),
        'Mate' => array
            ('0' => 'regular', '1' => 'italic'),
        'Mate SC' => array
            ('0' => 'regular'),
        'Maven Pro' => array
            ('0' => 'regular', '1' => '500', '2' => '700', '3' => '900'),
        'McLaren' => array
            ('0' => 'regular'),
        'Meddon' => array
            ('0' => 'regular'),
        'MedievalSharp' => array
            ('0' => 'regular'),
        'Medula One' => array
            ('0' => 'regular'),
        'Megrim' => array
            ('0' => 'regular'),
        'Meie Script' => array
            ('0' => 'regular'),
        'Merienda' => array
            ('0' => 'regular', '1' => '700'),
        'Merienda One' => array
            ('0' => 'regular'),
        'Merriweather' => array
            ('0' => '300', '1' => 'regular', '2' => '700', '3' => '900'),
        'Merriweather Sans' => array
            ('0' => '300', '1' => 'regular', '2' => '700', '3' => '800'),
        'Metal' => array
            ('0' => 'regular'),
        'Metal Mania' => array
            ('0' => 'regular'),
        'Metamorphous' => array
            ('0' => 'regular'),
        'Metrophobic' => array
            ('0' => 'regular'),
        'Michroma' => array
            ('0' => 'regular'),
        'Milonga' => array
            ('0' => 'regular'),
        'Miltonian' => array
            ('0' => 'regular'),
        'Miltonian Tattoo' => array
            ('0' => 'regular'),
        'Miniver' => array
            ('0' => 'regular'),
        'Miss Fajardose' => array
            ('0' => 'regular'),
        'Modern Antiqua' => array
            ('0' => 'regular'),
        'Molengo' => array
            ('0' => 'regular'),
        'Molle' => array
            ('0' => 'italic'),
        'Monda' => array
            ('0' => 'regular', '1' => '700'),
        'Monofett' => array
            ('0' => 'regular'),
        'Monoton' => array
            ('0' => 'regular'),
        'Monsieur La Doulaise' => array
            ('0' => 'regular'),
        'Montaga' => array
            ('0' => 'regular'),
        'Montez' => array
            ('0' => 'regular'),
        'Montserrat' => array
            ('0' => 'regular', '1' => '700'),
        'Montserrat Alternates' => array
            ('0' => 'regular', '1' => '700'),
        'Montserrat Subrayada' => array
            ('0' => 'regular', '1' => '700'),
        'Moul' => array
            ('0' => 'regular'),
        'Moulpali' => array
            ('0' => 'regular'),
        'Mountains of Christmas' => array
            ('0' => 'regular', '1' => '700'),
        'Mouse Memoirs' => array
            ('0' => 'regular'),
        'Mr Bedfort' => array
            ('0' => 'regular'),
        'Mr Dafoe' => array
            ('0' => 'regular'),
        'Mr De Haviland' => array
            ('0' => 'regular'),
        'Mrs Saint Delafield' => array
            ('0' => 'regular'),
        'Mrs Sheppards' => array
            ('0' => 'regular'),
        'Muli' => array
            ('0' => '300', '1' => '300italic', '2' => 'regular', '3' => 'italic'),
        'Mystery Quest' => array
            ('0' => 'regular'),
        'Neucha' => array
            ('0' => 'regular'),
        'Neuton' => array
            ('0' => '200', '1' => '300', '2' => 'regular', '3' => 'italic', '4' => '700', '5' => '800'),
        'New Rocker' => array
            ('0' => 'regular'),
        'News Cycle' => array
            ('0' => 'regular', '1' => '700'),
        'Niconne' => array
            ('0' => 'regular'),
        'Nixie One' => array
            ('0' => 'regular'),
        'Nobile' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700', '3' => '700italic'),
        'Nokora' => array
            ('0' => 'regular', '1' => '700'),
        'Norican' => array
            ('0' => 'regular'),
        'Nosifer' => array
            ('0' => 'regular'),
        'Nothing You Could Do' => array
            ('0' => 'regular'),
        'Noticia Text' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700', '3' => '700italic'),
        'Nova Cut' => array
            ('0' => 'regular'),
        'Nova Flat' => array
            ('0' => 'regular'),
        'Nova Mono' => array
            ('0' => 'regular'),
        'Nova Oval' => array
            ('0' => 'regular'),
        'Nova Round' => array
            ('0' => 'regular'),
        'Nova Script' => array
            ('0' => 'regular'),
        'Nova Slim' => array
            ('0' => 'regular'),
        'Nova Square' => array
            ('0' => 'regular'),
        'Numans' => array
            ('0' => 'regular'),
        'Nunito' => array
            ('0' => '300', '1' => 'regular', '2' => '700'),
        'Odor Mean Chey' => array
            ('0' => 'regular'),
        'Offside' => array
            ('0' => 'regular'),
        'Old Standard TT' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700'),
        'Oldenburg' => array
            ('0' => 'regular'),
        'Oleo Script' => array
            ('0' => 'regular', '1' => '700'),
        'Oleo Script Swash Caps' => array
            ('0' => 'regular', '1' => '700'),
        'Open Sans' => array
            ('0' => '300', '1' => '300italic', '2' => 'regular', '3' => 'italic', '4' => '600', '5' => '600italic', '6' => '700', '7' => '700italic', '8' => '800', '9' => '800italic'),
        'Open Sans Condensed' => array
            ('0' => '300', '1' => '300italic', '2' => '700'),
        'Oranienbaum' => array
            ('0' => 'regular'),
        'Orbitron' => array
            ('0' => 'regular', '1' => '500', '2' => '700', '3' => '900'),
        'Oregano' => array
            ('0' => 'regular', '1' => 'italic'),
        'Orienta' => array
            ('0' => 'regular'),
        'Original Surfer' => array
            ('0' => 'regular'),
        'Oswald' => array
            ('0' => '300', '1' => 'regular', '2' => '700'),
        'Over the Rainbow' => array
            ('0' => 'regular'),
        'Overlock' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700', '3' => '700italic', '4' => '900', '5' => '900italic'),
        'Overlock SC' => array
            ('0' => 'regular'),
        'Ovo' => array
            ('0' => 'regular'),
        'Oxygen' => array
            ('0' => '300', '1' => 'regular', '2' => '700'),
        'Oxygen Mono' => array
            ('0' => 'regular'),
        'PT Mono' => array
            ('0' => 'regular'),
        'PT Sans' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700', '3' => '700italic'),
        'PT Sans Caption' => array
            ('0' => 'regular', '1' => '700'),
        'PT Sans Narrow' => array
            ('0' => 'regular', '1' => '700'),
        'PT Serif' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700', '3' => '700italic'),
        'PT Serif Caption' => array
            ('0' => 'regular', '1' => 'italic'),
        'Pacifico' => array
            ('0' => 'regular'),
        'Paprika' => array
            ('0' => 'regular'),
        'Parisienne' => array
            ('0' => 'regular'),
        'Passero One' => array
            ('0' => 'regular'),
        'Passion One' => array
            ('0' => 'regular', '1' => '700', '2' => '900'),
        'Patrick Hand' => array
            ('0' => 'regular'),
        'Patrick Hand SC' => array
            ('0' => 'regular'),
        'Patua One' => array
            ('0' => 'regular'),
        'Paytone One' => array
            ('0' => 'regular'),
        'Peralta' => array
            ('0' => 'regular'),
        'Permanent Marker' => array
            ('0' => 'regular'),
        'Petit Formal Script' => array
            ('0' => 'regular'),
        'Petrona' => array
            ('0' => 'regular'),
        'Philosopher' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700', '3' => '700italic'),
        'Piedra' => array
            ('0' => 'regular'),
        'Pinyon Script' => array
            ('0' => 'regular'),
        'Pirata One' => array
            ('0' => 'regular'),
        'Plaster' => array
            ('0' => 'regular'),
        'Play' => array
            ('0' => 'regular', '1' => '700'),
        'Playball' => array
            ('0' => 'regular'),
        'Playfair Display' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700', '3' => '700italic', '4' => '900', '5' => '900italic'),
        'Playfair Display SC' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700', '3' => '700italic', '4' => '900', '5' => '900italic'),
        'Podkova' => array
            ('0' => 'regular', '1' => '700'),
        'Poiret One' => array
            ('0' => 'regular'),
        'Poller One' => array
            ('0' => 'regular'),
        'Poly' => array
            ('0' => 'regular', '1' => 'italic'),
        'Pompiere' => array
            ('0' => 'regular'),
        'Pontano Sans' => array
            ('0' => 'regular'),
        'Port Lligat Sans' => array
            ('0' => 'regular'),
        'Port Lligat Slab' => array
            ('0' => 'regular'),
        'Prata' => array
            ('0' => 'regular'),
        'Preahvihear' => array
            ('0' => 'regular'),
        'Press Start 2P' => array
            ('0' => 'regular'),
        'Princess Sofia' => array
            ('0' => 'regular'),
        'Prociono' => array
            ('0' => 'regular'),
        'Prosto One' => array
            ('0' => 'regular'),
        'Puritan' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700', '3' => '700italic'),
        'Purple Purse' => array
            ('0' => 'regular'),
        'Quando' => array
            ('0' => 'regular'),
        'Quantico' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700', '3' => '700italic'),
        'Quattrocento' => array
            ('0' => 'regular', '1' => '700'),
        'Quattrocento Sans' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700', '3' => '700italic'),
        'Questrial' => array
            ('0' => 'regular'),
        'Quicksand' => array
            ('0' => '300', '1' => 'regular', '2' => '700'),
        'Quintessential' => array
            ('0' => 'regular'),
        'Qwigley' => array
            ('0' => 'regular'),
        'Racing Sans One' => array
            ('0' => 'regular'),
        'Radley' => array
            ('0' => 'regular', '1' => 'italic'),
        'Raleway' => array
            ('0' => '100', '1' => '200', '2' => '300', '3' => 'regular', '4' => '500', '5' => '600', '6' => '700', '7' => '800', '8' => '900'),
        'Raleway Dots' => array
            ('0' => 'regular'),
        'Rambla' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700', '3' => '700italic'),
        'Rammetto One' => array
            ('0' => 'regular'),
        'Ranchers' => array
            ('0' => 'regular'),
        'Rancho' => array
            ('0' => 'regular'),
        'Rationale' => array
            ('0' => 'regular'),
        'Redressed' => array
            ('0' => 'regular'),
        'Reenie Beanie' => array
            ('0' => 'regular'),
        'Revalia' => array
            ('0' => 'regular'),
        'Ribeye' => array
            ('0' => 'regular'),
        'Ribeye Marrow' => array
            ('0' => 'regular'),
        'Righteous' => array
            ('0' => 'regular'),
        'Risque' => array
            ('0' => 'regular'),
        'Roboto' => array
            ('0' => '100', '1' => '100italic', '2' => '300', '3' => '300italic', '4' => 'regular', '5' => 'italic', '6' => '500', '7' => '500italic', '8' => '700', '9' => '700italic', '10' => '900', '11' => '900italic'),
        'Roboto Condensed' => array
            ('0' => '300', '1' => '300italic', '2' => 'regular', '3' => 'italic', '4' => '700', '5' => '700italic'),
        'Rochester' => array
            ('0' => 'regular'),
        'Rock Salt' => array
            ('0' => 'regular'),
        'Rokkitt' => array
            ('0' => 'regular', '1' => '700'),
        'Romanesco' => array
            ('0' => 'regular'),
        'Ropa Sans' => array
            ('0' => 'regular', '1' => 'italic'),
        'Rosario' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700', '3' => '700italic'),
        'Rosarivo' => array
            ('0' => 'regular', '1' => 'italic'),
        'Rouge Script' => array
            ('0' => 'regular'),
        'Ruda' => array
            ('0' => 'regular', '1' => '700', '2' => '900'),
        'Rufina' => array
            ('0' => 'regular', '1' => '700'),
        'Ruge Boogie' => array
            ('0' => 'regular'),
        'Ruluko' => array
            ('0' => 'regular'),
        'Rum Raisin' => array
            ('0' => 'regular'),
        'Ruslan Display' => array
            ('0' => 'regular'),
        'Russo One' => array
            ('0' => 'regular'),
        'Ruthie' => array
            ('0' => 'regular'),
        'Rye' => array
            ('0' => 'regular'),
        'Sacramento' => array
            ('0' => 'regular'),
        'Sail' => array
            ('0' => 'regular'),
        'Salsa' => array
            ('0' => 'regular'),
        'Sanchez' => array
            ('0' => 'regular', '1' => 'italic'),
        'Sancreek' => array
            ('0' => 'regular'),
        'Sansita One' => array
            ('0' => 'regular'),
        'Sarina' => array
            ('0' => 'regular'),
        'Satisfy' => array
            ('0' => 'regular'),
        'Scada' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700', '3' => '700italic'),
        'Schoolbell' => array
            ('0' => 'regular'),
        'Seaweed Script' => array
            ('0' => 'regular'),
        'Sevillana' => array
            ('0' => 'regular'),
        'Seymour One' => array
            ('0' => 'regular'),
        'Shadows Into Light' => array
            ('0' => 'regular'),
        'Shadows Into Light Two' => array
            ('0' => 'regular'),
        'Shanti' => array
            ('0' => 'regular'),
        'Share' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700', '3' => '700italic'),
        'Share Tech' => array
            ('0' => 'regular'),
        'Share Tech Mono' => array
            ('0' => 'regular'),
        'Shojumaru' => array
            ('0' => 'regular'),
        'Short Stack' => array
            ('0' => 'regular'),
        'Siemreap' => array
            ('0' => 'regular'),
        'Sigmar One' => array
            ('0' => 'regular'),
        'Signika' => array
            ('0' => '300', '1' => 'regular', '2' => '600', '3' => '700'),
        'Signika Negative' => array
            ('0' => '300', '1' => 'regular', '2' => '600', '3' => '700'),
        'Simonetta' => array
            ('0' => 'regular', '1' => 'italic', '2' => '900', '3' => '900italic'),
        'Sintony' => array
            ('0' => 'regular', '1' => '700'),
        'Sirin Stencil' => array
            ('0' => 'regular'),
        'Six Caps' => array
            ('0' => 'regular'),
        'Skranji' => array
            ('0' => 'regular', '1' => '700'),
        'Slackey' => array
            ('0' => 'regular'),
        'Smokum' => array
            ('0' => 'regular'),
        'Smythe' => array
            ('0' => 'regular'),
        'Sniglet' => array
            ('0' => '800'),
        'Snippet' => array
            ('0' => 'regular'),
        'Snowburst One' => array
            ('0' => 'regular'),
        'Sofadi One' => array
            ('0' => 'regular'),
        'Sofia' => array
            ('0' => 'regular'),
        'Sonsie One' => array
            ('0' => 'regular'),
        'Sorts Mill Goudy' => array
            ('0' => 'regular', '1' => 'italic'),
        'Source Code Pro' => array
            ('0' => '200', '1' => '300', '2' => 'regular', '3' => '500', '4' => '600', '5' => '700', '6' => '900'),
        'Source Sans Pro' => array
            ('0' => '200', '1' => '200italic', '2' => '300', '3' => '300italic', '4' => 'regular', '5' => 'italic', '6' => '600', '7' => '600italic', '8' => '700', '9' => '700italic', '10' => '900', '11' => '900italic'),
        'Special Elite' => array
            ('0' => 'regular'),
        'Spicy Rice' => array
            ('0' => 'regular'),
        'Spinnaker' => array
            ('0' => 'regular'),
        'Spirax' => array
            ('0' => 'regular'),
        'Squada One' => array
            ('0' => 'regular'),
        'Stalemate' => array
            ('0' => 'regular'),
        'Stalinist One' => array
            ('0' => 'regular'),
        'Stardos Stencil' => array
            ('0' => 'regular', '1' => '700'),
        'Stint Ultra Condensed' => array
            ('0' => 'regular'),
        'Stint Ultra Expanded' => array
            ('0' => 'regular'),
        'Stoke' => array
            ('0' => '300', '1' => 'regular'),
        'Strait' => array
            ('0' => 'regular'),
        'Sue Ellen Francisco' => array
            ('0' => 'regular'),
        'Sunshiney' => array
            ('0' => 'regular'),
        'Supermercado One' => array
            ('0' => 'regular'),
        'Suwannaphum' => array
            ('0' => 'regular'),
        'Swanky and Moo Moo' => array
            ('0' => 'regular'),
        'Syncopate' => array
            ('0' => 'regular', '1' => '700'),
        'Tangerine' => array
            ('0' => 'regular', '1' => '700'),
        'Taprom' => array
            ('0' => 'regular'),
        'Tauri' => array
            ('0' => 'regular'),
        'Telex' => array
            ('0' => 'regular'),
        'Tenor Sans' => array
            ('0' => 'regular'),
        'Text Me One' => array
            ('0' => 'regular'),
        'The Girl Next Door' => array
            ('0' => 'regular'),
        'Tienne' => array
            ('0' => 'regular', '1' => '700', '2' => '900'),
        'Tinos' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700', '3' => '700italic'),
        'Titan One' => array
            ('0' => 'regular'),
        'Titillium Web' => array
            ('0' => '200', '1' => '200italic', '2' => '300', '3' => '300italic', '4' => 'regular', '5' => 'italic', '6' => '600', '7' => '600italic', '8' => '700', '9' => '700italic', '10' => '900'),
        'Trade Winds' => array
            ('0' => 'regular'),
        'Trocchi' => array
            ('0' => 'regular'),
        'Trochut' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700'),
        'Trykker' => array
            ('0' => 'regular'),
        'Tulpen One' => array
            ('0' => 'regular'),
        'Ubuntu' => array
            ('0' => '300', '1' => '300italic', '2' => 'regular', '3' => 'italic', '4' => '500', '5' => '500italic', '6' => '700', '7' => '700italic'),
        'Ubuntu Condensed' => array
            ('0' => 'regular'),
        'Ubuntu Mono' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700', '3' => '700italic'),
        'Ultra' => array
            ('0' => 'regular'),
        'Uncial Antiqua' => array
            ('0' => 'regular'),
        'Underdog' => array
            ('0' => 'regular'),
        'Unica One' => array
            ('0' => 'regular'),
        'UnifrakturCook' => array
            ('0' => '700'),
        'UnifrakturMaguntia' => array
            ('0' => 'regular'),
        'Unkempt' => array
            ('0' => 'regular', '1' => '700'),
        'Unlock' => array
            ('0' => 'regular'),
        'Unna' => array
            ('0' => 'regular'),
        'VT323' => array
            ('0' => 'regular'),
        'Vampiro One' => array
            ('0' => 'regular'),
        'Varela' => array
            ('0' => 'regular'),
        'Varela Round' => array
            ('0' => 'regular'),
        'Vast Shadow' => array
            ('0' => 'regular'),
        'Vibur' => array
            ('0' => 'regular'),
        'Vidaloka' => array
            ('0' => 'regular'),
        'Viga' => array
            ('0' => 'regular'),
        'Voces' => array
            ('0' => 'regular'),
        'Volkhov' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700', '3' => '700italic'),
        'Vollkorn' => array
            ('0' => 'regular', '1' => 'italic', '2' => '700', '3' => '700italic'),
        'Voltaire' => array
            ('0' => 'regular'),
        'Waiting for the Sunrise' => array
            ('0' => 'regular'),
        'Wallpoet' => array
            ('0' => 'regular'),
        'Walter Turncoat' => array
            ('0' => 'regular'),
        'Warnes' => array
            ('0' => 'regular'),
        'Wellfleet' => array
            ('0' => 'regular'),
        'Wendy One' => array
            ('0' => 'regular'),
        'Wire One' => array
            ('0' => 'regular'),
        'Yanone Kaffeesatz' => array
            ('0' => '200', '1' => '300', '2' => 'regular', '3' => '700'),
        'Yellowtail' => array
            ('0' => 'regular'),
        'Yeseva One' => array
            ('0' => 'regular'),
        'Yesteryear' => array
            ('0' => 'regular'),
        'Zeyada' => array
            ('0' => 'regular'),
    );

    update_option('cs_font_list', $font_list_init);
    update_option('cs_font_attribute', $font_atts_int);
}

/* get google font array from jason */

function cs_get_google_fontlist($response = '') {
    $font_list = '';
    if (isset($response) && $response != '') {
        $json_fonts = json_decode($response, true);
        $items = isset($json_fonts['items']) ? $json_fonts['items'] : '';
        $font_list = array();
        $i = 0;
        if (isset($items) && $items <> '' && is_array($items)) {
            foreach ($items as $item) {
                if (isset($item['family'])) {
                    $key = $item['family'];
                    $font_list[$key] = $item['family'];
                }
                $i++;
            }
        }
    }
    return $font_list;
}

/* get google font array from jason */

function cs_get_google_font_attribute($response = '', $id = 'ABeeZee') {
    global $fonts;
    if (get_option('cs_font_attribute')) {
        $font_attribute = get_option('cs_font_attribute');
        if (isset($font_attribute) && $font_attribute <> '') {
            $items = isset($font_attribute[$id]) ? $font_attribute[$id] : '';
        }
    } else {
        $arrtibue_array = cs_font_attribute($fonts);
        $items = isset($arrtibue_array[$id]) ? $arrtibue_array[$id] : '';
    }
    return $items;
}

/** end google font from api ** */
/** Get Google font attributes ** */
add_action('wp_ajax_cs_get_google_font_attributes', 'cs_get_google_font_attributes');

function cs_get_google_font_attributes() {
    global $fonts;
    $posted_id = '';
    if (isset($_POST['id']) and $_POST['id'] <> '') {
        $posted_id = $_POST['id'];
    }
    if (isset($_POST['index']) and $_POST['index'] <> '') {
        $index = $_POST['index'];
    } else {
        $index = '';
    }
    if ($index != 'default') {
        if (get_option('cs_font_attribute')) {
            $font_attribute = get_option('cs_font_attribute');
            $items = isset($font_attribute[$index]) ? $font_attribute[$index] : '';
        } else {
            if (isset($fonts) && $fonts != '') {
                $json_fonts = json_decode($fonts, true);
                $items = isset($json_fonts['items'][$index]['variants']) ? $json_fonts['items'][$index]['variants'] : '';
            }
        }
        $html = '<select id="' . $posted_id . '" name="' . $posted_id . '"><option value="">' . __('Select Attribute', 'LMS') . '</option>';
        if (isset($items) && is_array($items)) {
            foreach ($items as $key => $value) {
                $html .= '<option value="' . $value . '">' . $value . '</option>';
            }
        }
        $html .='</select>';
    } else {
        $html = '<select id="' . $posted_id . '" name="' . $posted_id . '"><option value="">' . __('Select Attribute', 'LMS') . '</option></select>';
    }
    echo $html;
    die();
}

function cs_font_attribute($fontarray = '') {
    global $fonts;
    //return $response;	
    if (isset($fontarray) && $fontarray != '') {

        $json_fonts = json_decode($fontarray, true);
        $items = isset($json_fonts['items']) ? $json_fonts['items'] : '';
    }

    $font_list = array();
    $i = 0;
    if (isset($items) && $items <> '' && is_array($items)) {
        foreach ($items as $item) {
            //$key=str_replace(' ','-',$item['family']);
            if (isset($item['family'])) {
                $key = $item['family'];
                $font_list[$key] = isset($item['variants']) ? $item['variants'] : '';
            }
            $i++;
        }
    }
    return $font_list;
}

/**
 * @Set Font for Frontend
 */
if (!function_exists('cs_get_font_family')) {

    function cs_get_font_family($font_index = 'default', $att = 'regular') {
        global $fonts;
        $html = '';
        if ($font_index != 'default') {
            $fonts = cs_googlefont_list();
            $all_att = '';
            if (isset($fonts) and is_array($fonts)) {
                $name = isset($fonts[$font_index]) ? $fonts[$font_index] : '';
                $name = str_replace(' ', '+', $name);
                if ($att <> '')
                    $all_att = ':' . $att;
                $url = 'http://fonts.googleapis.com/css?family=' . $name . $all_att;
			   	//$user_id = 'http://fonts.googleapis.com/css?family=' . $name . $all_att;
					
					
				//	$response = wp_remote_get( esc_url_raw( $user_id ) );
				//	$url = json_decode( wp_remote_retrieve_body( $response ), true );
                $html = '@import url(' . $url . ');';
            }
        }
        else {
            $html = '';
        }
        return $html;
    }

}

/**
 * @Get font family Frontend.
 */
if (!function_exists('cs_get_font_name')) {

    function cs_get_font_name($font_index = 'default') {
        global $fonts;
        if ($font_index != 'default') {
            $fonts = cs_googlefont_list();
            if (isset($fonts) and is_array($fonts)) {
                $name = isset($fonts[$font_index]) ? $fonts[$font_index] : '';
                return $name;
            }
        } else {
            return 'default';
        }
    }

}
if (!function_exists('recursive_array_replace')) {

    function recursive_array_replace($array) {
        global $fonts;
        if (is_array($array)) {
            $new_array = array();
            for ($i = 0; $i < sizeof($array); $i++) {
                $new_array[] = $array[$i] == 'regular' ? 'Normal' : $array[$i];
            }
        }

        return $new_array;
    }

}
/**
 * @Get font family Frontend.
 */
if (!function_exists('cs_get_font_att_array')) {

    function cs_get_font_att_array($atts = array()) {
        global $fonts;
        $atts = recursive_array_replace($atts);
        if (sizeof($atts) == 1 and is_numeric($atts[0]))
            $atts = array_merge($atts, array('Normal'));
        $r_atts = '';
        foreach ($atts as $att) {
            $r_atts .= $att . ' ';
        }
        return $r_atts;
    }

}

/**
 * @Frontend Font Printing.
 */
if (!function_exists('cs_font_font_print')) {

    function cs_font_font_print($atts = array(), $size, $f_name, $imp = false) {
        global $fonts;
        $important = '';
        $html = '';
        $f_name = cs_get_font_name($f_name);
        if ($f_name == 'default' || $f_name == '') {
            if ($imp == true)
                $important = ' !important';
            $html = 'font-size:' . $size . 'px' . $important . ';';
        }
        else {
            if ($imp == true)
                $important = ' !important';
            $html = 'font:' . $atts . ' ' . $size . 'px \'' . $f_name . '\', sans-serif' . $important . ';';
        }

        return $html;
    }

}