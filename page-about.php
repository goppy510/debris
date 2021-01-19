<?php
/*
Template Name:About
*/
?>
<?php get_header(); ?>
<?php
    $path = get_template_directory_uri().'/img/about/';
    $img = 'designer.png';
?>
<body <?php body_class(); ?>>
    <?php get_sidebar(); ?>
    <div class="page-header">
        <div class="about">
            <?php image64($img, $path) ?>
        </div><!-- about -->
    </div><!-- page-header -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
