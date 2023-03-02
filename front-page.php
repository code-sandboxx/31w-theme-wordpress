<?php
/**
    Modèle index.php représente le modèle par défaut du thème
*/
get_header() ?>
<main class="site__main">
    <code>front-page.php</code>
    <h3>front-page.php</h3>
    <section class="blocflex">            
        <?php 
        if (have_posts()):
            while (have_posts()) : the_post();   
            if(in_category('galerie')){
                get_template_part("template-parts/categorie", "galerie");
            }       
            else{
                get_template_part("template-parts/categorie", "note-wp");
            }     
        ?>
            <?php endwhile;?>
        <?php endif; ?> 
    </section>
  
</main> 
<?php get_footer(); ?>