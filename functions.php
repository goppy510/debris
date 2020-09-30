<?php

// warning非表示
error_reporting(0);

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

// jQuery読み込み関数
function read_jquery()
{
    $jquery_path = "/js/jquery-3.4.1.min.js";
    wp_enqueue_script('js', get_template_directory_uri().$jquery_path , array(), '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'read_jquery');

/**
* mailform-v7.1関連ファイルを読み込む
*/
function read_mailform()
{
    $maiform_path = "/mailform-v7.1/css/mailform.css";
    $reset_path = "/mailform-v7.1/css/reset.css";
    $style_path = "/mailform-v7.1/css/style.css";
    $thanks_path = "/mailform-v7.1/css/thanks.css";
    $auto_kana_path = "/mailform-v7.1/js/jquery.autoKana.js";
    $mailform_js = "/mailform-v7.1/js/mailform_js";
    wp_enqueue_style('mailform-v7.1', get_template_directory_uri().$maiform_path);
    wp_enqueue_style('mailform-v7.1', get_template_directory_uri().$reset_path);
    wp_enqueue_style('mailform-v7.1', get_template_directory_uri().$style_path);
    wp_enqueue_style('mailform-v7.1', get_template_directory_uri().$thanks_path);
    wp_enqueue_script('mailform-v7.1', get_template_directory_uri().$auto_kana_path , array(), '1.0.0', true);
    wp_enqueue_script('mailform-v7.1', get_template_directory_uri().$mailform_js , array(), '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'read_mailform');


// プラグイン(WP Add Mime Types)``
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


// 画像のサイズを取得するための関数
function get_image_width_height($img_url)
{
    $result = null;
    $wp_content_dir = WP_CONTENT_DIR;
    $wp_content_url = content_url();
    //URLをローカルパスに置換
    $img_file = str_replace($wp_content_url, $wp_content_dir, $img_url);
    $img_size = getimagesize($img_file);
    if ($img_size) {
        $result = array();
        $result['width'] = $img_size[0];
        $result['height'] = $img_size[1];
        return $result;
    }
    return false;
}


// 記事内の最初の画像をアイキャッチ画像にするための関数
function get_thumb_image()
{
    global $post;
    $img = '';
    ob_start();
    ob_end_clean();
    $get_image = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $img_url = $matches[1][0];
    return $img_url;
}

// 記事内の画像URLを配列で取得するための関数
function get_post_image()
{
    global $post;
    $img = '';
    ob_start();
    ob_end_clean();
    $get_image = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $img_urls = [];
    // 二重配列で投稿画像のURLを取得
    foreach ( $matches as $match => $post_img_url) {
        $img_urls = $post_img_url;
    }
    return $img_urls;
}

// ヘッダ画像のアスペクト比を維持するために幅に対する高さの比率を求める関数
function calc_header_image_rate($image_path) {
    $header_size = getimagesize($image_path);
    $img_width  = null;
    $img_height = null;
    if ($header_size) {
        $img_width  = $header_size[0];
        $img_height = $header_size[1];
    }
    $rate = floor($img_width/$img_height);
    return $rate;
}

// カスタムヘッダー
$header_img_path = get_bloginfo('template_url').'/img/header_logo.png';
$width = 410;
$rate = calc_header_image_rate($header_img_path);

$custom_header = array(
    'random-default' => false,
    'width' => $width,
    'height' => $width/$rate,
    'flex-height' => true,
    'flex-width' => true,
    'default-text-color' => '',
    'header-text' => true,
    'uploads' => true,
    // ヘッダーテキストのデフォルトの色
    'default-text-color' => '000',
    'wp-head-callback' => 'wphead_cb',
    // デフォルト画像へのパス
    'default-image' => $header_img_path,
    'admin-head-callback'    => '',      // 管理画面で、[外観 - カスタマイズ]をプレビューするためのコールバック
    'admin-preview-callback' => '',
);
add_theme_support('custom-header', $custom_header);
