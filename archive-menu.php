<?php get_header(); ?>
<main>
  <div class="p-page-menu__mv">
    <?php get_template_part('/parts/mv') ?>
    <div class="p-page-menu__bread">
      <?php get_template_part('/parts/bread') ?>
    </div>
  </div>

  <!-- button section -->
   <?php
  if( is_post_type_archive()){
    $post_type = get_post_type();
    $post_type_object = get_queried_object();
    $slug = $post_type_object->rewrite['slug'];
    $name = post_type_archive_title('', false);
  }else{
    return;
  }
  ?>

  <div class="p-page-menu__buttons">
    <?php  // ジャンルの一覧を取得
    $genres = get_terms(array(
        'taxonomy' => 'genre',
        'hide_empty' => false,
    ));

    if (!empty($genres) && !is_wp_error($genres)) :
      foreach ($genres as $genre) : ?>
      <?php
      if($genre->slug == "breadsweets"){
        $menu_title = explode('＆', string: $genre->name);
        echo '<a href="' . esc_url(get_term_link($genre)) . '" class="p-page-menu__button c-button-type21"><span>' . esc_html($menu_title[0]) . '＆<br />' . esc_html($menu_title[1]) .'</span></a>';
      }else{
        echo '<a href="' . esc_url(get_term_link($genre)) . '" class="p-page-menu__button c-button-type21"><span>' . esc_html($genre->name) . '</span></a>';
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
        $query = new WP_Query(array(
          'post_type' => 'menu',
          'posts_per_page' => -1,
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


  <!-- menu section -->
</main>
<?php get_footer(); ?>