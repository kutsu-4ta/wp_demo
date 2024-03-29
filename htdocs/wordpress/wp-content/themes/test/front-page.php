 <!-- トップページ -->
 <?php get_header(); ?>

 <div id='content' class="w_1000" class="container">

     <div class="row">
         <div class="col-1"></div>
         <div class="col-10">
             <section class="sec_news">
                 <div class="sec_head">新着情報</div>
                 <?php
                    // クエリパラメータとしてプロパティを指定
                    $args = array(
                        'post_type' => 'news',
                        'posts_per_page' => 5,
                        'page' => $paged
                    );
                    // WP_Queryオブジェクトとして取得できる
                    $the_query = new WP_Query($args);
                    if ($the_query->have_posts()) :
                    ?>
                     <ul class="sentense-list">
                         <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                             <li>
                                 <span>
                                     <div class="date"><?php echo (get_the_date()); ?></div>
                                     <div class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                                 </span>
                             </li>
                         <?php endwhile ?>
                     </ul>
                     <?php wp_reset_postdata(); ?>
                 <?php else : ?>
                 <?php endif; ?>
                 <div class="container">
                     <div class="row justify-content-md-center">
                         <button>
                             <div class="to_list"><a href="<?php bloginfo('url'); ?>/news">新着情報</a></div>
                         </button>
                     </div>
                 </div>
             </section>
         </div>
         <div class="col-1"></div>
     </div>


     <div class="row">
         <div class="col-1"></div>
         <div class="col-10">
             <div class="sec_head">最近の投稿</div>
         </div>
         <div class="col-1"></div>
     </div>
     <div class="row">
         <div class="col-1"></div>
         <div class="col-10">
             <div class="row justify-content-md-center grid-list">
                 <!-- 記事をループで表示 -->
                 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                         <div class="col-3 grid-list-item">
                             <a href="<?php the_permalink(); ?>">
                                 <!-- サムネイルの有無 -->
                                 <?php if (has_post_thumbnail()) { ?>
                                     <?php the_post_thumbnail('medium'); ?>
                                 <?php } else { ?>
                                     <img class="grid-list-image" src="<?php echo (get_template_directory_uri('template_url') . "/images/noImage.png") ?>">
                                 <?php } ?>
                                 <!-- 一覧中の一つのアイテム -->
                                 <div class="title"><?php the_title(); ?></div>
                                 <div class="description"><?php the_excerpt(); ?></div>
                             </a>
                         </div>
                     <?php endwhile ?>
             </div>
         </div>
         <div class="col-1"></div>
     </div>
 <?php endif ?>
 <?php get_footer(); ?>