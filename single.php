<?php get_header('index'); ?>

<div class="main-area">
    <div class="single-img">
    <?php
    if (have_posts()):
        while (have_posts()):
            the_post();
            // 投稿の画像を配列で取得
            $img_urls = get_post_image();
        ?>
            <?php
            foreach ($img_urls as $img_url) {
                $img_size = get_image_width_height($img_url);
                $img_width = $img_size['width'];
                $img_height = $img_size['height'];
                if ($img_width > $img_height) {
                    $img_rewidth = 410;
                    $img_reheight = 270;
                } else {
                    $img_rewidth = 190;
                    $img_reheight = 270;
                }
            ?>
                <img src="<?php echo $img_url; ?>" width="<?php echo $img_rewidth; ?>" height="<?php echo $img_reheight; ?>"/></br>
            <?php
            }
            ?>
        <?php endwhile; ?>
    <?php endif; ?>
    </div><!-- single-img -->
    <div class="single-content">
    <?php
    if (have_posts()):
        while (have_posts()):
            the_post();
    ?>
            <?php
                // 画像情報を除去し、特定タグだげ残して本文を抽出
                $content = strip_tags(apply_filters('the_content', $post->post_content), '<br><p><span>');
            ?>
            <div class="post-text">
            <div class="title">
                <?php echo the_title(); ?>
            </div>
            <div class="text">
                <?php echo $content; ?>
            </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
    </div><!-- single-content -->
</div><!-- image-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>