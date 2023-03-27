<?php
/**
    Modèle index.php représente le modèle par défaut du thème
*/
get_header() ?>
<main class = "site__main">    
    <h3>single.php</h3>
<?php 

 if (have_posts()):
   while(have_posts()): the_post();
        the_title('<h1>','</h1>'); 
        the_content();  
        if(in_category('cours')){
            $ma_categorie = "cours";
            get_template_part("template-parts/single", $ma_categorie); // verifier categorie,  get template part
        }
        else if (in_category('note-wp')){
            $ma_categorie = "note-wp";
            get_template_part("template-parts/categorie", $ma_categorie);
        }         
    endwhile;  
endif; 
?>   
</main> 
<?php get_footer(); ?>