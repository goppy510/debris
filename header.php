<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1", shrink-to-fit="no">
    <meta name="robots" content="noindex,nofollow" />
    <title><?php wp_title(' | ', true, 'right'); ?></title>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <script type="text/javascript" src="http://localhost/wordpress/wp-content/themes/debris/js/jquery-3.4.1.min.js?ver=1.0.0" id="js-js"></script>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php get_sidebar(); ?>
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
        <a href="<?php echo esc_url(home_url( '/' )); ?>">
            <!-- ヘッダー画像が設定されている場合 -->
            <?php if ( get_header_image() ) : ?>
                <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
            <!-- ヘッダー画像が設定されていない場合 -->
            <?php else: ?>
                <img src="<?php echo get_template_directory_uri(); ?>/img/header_logo.png">
            <?php endif; ?>
        </a>
    </div><!-- page-header -->
