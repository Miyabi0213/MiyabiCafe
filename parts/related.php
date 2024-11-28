<?php
// $current_post_id = get_the_ID();
// $categories = wp_get_post_categories($current_post_id);
// $tags = wp_get_post_tags($current_post_id);

$current_post_id = get_query_var('related_post_id');
$categories = get_query_var('related_categories');
$tags = get_query_var('related_tags');
$tag_ids = array();

$tag_ids = array();
foreach ($tags as $individual_tag) {
    $tag_ids[] = $individual_tag->term_id;
}

// タグとカテゴリ両方に基づいて関連記事を取得
$related_posts = new WP_Query(array(
    'posts_per_page' => 6,                      // 最大6記事を取得
    'orderby' => 'date',                        // 日付順に並べる
    'order' => 'DESC',
    'tax_query' => array(
        'relation' => 'OR',
        array(
            'taxonomy' => 'post_tag',
            'field' => 'term_id',    'post__not_in' => array($current_post_id),  // 現在の記事を除外

            'terms' => $tag_ids,
        ),
        array(
            'taxonomy' => 'category',
            'field' => 'term_id',
            'terms' => $categories,
        ),
    ),
));

?>
<div class="p-related__cards"><?php
if ($related_posts->have_posts()) :
    while ($related_posts->have_posts()) : $related_posts->the_post();
      ?>
      <a href="<?php echo get_permalink(); ?>" class="p-related__card c-menuCard10">

        <div class="c-menuCard10__img">
          <div class="c-menuCard10__img--img">
            <?php if(has_post_thumbnail()): ?>
              <?php the_post_thumbnail(); ?>
            <?php else: ?>
              <img src="<?php echo get_template_directory_uri(); ?>/img/img_news1.webp" alt="coffee">
            <?php endif; ?>
          </div>
          <div class="c-menuCard10__tag">
          <?php $category = get_the_category(); ?>
            <?php if (!empty($category) && $category[0]) : ?>
              <p><?php echo $category[0]->name; ?></p>
            <?php else : ?>
              <p></p>
            <?php endif; ?>
          </div>
        </div>
        <div class="c-menuCard10__body">
          <?php $cardTitle = get_the_title(); ?>
          <p class="c-menuCard10__title"><?php echo mb_strimwidth($cardTitle, 0, 54, '...'); ?>
          </p>
          <time class="c-menuCard10__date"><?php the_time('Y.m.d'); ?></time>
        </div>

        </a>
      <?php
    endwhile; ?>
</div><?php

    wp_reset_postdata();
endif;

?>