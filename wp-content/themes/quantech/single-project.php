<?php
/**
 * The page template file
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package quantech
 */

get_header();
?>
    <?php
        while ( have_posts() ) : the_post();

            the_content();

        endwhile; 
    ?>

<?php
get_footer();
