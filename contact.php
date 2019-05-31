<?php 
/*
Template Name:Contact
*/
?>

<?php get_header('index'); ?>
<div class="main-area">
    <form action="mailform-v7.1/php/mailform.php" method="post" id="mail_form">
        <dl>
            <dt class="mail-font-regular">名前<span class="mail-font-italic"> Your Name</span></dt>
            <dd class="required">
                <input type="text" id="name_1" name="name_1" value="" /> <input type="text" id="name_2"
                    name="name_2" value="" />
            </dd>

            <dt class="mail-font-regular">ふりがな<span class="mail-font-italic"> Name Reading</span></dt>
            <dd><input type="text" id="read_1" name="read_1" value="" /> <input type="text" id="read_2" name="read_2"
                    value="" />
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


    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/mailform-v7.1/js/mailform-js.php"></script>


    <!-- フリガナ自動入力ライブラリここから -->
    <script src="<?php echo get_template_directory_uri(); ?>/mailform-v7.1/js/jquery.autoKana.js"></script>
    <script>
        $(function () {
            $(this).autoKana('#name_1', '#read_1', {
                katakana: false
            });
            $(this).autoKana('#name_2', '#read_2', {
                katakana: false
            });
        });
    </script>
    <!-- フリガナ自動入力ライブラリここまで -->


    <!-- 住所自動入力ライブラリここから -->
    <script src="<?php echo get_template_directory_uri(); ?>/mailform-v7.1/js/ajaxzip3.js"></script>
    <!-- 住所自動入力ライブラリここまで -->
