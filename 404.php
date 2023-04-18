<?php 
/**
    Modèle index.php représente le modèle par défaut du thème
*/ 
?>
<?php get_header()?> 
<main class = "site__404">

    <section class="err-message">
        <h1>Erreur 404</h1>
        <h2>Page introuvable, vous pouvez tenter une recherche</h2>
    </section>
    <?php get_template_part('template-parts/custom-recherche'); ?>
    
</main>   
<?php get_footer(); ?>