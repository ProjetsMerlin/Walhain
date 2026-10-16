<?php
if (! defined('ABSPATH')) {
    exit;
}
get_header();
?>
<?php get_template_part('template-parts/section', 'header'); ?>
<main class="page_404">
    <h2>
        <?= __('Error 404', 'walhain') ; ?>
    </h2>
    <p>
        <?= __("Désolé, cette page n'existe pas ou n'a jamais existée", 'walhain') ; ?>
    </p>
    <img src="<?= get_stylesheet_directory_uri() . "/assets/img/404.jpg"; ?>" alt="<?= get_the_title(); ?>"
        title="<?= get_the_title(); ?>" loading="lazy">
</main>
<?php get_template_part('template-parts/section', 'footer'); ?>
<?php get_footer(); ?>
