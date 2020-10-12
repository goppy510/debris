<div id="side-nav">
    <?php wp_nav_menu(array('theme_location' => 'sidebar_nav')); ?>
</div><!-- end of #side-nav -->

<script>
    $(document).ready(function() {
        $('#side-nav .menu li a').mouseenter(
            function() {
                $(this).stop(false, false).animate({right: 10}, 300);
            }
        );
        $('#side-nav .menu li a').mouseleave(
            function() {
                $(this).stop(false, true).animate({right: 0}, 300);
            }
        );
    });
</script>