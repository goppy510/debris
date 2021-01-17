<?php 
/*
Template Name:Contact
*/
?>

<?php
    // クリックジャッキング対策
    header('X-FRAME-OPTIONS: SAMEORIGIN');
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
        <form action="<?php echo get_template_directory_uri(); ?>/mailform-v7.1/php/mailform.php" method="post" id="mail_form">
            <dl>
                <!-- 名前 -->
                <div>
                    <dt class="contact-name">
                        Name
                    </dt>
                    <dd class="required">
                        <input type="text" id="name_1" name="name_1" value="" />
                    </dd>
                </div>
                <!-- メールアドレス -->
                <div>
                    <dt class="contact-email">
                        Email
                    </dt>
                    <dd class="required">
                        <input type="email" id="mail_address" name="mail_address" value="" />
                    </dd>
                </div>
                <!-- 件名 -->
                <div>
                    <dt class="contact-subject">
                        Subject
                    </dt>
                    <dd class="required">
                        <input type="text" id="subject" name="subject" value="" />
                    </dd>
                </div>
                <!-- 本文 -->
                <div class="message">
                    <div class="required">
                        <textarea id="mail_contents" name="mail_contents" cols="40" rows="5"></textarea>
                    </div>
                </div>
                <div class="submit-button">
                    <p id="form_submit">
                        <input type="button" id="form_submit_button" value="Submit" />
                    </p>
                </div>
            </dl>
        </form>
    </div><!-- page-header -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>



<script src="<?php echo get_template_directory_uri(); ?>/mailform-v7.1/js/mailform-js.php"></script>


<!-- フリガナ自動入力ライブラリここから -->
<script type="text/javascript">
    $(function() {
        $.fn.autoKana( '#name_1', '#read_1', {
            katakana: false
        });
        $.fn.autoKana( '#name_2', '#read_2', {
            katakana: false
        });
    });
</script>

<script>
    // 特定文字以外の入力防止
    document.addEventListener("DOMContentLoaded", function() {
        var mail_address = document.getElementById("mail_address");
        // 特定文字以外の入力を無効化する関数
        mail_address.addEventListener('input', function() {
            var input_str = mail_address.value;
            while(input_str.match(/[^a-z^A-Z\d.@_-]+$/)) {
                input_str = input_str.replace(/[^a-z^A-Z\d.@_-]+$/,"");
            }
            mail_address.value = input_str;
        });
    });
</script>
