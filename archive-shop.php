<?php get_header(); ?>
<main>
  <div class="p-page-concept__mv">
    <?php get_template_part('/parts/mv') ?>
    <div class="p-page-concept__bread">
      <?php get_template_part('/parts/bread') ?>
    </div>
  </div>
  <section class="p-page-access l-section">
    <div class="p-page-access__inner">
      <div class="p-page-access__container">

        <?php
          $query = new WP_Query(array(
            'posts_per_page' => -1,
            'post_type' => 'shop',
          ));?>
        <?php
        if($query->have_posts()):
          while($query->have_posts()):
            $query->the_post();?>

            <div class="p-page-access_content">
              <div class="p-page-access__title c-section-title1">
                <p><?php echo get_the_title(); ?></p>
              </div>
              <div class="p-page-access__map">
                <div class="c-map">
                  <!-- <?php echo the_field('map'); ?> -->
                  <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6479.874789474148!2d139.57496524367977!3d35.70315819032039!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6018ef1dccdcd9a9%3A0x26e4aeab41bba61f!2z5oy96IKJ44Go57GzIOWQieelpeWvuuW6lw!5e0!3m2!1sja!2sjp!4v1731197638808!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
                  <iframe src="<?php echo the_field('map'); ?>" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
              </div>

              <div class="p-page-access__data c-access__lists">
                <dl>
                  <div class="c-access__list">
                    <dt>住所</dt>
                    <?php
                    $address = get_field('address');
                    $add = preg_split('/\r\n|\r|\n/', $address);?>

                    <dd><?php echo $add[0]; ?><br />
                      <?php echo $add[1]; ?></dd>
                  </div>
                  <div class="c-access__list">
                    <dt>TEL</dt>
                    <dd><?php echo the_field('tel'); ?></dd>
                  </div>
                  <div class="c-access__list">
                    <dt>Mail</dt>
                    <dd><?php echo the_field('email'); ?></dd>
                  </div>
                </dl>
                <dl>
                  <div class="c-access__list">
                    <dt>営業時間</dt>
                    <?php
                    $open = get_field('time');
                    $time = explode('※', string: $open);

                    // $time = preg_split('/\r\n|\r|\n/', $open);?>
                    <dd class="is-number"><?php echo $time[0]; ?><br />
                    ※<?php echo $time[1]; ?></dd>
                  </div>
                  <div class="c-access__list">
                    <dt>定休日</dt>
                    <dd><?php echo the_field('holiday'); ?></dd>
                  </div>
                  <div class="c-access__list">
                    <dt>座席</dt>
                    <dd><?php echo the_field('count'); ?></dd>
                  </div>
                </dl>
              </div>
            </div>
          <?php
          endwhile;
          wp_reset_postdata();
        endif;
        ?>

      </div>
    </div>
  </section>




</main>
<?php get_footer(); ?>