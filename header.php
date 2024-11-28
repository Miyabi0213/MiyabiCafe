<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="robots" content="noindex, nofollow" />
	<link rel="icon" href="<?php echo get_template_directory_uri();  ?>/img/favicon.svg" type="image/svg+xml" />

  <title>Open Cafe</title>
  <meta name="description" content="パスタとコーヒーがとってもおいしい、ほっと落ち着くのんびり空間。">

<!-- OGP基本設定 -->
<meta property="og:title" content="<?php if(is_single() || is_page()) { echo the_title(); } else { bloginfo('name'); } ?>" />

<meta property="og:description" content="<?php if(is_single() || is_page()) { echo strip_tags(get_the_excerpt()); } else { bloginfo('description'); } ?>" />

<meta property="og:image" content="<?php if (has_post_thumbnail()) { echo get_the_post_thumbnail_url(); } else { echo get_template_directory_uri() . '/img/OGP.webp'; } ?>" />

<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:image" content="<?php if (has_post_thumbnail()) { echo get_the_post_thumbnail_url(); } else { echo get_template_directory_uri() . '/img/OGP.webp'; } ?>" />


  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Noto+Sans+JP:wght@100..900&family=Noto+Serif+JP:wght@200..900&family=Yomogi&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Patua+One&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Damion&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@200..900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<?php wp_head(); ?>
</head>
<body>
  <header class="p-header l-header">
    <div class="p-header__inner">
      <?php  $slug = get_post_field('post_name', get_post()); ?>
      <!-- <?php echo $slug; ?> -->
      <!-- <?php var_dump($slug); ?> -->
      <div class="p-header__logo <?php echo $slug ?>">
        <a href="/top" class="c-header__logo">
          <img src="<?php echo get_template_directory_uri();  ?>/img/logo_light.svg" alt="logo" width="128" height="64" decoding="async">
        </a>
      </div>

      <div class="p-drawer-icon  <?php echo $slug ?>" id="js-drawer-icon">
        <div class="c-drawer-icon" >
        <span class="c-drawer-icon--bar"></span>
        <span class="c-drawer-icon--bar"></span>
        <span class="c-drawer-icon--bar"></span>
      </div>
      </div>
    </div>
  </header>


  <div class="p-drawer" id="js-drawer-content">
    <div class="c-drawer-nav">
      <div class="c-drawer-logo">
        <img src="<?php echo get_template_directory_uri();  ?>/img/logo_light.svg" alt="logo" width="128" height="64" decoding="async" >
      </div>
      <div class="c-drawer-menu">
        <?php  get_template_part('/parts/drawer-menu'); ?>
      </div>
      <div class="c-drawer-sns">
        <?php get_template_part('/parts/sns-link2'); ?>
      </div>
    </div>
  </div>
  <div class="backdrop"></div>