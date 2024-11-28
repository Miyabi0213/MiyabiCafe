<?php get_header(); ?>
<main>
  <div class="p-single__mv">
    <?php get_template_part('/parts/mv') ?>
    <div class="p-single__bread">
      <?php get_template_part('/parts/bread') ?>
    </div>
  </div>

  <article class="p-single">
    <div class="p-single__inner">
      <div class="p-single__contents">
        <div class="p-news-detail">
          <?php if(have_posts()): ?>
            <?php while(have_posts()) :?>
              <?php the_post(); ?>
              <div class="p-news-detail__contents">
                <div class="c-news-detail__body">
                  <div class="c-news-detail__img">
                    <?php if(has_post_thumbnail()): ?>
                      <?php the_post_thumbnail(); ?>
                    <?php else: ?>
                      <img src="<?php echo get_template_directory_uri();  ?>/img/img_mainvisual1.webp" alt="news" width="120" height="90" decoding="async">
                    <?php endif; ?>
                  </div>
                  <div class="c-news-detail__title">
                    <!-- <?php $cardTitle=get_the_title(); ?>
                    <h2><?php echo mb_strimwidth($cardTitle, 0, 30, '...'); ?></h2> -->
                    <h2><?php the_title(); ?></h2>
                  </div>
                  <div class="c-news-detail__meta">
                    <time class="c-news-detail__tag--date"><?php the_time('Y.m.d'); ?></time>
                    <p class="c-news-detail__tag--line"></p>
                    <?php $category = get_the_category(); ?>
                    <?php if($category[0]): ?>
                      <span class="c-news-detail__tag--tag"><?php echo $category[0]->name; ?></span>
                    <?php endif; ?>
                  </div>

                  <div class="c-news-detail__content">
                    <?php the_content(); ?>
                    <!-- <?php get_template_part('/parts/paginate-wp-link'); ?> -->
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
          <?php endif; ?>
          <?php get_template_part('/parts/post-navigation'); ?>
          <div class="p-single__button">
            <a href="/news" >記事一覧</a>
          </div>
        </div>
      </div>

    </div>
  </article>


  <div class="p-related">
    <div class="p-related__inner">
      <div class="p-related__title">
        <p>関連記事</p>
      </div>
      <div class="p-related__contents">

        <?php
        $current_post_id = get_the_ID();
        $categories = wp_get_post_categories($current_post_id);
        $tags = wp_get_post_tags($current_post_id);

        // 変数をセット
        set_query_var('related_post_id', $current_post_id);
        set_query_var('related_categories', $categories);
        set_query_var('related_tags', $tags);

        get_template_part(('/parts/related')); ?>
      </div>
    </div>
  </div>

</main>
<?php get_footer(); ?>