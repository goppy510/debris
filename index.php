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
                    $img_url = get_thumb_image(array(200, 300));
                    ?>
                    <a href="<?php the_permalink(); ?>"><?php echo $img_url; ?></a>
                </div><!-- post -->
        <?php endwhile; ?>
    <?php endif; ?>
</div><!-- main-area -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>

