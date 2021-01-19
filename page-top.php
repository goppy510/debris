<?php 
/*
Template Name:TOP
*/
?>
<?php get_header(); ?>
<body <?php body_class(); ?>>
    <?php get_sidebar(); ?>
    <div class="page-header">
        <a href="<?php echo esc_url(home_url( '/' )); ?>">
            <!-- ヘッダー画像が設定されている場合 -->
            <?php if ( get_header_image() ) : ?>
                <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
            <!-- ヘッダー画像が設定されていない場合 -->
            <?php else: ?>
                <img src="<?php echo get_template_directory_uri(); ?>/img/header/header_logo.png">
            <?php endif; ?>
        </a>
    </div><!-- page-header -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
