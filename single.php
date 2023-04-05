<?php
/**
    Modèle index.php représente le modèle par défaut du thème
*/
get_header() ?>
<main class = "site__main">   
    <code>single.php</code>
<?php 
if (have_posts()):
   while(have_posts()): the_post();
        the_title('<h1>','</h1>'); // verifier categorie,  get temaplate part
        the_content();  
    endwhile;    
endif;
?>   
</main> 
<?php get_footer(); ?>