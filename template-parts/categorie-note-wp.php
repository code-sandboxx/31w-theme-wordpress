<?php
/*
* template-part qui permettra d'afficher un article provenant d'un conteneur de *classe blocflex
*pour un article de catégorie note-wp
*/
$titre = get_the_title();
if(substr($titre, 0, 1) == "0"){} // a completer
$sigle = substr($titre, 0, 7);
$titre_long = substr($titre, 7, -5);
$duree = "90h"; // a compléter
?>
<article class="blocflex__article">
    <h5><a href="<?php the_permalink(); ?>"> <?= $sigle; ?></a></h5>   
    <p><?= wp_trim_words(get_the_excerpt(), 15) ?></p>

</article>