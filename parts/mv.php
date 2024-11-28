<?php
$slug = get_post_field('post_name', get_post());
?>
  <?php
    //  var_dump(($slug));
    //  echo '<br />';
  if ( is_category() ) {
    $category = get_queried_object();
    $slug = $category->slug; // カテゴリのスラッグ
    $name = $category->name; // カテゴリの名前
   }
  elseif( is_tag()){
    $tag = get_queried_object();
    $slug = $tag->slug;
    $name = $tag->name;
  }
  elseif( is_404()){
    $tag = get_queried_object();
    $slug = "404";
  }
  elseif( is_post_type_archive()){
    $post_type = get_post_type();
    $post_type_object = get_queried_object();
    $slug = $post_type_object->rewrite['slug'];
    $name = post_type_archive_title('', false);
  }
  elseif ( is_tax() ) {
    $taxonomy = get_queried_object();
    // $slug = $taxonomy->slug; // タクソノミーのスラッグ
    $name = $taxonomy->name; // タクソノミーの名前
    $slug = get_post_type();
  }elseif(is_single() && get_post_type() === 'products'){
    $slug = 'products';
  }
  else{

  }
if ( $slug == 'concept') {
  $title_en = 'CONCEPT';
  $title_jp = '当店のこだわり';
}
elseif ( $slug == 'menu') {
  $title_en = 'MENU';
  $title_jp = 'メニュー';
}
elseif ( $slug == 'news') {
  $title_en = 'NEWS';
  $title_jp = 'お知らせ';
}
elseif ( $slug == 'shop') {
  $title_en = 'SHOP';
  $title_jp = '店舗一覧';
}
elseif ( $slug == 'products') {
  $title_en = 'GIFT';
  $title_jp = 'ギフト・贈り物';
}
elseif ( $slug == 'contact') {
  $title_en = 'CONTACT';
  $title_jp = 'お問い合わせ';
}
elseif ( $slug == 'thanks') {
  $title_en = 'CONTACT';
  $title_jp = 'お問い合わせ';
}
elseif ( $slug == '404') {
  $title_en = '404';
  $title_jp = 'SORRY';
}
else{
  $title_en = 'NEWS';
  $title_jp = 'お知らせ';
}
// echo $slug;

?>
<section class="p-mv <?php echo $slug ?>">
  <div class="p-mv__inner">
    <div class="p-mv__container">
      <div class="p-mv__title">
        <h1><?php echo esc_html($title_en); ?></h1>
        <p><?php echo esc_html($title_jp); ?></p>
      </div>
    </div>
  </div>
</section>