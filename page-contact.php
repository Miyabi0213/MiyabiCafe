<?php get_header(); ?>
<main>
  <div class="p-page-concept__mv">
    <?php get_template_part('/parts/mv') ?>
    <div class="p-page-concept__bread">
      <?php get_template_part('/parts/bread') ?>
    </div>
  </div>

  <section class="p-page-contact">
    <div class="p-page-contact__inner">
    <div class="p-page-contact__title">
        <h2>お問い合わせフォーム</h2>
        <p>お問い合わせ内容に応じて、項目をご選択のうえ、お気軽にお問い合わせください。</p>
      </div>
      <div class="p-page-contact__contents">
        <div class="p-page-contact__container">
          <div class="p-page-contact__form">
            <?php echo the_content(); ?>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
