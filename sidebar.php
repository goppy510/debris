<?php
    $path = get_template_directory_uri().'/img/sidemenu/';
    $images = array('top.png', 'about.png', 'work.png', 'contact.png');
    $links = array('top', 'about', 'work', 'contact');
?>
<div class="side-area">
    <div class="side-line">
        <div class="side-nav">
            <ul>
                <?php
                    for($i=0; $i<count($images); ++$i) {
                ?>
                        <li>
                            <a href="<?php echo esc_url(home_url($links[$i])) ?>"><?php image64($images[$i], $path) ?></a>
                        </li>
                <?php
                    }
                ?>
            </ul>
        </div><!-- end of #side-nav -->
    </div>
</div>

<script>
// 画像によって線の上に来る文字を調整する必要がある
// 何番目のliかで値を変える
$('.side-nav li').hover(
    function() {
        let index = $('.side-nav li').index(this);
        // topの場合
        if (index === 0) {
            $(this).stop(false, false).animate({'margin-left': '-35px'}, 300);
        }
        // aboutの場合
        if (index === 1) {
            $(this).stop(false, false).animate({'margin-left': '-47px'}, 300);
        }
        // workの場合
        if (index === 2) {
            $(this).stop(false, false).animate({'margin-left': '-40px'}, 300);
        }
        // contactの場合
        if (index === 3) {
            $(this).stop(false, false).animate({'margin-left': '-58px'}, 300);
        }
    },
    function() {
        $(this).stop(false, false).animate({'margin-left': '0px'}, 300);
    }
);
</script>
