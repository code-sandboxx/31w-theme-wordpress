<?php
/**
    Modèle category.php permet d'afficher une archive par catégorie d'article
*/
get_header() ?>
   <main class="site__main">     
      <?php 
      $category = get_queried_object();
      if ($category->slug == "cours"){
         echo "<h1 class='titre__site'>Cours</h1>";
      }
      else if($category->slug == "note-wp"){
         echo "<h1 class='titre__site'>Notes Wordpress</h1>";
      }?> 

   <section class="blocflex">
      <?php     
      $category = get_queried_object();
      

      $args = array(
         'category_name' => $category->slug, // récupérer le nom de catégorie
         'orderby' => 'title',
         'order' => 'ASC'
      );
      $query = new WP_Query( $args );
      if ( $query->have_posts() ) :
         while ( $query->have_posts() ) : $query->the_post(); ?>      
            <?php get_template_part("template-parts/categorie", $category->slug); ?>                
         <?php endwhile; ?>
      <?php endif;
      wp_reset_postdata();?>
   </section>
</main>    
<?php get_footer(); ?>