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
    $headerPath = get_template_directory_uri().'/img/header/';
    $headerImg = 'header_logo.png';
?>

<?php get_header(); ?>
<body <?php body_class(); ?>>
    <?php get_sidebar(); ?>
    <div class="mini-header">
        <?php image64($headerImg, $headerPath) ?>
    </div>
    <div class="page-header">
        <div class="links">
            <ul>
                <?php
                // グローバルメニューを表示する(固定ページを管理画面から作ってあること必須)
                $main_menu = wp_get_nav_menu_items('menu', array());
                foreach ($main_menu as $menu) {
                    if ($menu->title != 'thanks-mail') {
                        $icon = wp_get_attachment_image_src($menu->icon, 'full');
                        $alt = get_post_meta($menu->icon, '_wp_attachment_image_alt', true);
                        echo '<li><a href="'.$menu->url.'"><img src="'.$icon[0].'" alt="'.$alt.'">'.$menu->title.'</a></li>';
                    }
                }
                ?>
            </ul>
        </div><!-- links -->
        <div class="thanks">
            <?php image64($img, $path); ?>
        </div>
    </div><!-- page-header -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
