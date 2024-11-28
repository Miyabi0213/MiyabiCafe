<?php
function my_setup(){
  add_theme_support("post-thumbnails");
  add_theme_support("automatic-feed-links");
  add_theme_support("title-tag");
  add_theme_support("html5", array("search-form", "comment-form", "comment-list", "gallery", "caption", "style", "script"));
  add_theme_support( 'editor-styles' );
  add_editor_style('css/style-editor.css');
  

  add_theme_support("custom-logo", array(
    "height" => 100,
    "width" => 100,
    "flex-height" => true,
    "flex-width" => true,
  ));
}
add_action("after_setup_theme", "my_setup");



function my_script_init() {
  wp_enqueue_style("font-awesome", "https://use.fontawesome.com/releases/v5.8.2/css/all.css", array(), "5.8.2", "all");
  wp_enqueue_style("my_css", get_template_directory_uri() . "/css/style.css", array(), filemtime(get_theme_file_path('/css/style.css')), "all");

  wp_enqueue_script("swiper", "https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js", array(), null, true);
  // wp_enqueue_script("google-maps", "https://maps.googleapis.com/maps/api/js?key=AIzaSyBFMb-schEOsCsKK9Or9OBHwePWe6Ahd6M&callback=initMap", array(), null, true);
  wp_enqueue_script("jquery-cdn", "https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js", array(), null, true);
  wp_enqueue_script("my_script", get_template_directory_uri() . "/js/script.js", array("jquery"), filemtime(get_theme_file_path('/js/script.js')), true);
  wp_enqueue_script("custom", get_template_directory_uri() . "/js/custom.js", array("jquery"), filemtime(get_theme_file_path('/js/custom.js')), true);
}
add_action("wp_enqueue_scripts", "my_script_init");

function load_google_maps_script() {
  wp_enqueue_script(
      'google-maps-api',
      'https://maps.googleapis.com/maps/api/js?key=AIzaSyBFMb-schEOsCsKK9Or9OBHwePWe6Ahd6M&callback=initMap&callback=initMap',
      array(),
      null,
      true
  );
}
add_action('wp_enqueue_scripts', 'load_google_maps_script');
function my_menu_init() {
  register_nav_menus(
    array(
      'global' => 'ヘッダーメニュー',
      'drawer' => 'ドロワーメニュー',
      'footer' => 'フッターメニュー',
    )
  );
}
add_action('init', 'my_menu_init');

/**
 * アーカイブタイトル書き換え
 */
function my_archive_title($title) {

  if (is_category()) { // カテゴリーアーカイブの場合
    $title = single_cat_title('', false);
  } elseif (is_tag()) { // タグアーカイブの場合
    $title = single_tag_title('', false);
  } elseif (is_post_type_archive()) { // 投稿タイプのアーカイブの場合
    $title = post_type_archive_title('', false);
  } elseif (is_tax()) { // タームアーカイブの場合
    $title = single_term_title('', false);
  } elseif (is_author()) { // 作者アーカイブの場合
    $title = get_the_author();
  } elseif (is_date()) { // 日付アーカイブの場合
    // $title = '';
    // if (get_query_var('year')) {
    //   $title .= get_query_var('year') . '年';
    // }
    // if (get_query_var('monthnum')) {
    //   $title .= get_query_var('monthnum') . '月';
    // }
    // if (get_query_var('day')) {
    //   $title .= get_query_var('day') . '日';
    // }
  }
  return $title;
};
add_filter('get_the_archive_title', 'my_archive_title');

function get_coordinates_from_address($address) {
  // APIキーを入力
  $api_key = 'AIzaSyBFMb-schEOsCsKK9Or9OBHwePWe6Ahd6M';
  $address = urlencode($address);

  // Geocoding APIのリクエストURL
  $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key={$api_key}";
  // APIにリクエストを送信してレスポンスを取得
  $response = wp_remote_get($url);

  if (is_wp_error($response)) {
      return false;
  }

  $body = wp_remote_retrieve_body($response);
  $data = json_decode($body);

  // 成功した場合、緯度と経度を返す
  if ($data->status === 'OK') {
      $lat = $data->results[0]->geometry->location->lat;
      $lng = $data->results[0]->geometry->location->lng;
      return array('lat' => $lat, 'lng' => $lng);
  }

  return false;
}
add_filter('bcn_breadcrumb_title', 'custom_breadcrumb_title', 10, 3);
function custom_breadcrumb_title($title, $type, $id) {
  // var_dump($type);
  // echo '<br />';
  // echo '<br />';

  // var_dump($title);
  // echo '<br />';
  // echo '<br />';
  // var_dump($id);
  // echo '<br />';
  // echo '<br />';
   
  if (in_array( 'post-menu' , haystack: $type)) {
    $title = get_term($id)->name;
  }
  elseif (in_array( needle: 'post-shop-archive' , haystack: $type)) {
      $title = '店舗一覧';

      // $title = get_the_title($id);
  }
  elseif (in_array( needle: 'post-products-archive' , haystack: $type)) {
      // $title = get_the_title($id);
      $title = 'ギフト・贈り物';
  }
  elseif (in_array( 'post-post' , haystack: $type)) {
    // return $title;
    $title = 'お知らせ';
    return $title;
  }
  elseif (in_array( needle: 'category' , haystack: $type)) {
    return $title;

    // $title = 'お知らせ';
  }elseif($title == 'Concept'){
    $title = '当店のこだわり';

  }elseif($title == 'contact'){
    $title = 'お問い合わせ';

  }elseif($title == 'thanks'){
    $title = 'お問い合わせ完了';
  }
  elseif($title == ''){
    $title = 'お知らせ一覧';
  }
  // if ( get_query_var('all_news') ) {
  //   $title = 'お知らせ';
  // }
  return $title;
}


function custom_breadcrumb_trail($bcnObj) {
  // all_news が設定されている場合のみ「お知らせ」を追加
  if ( get_query_var('all_news') ) {
      // 「お知らせ」リンクのパンくずを生成
      $newTrail = new bcn_breadcrumb('お知らせ', null, array('archive', 'post-cluster'), home_url('/news'), null, true);
      // 「お知らせ」を配列の最後に追加して順序を保持
      array_unshift($bcnObj->breadcrumbs, $newTrail);
  }
}
add_action('bcn_after_fill', 'custom_breadcrumb_trail');

function add_all_posts_rewrite_rule() {
  add_rewrite_rule(
    '^news/page/([0-9]{1,})/?$',  // /news/page/番号 にマッチ
    'index.php?all_news=true&paged=$matches[1]',  // クエリ変数 all_news を設定し、paged にページ番号を渡す
    'top'
  );
  add_rewrite_rule(
    '^news/?$',
    'index.php?all_news=true',
    'top'
  );
}
add_action('init', 'add_all_posts_rewrite_rule');

function add_custom_query_vars($vars) {
  $vars[] = 'all_news';
  return $vars;
}
add_filter('query_vars', 'add_custom_query_vars');

function custom_template_for_news_page( $template ) {
  if ( get_query_var('all_news') ) {
      $new_template = locate_template( array( 'archive.php' ) );
      if ( !empty( $new_template ) ) {
          return $new_template;
      }
  }
  return $template;
}
add_filter( 'template_include', 'custom_template_for_news_page' );

// Contact Form7
add_filter('wpcf7_autop_or_not', '__return_false');

?>