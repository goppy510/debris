<?php get_header('index'); ?>

<div class="main-grid">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <?php
    if (have_posts()):
        while (have_posts()):
            the_post();
    ?>
        <div class="row single-title">
            <?php the_title(); ?>
        </div><!-- row -->
        <div class="row">
            <?php the_content(); ?>
        </div>
        <?php endwhile; ?>
    <?php endif; ?>
</div><!-- image-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>