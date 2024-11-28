<section class="p-news-widget ">
  <div class="p-news-side">
    <div class="p-news-side__inner">
      <div class="p-news-side__contents">
        <div class="p-news-side__title c-section-title4">
          <p>最新の記事</p>
        </div>
        <div class="p-news-side__content">
          <?php
          $news_posts_query = new WP_Query(array(
            'posts_per_page' => 5,
            'post_type' => 'post',
            'orderby' => 'date',
            'order' => 'DESC',
          ));?>
          <?php
          if($news_posts_query->have_posts()):
            while($news_posts_query->have_posts()):
              $news_posts_query->the_post();?>

              <a href="<?php echo get_permalink(); ?>"  class="p-news-side__wrap c-menuCard7">
                <div class="c-menuCard7__img">
                  <?php if(has_post_thumbnail()): ?>
                    <?php the_post_thumbnail(); ?>
                  <?php else: ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/img_news1.webp" alt="coffee" width="100" height="100" decoding="async">
                  <?php endif; ?>
                </div>

                <div class="c-menuCard7__body">
                  <?php $cardTitle = get_the_title(); ?>
                  <p class="c-menuCard7__title"><?php echo mb_strimwidth($cardTitle, 0, 58, '...'); ?>
                  </p>
                  <time class="c-menuCard7__date"><?php the_time('Y.m.d'); ?></time>
                </div>
              </a>
            <?php
            endwhile;
            wp_reset_postdata();
          endif;
          ?>
        </div>
      </div>
      <div class="p-news-side__category">
        <div class="p-news-side__category--title c-section-title4">
          <p>カテゴリ</p>
        </div>

        <div class="c-news-side__lists p-news-side__lists">
          <ul>
            <?php
            $categories = get_categories();
            foreach($categories as $category) { ?>
            <li  class="c-news-side__list">
              <?php  echo '<a  class="c-news-side__link" href="' . get_category_link($category->term_id) . '">'  ;  ?>
                <span class="c-news-side__icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="6" height="12" viewBox="0 0 6 12" fill="none">
                  <path d="M4.78773 6.00091L0.131077 0.824286C-0.0436923 0.635918 -0.0436923 0.331047 0.131077 0.141276C0.214499 0.0508806 0.328286 0 0.447021 0C0.565756 0 0.679545 0.0508806 0.762966 0.141276L5.86892 5.65836C6.04369 5.84743 6.04369 6.15301 5.86892 6.34138L0.762966 11.8585C0.588198 12.0475 0.305858 12.0468 0.131077 11.8585C-0.0436923 11.6708 -0.0436923 11.3652 0.131077 11.1755L4.78775 6.00093L4.78773 6.00091Z" fill="black"/>
                </svg>

                </span>
                <span class="c-news-side__linktext"><?php echo $category->name ?></span>
              </a>
            </li>
            <?php } ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
