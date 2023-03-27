<?php
/*
* template-part qui permettra d'afficher les champs personnalisées de catégorie cours
*/

?>
    <div class="acf">
        <p class="champ__enseignant"><?php the_field('enseignant'); // normal si soulignée - la fonction se trouve pas dans notre WP ?> </p> 
        <p class="champ__domaine"><?php the_field('domaine'); ?></p>
    </div>    
