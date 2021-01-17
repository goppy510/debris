<?php 
/*
Template Name:thanks-mail
*/
?>

<?php
// クリックジャッキング対策
header('X-FRAME-OPTIONS: SAMEORIGIN');
?>

<?php get_header('index'); ?>
<div class="main-area">
    <div id="thanks">
        <h1>お問い合わせありがとうございました。</h1>
        <p>これはサンクスページのサンプルです。<br />自由に書き換えたりしてご利用ください。</p>
        <p>設置に関してわからない点や不具合などがありましたら、<a href="https://www.1-firststep.com/samplephp/support-bbs/"
                target="_blank">サポートBBS</a>からお願いします。</p>
        <p>無償サポートは初期状態での設置に関する質問だけであり、既存サイトへの組み込みやカスタマイズに関する内容は有料になります。(初期状態の定義については、サポートBBSをご覧ください)</p>
        <p>カスタマイズの料金はご希望の仕様によって異なります。<a href="https://www.1-firststep.com/inquiry"
                target="_blank">お問い合わせページ</a>からご相談ください。</p>
    </div>
</diV><!--main area -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>