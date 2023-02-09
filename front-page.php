<?php 
/**
    Modele index.php represente le modele par defaut du theme
*/ 
?>
<?php get_header()?> 
<main>
    <code>front-page.php</code>
    <h3>index.php</h3>
    <?php 
        if (have_posts()):
            while (have_posts()) : the_post();
            the_title('<h1>','</h1>');
            //the_content();
            //the_excerpt();
            echo wp_trim_words(get_the_excerpt(), 4); // contenu, nombre de caracteres, lien
        endwhile;
        endif;
    ?> 
</main>   
<?php get_footer(); ?>