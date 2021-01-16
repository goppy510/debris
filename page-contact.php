<?php 
/*
Template Name:Contact
*/
?>

<?php
// クリックジャッキング対策
header('X-FRAME-OPTIONS: SAMEORIGIN');
?>

<?php get_header('index'); ?>
<div class="main-area">
    <form action="<?php echo get_template_directory_uri(); ?>/mailform-v7.1/php/mailform.php" method="post" id="mail_form">
        <dl>
            <dt class="mail-font-regular">名前<span class="mail-font-italic"> Your Name</span></dt>
            <dd class="required">
                <input type="text" id="name_1" name="name_1" value="" /> <input type="text" id="name_2"
                    name="name_2" value="" />
            </dd>

            <dt class="mail-font-regular">ふりがな<span class="mail-font-italic"> Name Reading</span></dt>
            <dd><input type="text" id="read_1" name="read_1" value="" /> <input type="text" id="read_2" name="read_2" value="" />
            </dd>

            <dt class="mail-font-regular">メールアドレス<span class="mail-font-italic"> Mail Address</span></dt>
            <dd class="required">
                <input type="email" id="mail_address" name="mail_address" value="" />
            </dd>

            <dt class="mail-font-regular">メールアドレス(確認用)<span class="mail-font-italic"> Mail Address Confirm</span></dt>
            <dd>
                <input type="email" id="mail_address_confirm" name="mail_address_confirm" value="" />
            </dd>

            <dt class="mail-font-regular">お問い合わせの内容<span class="mail-font-italic"> Mail Contents</span></dt>
            <dd class="required">
                <textarea id="mail_contents" name="mail_contents" cols="40" rows="5"></textarea>
            </dd>
        </dl>

        <div class="submit-button">
            <p id="form_submit">
                <input type="button" id="form_submit_button" value="送信する" />
            </p>
        </div>
    </form>
</diV><!--main area -->
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
    var mail_address = document.getElementById("mail_address");
    var mail_address_confirm = document.getElementById("mail_address_confirm");

    // 特定文字以外の入力防止
    document.addEventListener("DOMContentLoaded", function() {
        input_limit(mail_address);
        input_limit(mail_address_confirm);
    });

    // 特定文字以外の入力を無効化する関数
    function input_limit(element) {
        element.addEventListener('input', function() {
            var input_str = element.value;
            while(input_str.match(/[^a-z^A-Z\d.@_-]+$/)) {
                input_str = input_str.replace(/[^a-z^A-Z\d.@_-]+$/,"");
            }
            element.value = input_str;
        });
    }
</script>