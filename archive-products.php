<?php get_header(); ?>
<main>
  <div class="p-page-products__mv">
    <?php get_template_part('/parts/mv') ?>
    <div class="p-page-products__bread">
      <?php get_template_part('/parts/bread') ?>
    </div>
  </div>


  <section class="p-page-products">
    <div class="p-page-products__inner">
      <div class="p-page-products__contents">
        <div class="p-page-products__container">
          <?php
            $query = new WP_Query(array(
              'posts_per_page' => -1,
              'post_type' => 'products',
            ));?>
          <?php
          if($query->have_posts()):
            while($query->have_posts()):
              $query->the_post();?>

              <div class="p-page-products-container__wrap">
                <div  class="p-page-products__content c-menuCard9">
                  <div class="c-menuCard9__img">
                    <img src="<?php the_field('image'); ?>" alt="">
                  </div>
                  <div class="c-menuCard9__body p-page-products-content__body">
                    <p><?php the_field('title'); ?></p>
                    <p><?php the_field('price'); ?> yen</p>
                  </div>
                  <div class="c-menuCard9__button">
                    <a href="<?php echo get_permalink(); ?>">ショップで確認する</a>
                  </div>
                </div>
              </div>
            <?php
            endwhile;
            wp_reset_postdata();
          endif;
          ?>
        </div>
      </div>
    </div>

  </section>
  <section class="p-page-notice">
    <div class="p-page-wrapping">
      <div class="p-page-wrapping__inner">
        <div class="p-page-wrapping__contents">
          <div class="p-page-wrapping__container">
            <div class="p-page-wrapping__body">
              <h3 class="u-hidden-pc">ラッピングは無料でお付けいたします。
              お気軽にご相談ください。</h3>
              <h3 class="u-hidden-sp">ラッピングは無料でお付けいたします。<br />
              お気軽にご相談ください。</h3>
              <p class="is-line"></p>
              <p>テキストがはいります。テキストがはいります。テキストがはいります。テキストがはいります。テキストがはいります。テキストがはいります。テキストがはいります。テキストがはいります。テキストがはいります。</p>
            </div>
            <div class="p-page-wrapping__img">
              <img src="<?php echo get_template_directory_uri(); ?>/img/img_wrapping.webp" alt="wrapping">
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

</main>
<?php get_footer(); ?>