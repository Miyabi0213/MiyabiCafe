<?php get_header(); ?>
<main>
  <div class="p-single-products__mv">
    <?php get_template_part('/parts/mv') ?>
    <div class="p-single-products__bread">
      <?php get_template_part('/parts/bread') ?>
    </div>
  </div>

  <section class="p-single-products">
    <div class="p-single-products__inner">
      <div class="p-single-products__contents">
        <div class="p-single-products__container">
          <?php if(have_posts()): ?>
            <?php while(have_posts()): ?>
              <?php the_post(); ?>

              <div class="p-page-products-container__wrap">
                <div  class="p-page-products__content c-menuCard8">
                  <div class="c-menuCard8__img">
                    <img src="<?php the_field('image'); ?>" alt="">
                  </div>
                  <div class="c-menuCard8__body">
                    <p><?php the_field('title'); ?></p>
                    <p><?php the_field('price'); ?> yen</p>
                  </div>
                  <div class="c-news-detail__content">
                    <?php the_content(); ?>
                  </div>
                  <div class="c-menuCard8__button p-single-products__button">
                    <!-- <a href="<?php echo get_permalink(); ?>">ショップで確認する</a> -->
                    <a href="/shop">ショップで確認する</a>
                  </div>
                </div>
              </div>


            <?php endwhile; ?>
            <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>