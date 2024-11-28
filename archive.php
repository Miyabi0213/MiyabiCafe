<?php
/*
Template Name: archive
*/
?>
<?php get_header(); ?>
<main>
  <div class="p-page-menu__mv">
    <?php get_template_part('/parts/mv') ?>
    <div class="p-page-menu__bread">
      <?php get_template_part('/parts/bread') ?>
    </div>
  </div>

  <section class="p-page-news l-section">
    <div class="p-page-news__inner l-sidebar">
      <div class="p-page-news__main l-left">
        <div class="p-page-news__contents">
          <?php
          $category = get_queried_object();
          if ($category && !is_wp_error($category)) { ?>
            <div class="p-page-news__cat--name c-section-title3">
              <p><?php echo esc_html($category->name); ?></p>
            </div>
          <?php
          }?>

          <div class="p-page-news__container">
            <div class="p-page-news__cards">
              <?php if(have_posts()): ?>
                <?php while(have_posts()) :?>
                  <?php the_post(); ?>

                  <a href="<?php echo get_permalink(); ?>" class="p-page-news__card c-menuCard6">

                  <div class="c-menuCard6__img">
                    <div class="c-menuCard6__img--img">
                      <?php if(has_post_thumbnail()): ?>
                        <?php the_post_thumbnail(); ?>
                      <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/img/img_news1.webp" alt="coffee">
                      <?php endif; ?>
                    </div>

                    <div class="c-menuCard6__tag">
                    <?php $category = get_the_category(); ?>
                      <?php if (!empty($category) && $category[0]) : ?>
                        <p><?php echo $category[0]->name; ?></p>
                      <?php else : ?>
                        <p></p>
                      <?php endif; ?>
                    </div>
                  </div>
                  <div class="c-menuCard6__body">
                    <?php $cardTitle = get_the_title(); ?>
                    <p class="c-menuCard6__title"><?php echo mb_strimwidth($cardTitle, 0, 80, '...'); ?>
                    </p>
                    <time class="c-menuCard6__date"><?php the_time('Y.m.d'); ?></time>
                  </div>

                  </a>
                <?php
                endwhile;
                wp_reset_postdata();
              endif;?>
            </div>
            <div class="p-page-news__pagenation">
              <?php get_template_part('/parts/paginate_link'); ?>
            </div>

          </div>



        </div><!--contents-->
      </div><!--main-->

      <div class="p-page-news__sidebar l-right">
        <div class="p-page-news__sidebar--right">
          <?php get_sidebar(); ?>

        </div>
      </div>


    </div>
  </section>

</main>
<?php get_footer(); ?>