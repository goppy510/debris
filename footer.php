    </body>
    <footer class="page-footer">
        <p class="copyright"><small>©2019 Takanashi Design</small></p>
        <p id="page-top"><a href="#wrap">PAGE TOP</a></p>
    </footer>
    <?php wp_footer(); ?> 
    <script>
    /* top-pageに戻る処理 */
    $(function() {
        var topBtn = $('#page-top');
        topBtn.hide();
    
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                topBtn.fadeIn();
            } else {
                topBtn.fadeOut();
            }
        });
        /* スクロールしてトップ */
        topBtn.click(function () {
            $('body,html').animate({
            scrollTop: 0
            }, 300);
            return false;
        });
    });
    </script>
</html>