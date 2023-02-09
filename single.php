<?php 
/**
    Modele index.php represente le modele par defaut du theme
*/ 
?>
<?php get_header()?> 
<main>
    <h3>index.php</h3>
    <?php 
        if (have_posts()):
            while (have_posts()) : the_post();
            the_title('<h1>','</h1>');
            the_permalink();?>

            <h1><a href="<?php the_permalink();?>"><?= get_the_title()?></a></h1>
            //the_content();
            //the_excerpt();
            <?php echo wp_trim_words(get_the_excerpt(), 4); // contenu, nombre de caracteres, lien
             endwhile;
        endif;
    ?> 
</main>   
<?php get_footer(); ?>