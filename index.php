<?php get_header('index'); ?>
<div class="main-area">
    <?php
    // inexに表示するコンテンツ数を無制限化
    query_posts('posts_per_page=-1');
    if (have_posts()):
        while (have_posts()):
            the_post();
    ?>
                <div class="post">
                    <?php
                    // 記事内の一番上の画像を取得
                    $img_url = get_thumb_image();
                    $img_size = get_image_width_height($img_url);
                    $img_width = $img_size['width'];
                    $img_height = $img_size['height'];

                    // 画像の縦横を比較して画像サイズ決める
                    // 横長の場合(見開きを想定)
                    if ($img_width > $img_height) {
                        $img_rewidth = 410;
                        $img_reheight = 270;
                    } else {
                        $img_rewidth = 190;
                        $img_reheight = 270;
                    }
                    ?>
                    <a href="<?php the_permalink(); ?>"><img src="<?php echo get_thumb_image(); ?>" width="<?php echo $img_rewidth; ?>" height="<?php echo $img_reheight; ?>" /></a>
                </div><!-- post -->
        <?php endwhile; ?>
    <?php endif; ?>
</div><!-- main-area -->
<?php get_footer(); ?>
<?php get_sidebar(); ?>


