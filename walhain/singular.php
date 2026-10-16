<?php
if (! defined('ABSPATH')) {
    exit;
}
get_header();
?>
<?php get_template_part('template-parts/section', 'header'); ?>
<main>
    <?php
        while (have_posts()) :
            the_post();
            the_content();
        endwhile;
?>
</main>
<?php get_template_part('template-parts/section', 'footer'); ?>
<?php get_footer(); ?>
