<aside class="site__aside">
    
        <h3>Menu secondaire</h3>
        <?php        

        $lemenu = "note-wp";
        if(in_category('cours')){
            $lemenu = "cours";
        }
        
        wp_nav_menu(array(
            "menu" => $lemenu, // permet de récupérer la catégorie de la page par défaut
            "container" => "nav"
        )); ?>
</aside>