<?php
 global $numpages, $page;

if ($numpages > 1) { ?>

  <div class="p-news-pagenation c-pagenation-top">
    <?php
    wp_link_pages(array(
        'before' => '<div class="c-pagenation-wp">',
        'after' => '</div>',
        'link_before' => '<span class="page-numbers">',
        'link_after' => '</span>',
        'next_or_number' => 'number',
        'pagelink' => '%',
        'separator' => '',
    ));
    global $page, $numpages;

    if ($page > 1) {
        $prev_link = _wp_link_page($page - 1) . '<i class="fas fa-angle-left"></i></a>';
        echo '<div class="prev-link">' . $prev_link . '</div>';
    }

    if ($page < $numpages) {
        $next_link = _wp_link_page($page + 1) . '<i class="fas fa-angle-right"></i></a>';
        echo '<div class="next-link">' . $next_link . '</div>';
    }
    ?>
  </div>

<?php
} ?>
