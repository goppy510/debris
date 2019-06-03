<?php

/** フォントの読み込み */
function read_upload_mimes($mimes)
{
    $mymimes = array(
        'otf' => 'applicatino/x-font-otf',
        'woff' => 'application/font-woff',
    );
    return $mymimes;
}

add_filter('upload_mimes', 'read_upload_mimes');

// mailform-v7.1関連ファイルを読み込む
function read_mailform()
{
    $maiform_path = "/mailform-v7.1/css/mailform.css";
    $reset_path = "/mailform-v7.1/css/reset.css";
    $style_path = "/mailform-v7.1/css/style.css";
    $thanks_path = "/mailform-v7.1/css/thanks.css";
    $ajaxzip3_path = "/mailform-v7.1/js/ajaxzip3.js";
    $auto_kana_path = "/mailform-v7.1/js/jquery.autoKana.js";
    wp_enqueue_style('mailform-v7.1', get_template_directory_uri().$maiform_path);
    wp_enqueue_style('mailform-v7.1', get_template_directory_uri().$reset_path);
    wp_enqueue_style('mailform-v7.1', get_template_directory_uri().$style_path);
    wp_enqueue_style('mailform-v7.1', get_template_directory_uri().$thanks_path);
    wp_enqueue_script('mailform-v7.1', get_template_directory_uri().$ajaxzip3_path , array(), '1.0.0', true);
    wp_enqueue_script('mailform-v7.1', get_template_directory_uri().$auto_kana_path , array(), '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'read_mailform');

// jQuery読み込み関数
function read_jquery()
{
    $jquery_path = "/js/jquery-3.4.1.min.js";
    wp_enqueue_script('js', get_template_directory_uri().$jquery_path , array(), '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'read_jquery');

// プラグイン(WP Add Mime Types)
function custom_mime_types( $mimes ) {
    $mimes['jpg'] = 'image/jpeg';
    return $mimes;
  }

add_filter( 'upload_mimes', 'custom_mime_types' );

// サイドバー設定(今回は不要だが無いと余計なのが表示されるため記述)
if (function_exists('register_sidebar'))
    register_sidebar(
        array(
            'id' => 'sidebar-1',
            'before_widget' => '',
            'after_widget' => '',
            'before_title' => '<h2 class="widget_title">',
            'after_title' => '</h2>',
        )
    );

// 記事内の最初の画像をアイキャッチ画像にするための関数
function get_thumb_image($size)
{
    global $post;
    $img = '';
    $get_image = preg_match_all('/<img.+class=[\'"].*wp-image-([0-9]+).*[\'"].*>/i', $post->post_content, $matches);
    $img_id = $matches[1][0];
    $img = wp_get_attachment_image($img_id, $size, false, array(
        'class' => 'thumbnail-image',
        'srcset' => wp_get_attachment_image_srcset($img_id, $size),
        'sizes' => wp_get_attachment_image_sizes($img_id, $size)
        )
    );
    return $img;
}

?>