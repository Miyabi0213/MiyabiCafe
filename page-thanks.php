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
        <h2>送信が完了しました</h2>
        <p>お問い合わせありがとうございました。<br  />
        3営業日以内に返信いたしますので、しばらくお待ちいただけますと幸いです。</p>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>