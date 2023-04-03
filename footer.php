<?php
/**
 * Template footer.php
 */
?>
<footer class = "site__footer">
<section class="footer__widget">
    <div><?php dynamic_sidebar('pied-page-1'); ?></div>
    <div><?php dynamic_sidebar('pied-page-2'); ?></div>
    <div><?php dynamic_sidebar('pied-page-3'); ?></div>
</section>

<section class="footer__lien">
    <div><?php wp_nav_menu(array('menu'=>'lien-externe-1')); ?></div>
    <div><?php  ?></div>
    <div><?php  ?></div>
</section>

<h2>Copyright &#169 2023 | Thème Wordpress 31-W | Tous droits réservés</h2>

</footer>
<?php wp_footer(); ?> 
</body>
</html>