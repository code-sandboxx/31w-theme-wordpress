<?php
// Enfiler la feuille de style
function ajouter_styles() {
    wp_enqueue_style('31w-style-principal', // id de la feuille de style
                get_template_directory_uri() . '/style.css', // adresse url de la feuille de style
                array(), // les dépendances avec les autres feuilles de style
                filemtime(get_template_directory() . '/style.css')); // la de la dernière feuille de style
}
add_action( 'wp_enqueue_scripts', 'ajouter_styles' );

/* ------------------ Add_Google Fonts -------------------------- */
function wpb_add_google_fonts() {   
                                     wp_enqueue_style( 'wpb-google-fonts', 
                                                        '<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;600;700&family=Poppins:wght@300;600;900&display=swap" rel="stylesheet">', 
                                                        false );    
                                }   
add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );


/* ------------------ Add_theme_support -------------------------- */
add_theme_support( 'html5', 
                    array(  'search-form',                            
                            'gallery', 
                            'caption' 
                    ) );

add_theme_support( 'title-tag' );

add_theme_support( 'custom-logo', 
                    array(
                        'height' => 150,
                        'width'  => 150,
                    ) );
add_theme_support('custom-background'); 
add_theme_support( 'post-thumbnails' );                  

/* ------------------ Enregistrement des menus ------------------- */

    function enregistrement_des_menus(){
        register_nav_menus( array(
            'menu_entete' => 'Menu entête' ,
            'menu_footer'  => 'Menu pied de page',
        ) );
    }
    add_action( 'after_setup_theme', 'enregistrement_des_menus', 0 );

/**
 * Modifie la requête principale de Wordpress avant qu'elle soit exécuté
 * le hook « pre_get_posts » se manifeste juste avant d'exécuter la requête principal
 * Dépendant de la condition initiale on peut filtrer un type particulier de requête
 * Dans ce cas ci nous filtrons la requête de la page d'accueil
 * @param WP_query  $query la requête principal de WP
*/
    function cidweb_modifie_requete_principal( $query ) {
        if ( $query->is_home() // si page d'accueil
            && $query->is_main_query()// si requête principale
            && ! is_admin() ) { // non tableau de bord
            $query->set( 'category_name', 'note-wp' ); // filtre les articles de catégorie "note-wp"
            $query->set( 'orderby', 'title' ); // trie selon le titre
            $query->set( 'order', 'ASC' ); // ordre ascendant
        }
    }

    add_action( 'pre_get_posts', 'cidweb_modifie_requete_principal' ); // = event listener
    // pre_get_posts - permet de faire les dernières modifications dans la requête avant d l’exécuter
    
/***************************************************************************** */    
     
    /**
    * Permet de modifier les titres du menu "cours"
    * @param $title : titre du choix menu
    * @param $item : le choix global
    * @param $args: Object qui représente la structure de menu
    * */
function perso_menu_item_title($title, $item, $args) {
        
        // Remplacer 'nom_de_votre_menu' par l'identifiant de votre menu
    if($args->menu == 'cours') {
            // Modifier la longueur du titre en fonction de vos besoins
           // $title = wp_trim_words($title, 3, ' ... ');

        $sigle = substr($title, 4, 3); // a partir de 4 element, on garde juste 3 caractères
        $title = substr($title, 7);
        $title = "<span class='cours__sigle'>" .$sigle. "</span>" .
                "<span class='cours__titre'>". "  " . wp_trim_words($title, 2, ' ... ') . "</span>";          
    }        

    else if($args->menu == 'note-wp') {
        $numero = substr($title, 0, 2); 
        $title = substr($title, 2); 
        
        if(substr($numero, 0, 1) == '0'){ 
            $numero = substr($numero, 1, 1); 
        }
                      
        $title = "<span class='note__numero'>" .$numero. "</span>" . 
                    "<span class='note__titre'>". " - " . substr($title, 1) . "</span>";          
    }
               
    return  $title; // pour séparer le sigle / numero et le texte 
}

add_filter('nav_menu_item_title', 'perso_menu_item_title', 10, 3);   // 3 - nombre des paramètres, 10 - niveau de priorité

/****************************************************************************** */

function ajouter_description_class_menu( $items, $args ) {
    // Vérifier si le menu correspondant est celui que vous souhaitez modifier
    if ( 'evenement' === $args->menu ) {
        foreach ( $items as $item ) {
            // Récupérer le titre, la description et la classe personnalisée
            $titre = $item->title;
            $description = $item->description;   
            // Ajouter la description et la classe personnalisée à l'élément de menu
            $item->title.= '<span>' . " " . $description . '</span>';
        }
    }
    return $items;
}
add_filter( 'wp_nav_menu_objects', 'ajouter_description_class_menu', 10, 2 );


/*******************   Enregistrement de sidebar   **************************** */

// Enregistrer le sidebar
function enregistrer_sidebar() {
    register_sidebar( array(
        'name' => __( 'Pied de page 1', '31w-theme' ), // nom du theme
        'id' => 'pied-page-1',
        'description' => __( 'Une zone widget pour afficher des widgets dans la footer.', '31w-theme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ) );

    register_sidebar( array(
        'name' => __( 'Pied de page 2', '31w-theme' ), // nom du theme
        'id' => 'pied-page-2',
        'description' => __( 'Une zone widget pour afficher des widgets dans la footer.', '31w-theme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ) );

    register_sidebar( array(
        'name' => __( 'Pied de page 3', '31w-theme' ), // nom du theme
        'id' => 'pied-page-3',
        'description' => __( 'Une zone widget pour afficher des widgets dans la footer.', '31w-theme' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ) );
}
add_action( 'widgets_init', 'enregistrer_sidebar' );