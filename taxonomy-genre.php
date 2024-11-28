<?php get_header(); ?>
<main>
  <div class="p-page-concept__mv">
    <?php get_template_part('/parts/mv') ?>
    <div class="p-page-concept__bread">
      <?php get_template_part('/parts/bread') ?>
    </div>
  </div>
  <?php
  if ( is_tax() ) {
    $taxonomy = get_queried_object();
    $slug = $taxonomy->slug; // タクソノミーのスラッグ
  }?>
  <div class="p-page-menu__buttons">
    <?php  // ジャンルの一覧を取得
    $genres = get_terms(array(
        'taxonomy' => 'genre',
        'hide_empty' => false,
    ));

    if (!empty($genres) && !is_wp_error($genres)) :
      foreach ($genres as $genre) : ?>
      <?php
      if($genre->slug == $slug){
        $background[0] = "#382620";
      }else{
        $background[0] = "#888";
      }

      if($genre->slug == "breadsweets"){
        $menu_title = explode('＆', $genre->name);

        echo '<a href="' . esc_url(get_term_link($genre)) . '" style="background-color: ' . esc_attr($background[0]) . ';" class="p-page-menu__button c-button-type21"><span>' . esc_html($menu_title[0]) . '＆<br />' . esc_html($menu_title[1]) . '</span></a>';

        // echo '<a href="' . esc_url(get_term_link($genre)) . '" style = ' . $background[0] . 'class="p-tax-menu__button c-button-type21"><span>' . esc_html($menu_title[0]) . '＆<br />' . esc_html($menu_title[1]) .'</span></a>';
      }else{
        echo '<a href="' . esc_url(get_term_link($genre)) . '" style="background-color:' . esc_attr($background[0]) . ';" class="p-page-menu__button c-button-type21"><span>' . esc_html($genre->name) . '</span></a>';
      }
      ?>
      <?php
      endforeach;
    endif;
    ?>
  </div>
  <div class="p-page-menu__contents">
    <div class="p-page-menu__inner l-inner">
      <div class="p-page-menu__container">
        <?php
        $term = get_queried_object();

        $query = new WP_Query(array(
            'post_type' => 'menu',
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'genre',
                    'field'    => 'slug',
                    'terms'    => $term->slug,
                ),
            ),
        ));

        if($query->have_posts()) :
          while($query->have_posts()) : $query->the_post(); ?>
            <?php if(get_field('image') && get_field('title')) : ?>
              <div class="p-page-menu__card c-menuCard5">
                <div class="c-menuCard5__img">
                  <!-- <?php
                  $menu_img = get_field('image');
                  echo $menu_img;
                  ?> -->
                  <img src="<?php the_field('image') ; ?>" alt="menu image">
                </div>
                <div class="c-menuCard5__body">
                  <p><?php the_field('title'); ?></p>
                  <p><?php the_field('price'); ?> yen</p>
                </div>
              </div>
            <?php endif ?>

          <?php
          endwhile;
        wp_reset_postdata();
        else :
            echo '投稿がありません';
        endif;
        ?>


      </div>

    </div>
  </div>

</main>
<?php get_footer(); ?>