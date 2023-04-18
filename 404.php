<?php 
/**
    Modèle index.php représente le modèle par défaut du thème
*/ 
?>
<?php get_header()?> 
<main class="site__404">
    <section class="err-message">
        <h1>Erreur 404</h1>
        <h2>Page introuvable, vous pouvez tenter une recherche</h2>
    </section>
    <?php get_template_part('template-parts/custom-recherche'); ?>

    <section class="conteneur_choix">

        <h3>Les notes de cours</h3>

        <?php
        $menu_note_wp = wp_get_nav_menu_items('note-wp');
        foreach ($menu_note_wp as $menu_item) {
            $title = perso_menu_item_title($menu_item->title, $menu_item, (object) array('menu' => 'note-wp'));
            echo '<span class="menu-item"><a href="' . $menu_item->url . '">' . $title . '</a></span>';
        }
        ?>  

   
        <h3>Nos choix de cours</h3>
        
        <?php
        $menu_cours = wp_get_nav_menu_items('cours');
        foreach ($menu_cours as $menu_item) {
            $title = perso_menu_item_title($menu_item->title, $menu_item, (object) array('menu' => 'cours'));
            echo '<span class="menu-item"><a href="' . $menu_item->url . '">' . $title . '</a><span>';
        }
        ?>
    </section>

</main>   
<?php get_footer(); ?>
