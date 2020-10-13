<div id="side-area">
    <div id="side-line">
        <div id="side-nav">
            <?php wp_nav_menu(array('theme_location' => 'sidebar_nav')); ?>
        </div><!-- end of #side-nav -->
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#side-nav .menu li a').mouseenter(
            function() {
                $(this).stop(true, true).animate({right: 20}, 300);
            }
        );
        $('#side-nav .menu li a').mouseleave(
            function() {
                $(this).stop(true, true).animate({right: 0}, 300);
            }
        );
    });
</script>
