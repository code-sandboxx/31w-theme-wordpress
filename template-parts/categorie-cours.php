<?php
/*
* template-part qui permettra d'afficher un article provenant d'un conteneur de *classe blocflex 
*pour un article de catégorie cours
*/
$titre = get_the_title();
$sigle = substr($titre, 0, 7);
$titre_long = substr($titre, 7, -5);
$duree = substr($titre, -4, 3); // a compléter
?>
<article class = "blocflex__article">
    <h5><a href="<?php the_permalink(); ?>"> <?= $sigle; ?></a></h5>   
    <p><?= wp_trim_words(get_the_excerpt(), 15) ?></p>
    <div class="acf">
        <p class="champ__enseignant"><?php the_field('enseignant'); // normal si soulignée - la fonction se trouve pas dans notre WP ?> </p> 
        <p class="champ__domaine"><?php the_field('domaine'); ?></p>
    </div>    
    <p class="duree"><?= $duree; ?></p>
</article>