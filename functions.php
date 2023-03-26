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
            && ! is_admin() ) { // non tableu de bord
            $query->set( 'category_name', 'note-wp' ); // filtre les articles de categorie "note-wp"
            $query->set( 'orderby', 'title' ); // trie selon le titre
            $query->set( 'order', 'ASC' ); // ordre ascendant
        }
    }
     add_action( 'pre_get_posts', 'cidweb_modifie_requete_principal' ); // = event listener
     
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