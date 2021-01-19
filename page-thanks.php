<?php 
/*
Template Name:Thanks
*/
?>

<?php
    // クリックジャッキング対策
    header('X-FRAME-OPTIONS: SAMEORIGIN');
    $path = get_template_directory_uri().'/img/contact/';
    $img = 'thanks.png';
?>

<?php get_header(); ?>
<body <?php body_class(); ?>>
    <?php get_sidebar(); ?>
    <div class="page-header">
        <div class="thanks">
            <?php image64($img, $path); ?>
        </div>
    </div><!-- page-header -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
