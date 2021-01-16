<?php
    $path = get_template_directory_uri().'/img/';
    $images = array('top_side.png', 'about_side.png', 'work_side.png', 'contact_side.png');
    $links = array('top', 'about', 'work.', 'contact');
?>
<div class="side-area">
    <div class="side-line">
        <div class="side-nav">
            <ul>
                <?php
                    for($i=0; $i<count($images); ++$i) {
                ?>
                        <li>
                            <a href="<?php echo $links[$i] ?>"><?php image64($images[$i], $path) ?></a>
                        </li>
                <?php
                    }
                ?>
            </ul>
        </div><!-- end of #side-nav -->
    </div>
</div>

<script>
function() {
    // 縦線には文字の中央が重なるようにするためメニューの文字数からスライドするpxを計算する
    let txt = $(this).text();
    let textwidth = textWidth(txt);
    console.log(textWidth);
    menuLength = $(this).text().length;

    let width = 120;
    let fontSize = 15;
    let letterSpacing = 1.0;
    let borderWidth = 0.5;
    let padding = 10;
    let letterPx = menuLength * (fontSize + letterSpacing);
    var slidePx = null;
    if (menuLength%2==1) {
        slidePx = width-(width-letterPx)+letterPx/2 + padding + borderWidth;
    } else {
        slidePx = letterPx/2  - (fontSize+letterSpacing)/2;
    }
    $(this).stop(true, true).animate({right: 25}, 300);
}
);
$('#side-nav .menu li a').mouseleave(
function() {
    menuLength = null;
    $(this).stop(true, true).animate({right: 0}, 300);
}
);
});
</script>
