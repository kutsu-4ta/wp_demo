<?php
/**
 * @package test
 * @author Yamashita <yamashita.antapp@gmail.com>
 * @subpackage test
 * @since test 1.0
 */


get_header(); ?>

<main>
    <p>page.phpテンプレートを利用しています。</p>

    <?php if(have_posts()): while(have_posts()):the_post(); ?>

        <h1 class="entry-title"><?php the_title(); ?></h1>
        <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y:m:d'); ?></time>
        <p><?php the_content(); ?></p>

        <?php endwhile; endif; ?>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>