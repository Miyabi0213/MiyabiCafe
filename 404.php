<?php get_header(); ?>
<main>
  <div class="p-page-concept__mv">
    <?php get_template_part('/parts/mv') ?>
    <div class="p-page-concept__bread">
      <?php get_template_part('/parts/bread') ?>
    </div>
  </div>

  <section class="p-page-thanks">
    <div class="p-page-thanks__inner">
      <div class="p-page-thanks__title">
        <h2>お探しのページは見つかりませんでした。</h2>
        <p>お探しのページは、移動または削除された可能性があります。<br  /></p>
        <a href="/top" class="c-404__button c-button-type3">TOPへ戻る</a>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>