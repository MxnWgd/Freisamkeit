<?php get_header(); ?>

<div class="content-wrapper">
  <div class="page-title">
    <div class="horizontal-bar-blue"></div>
    <h3 class="page-title-heading tag-title"><?php single_tag_title(); ?></h3>
  </div>

  <div class="posts-list-wrapper">
    <?php
    if (have_posts()) {
      while (have_posts()) {
        the_post();

        get_template_part('content');
      }
    } else {
      ?><p>Keine Artikel gefunden.</p><?php
    }
    ?>
  </div>

  <div class="pagination-nav">
    <?php echo paginate_links(
      array('type' => 'plain',
       'next_text' => '<i class="fas fa-angle-right"></i>',
       'prev_text' => '<i class="fas fa-angle-left"></i>')); ?>
  </div>
</div>

<?php get_footer(); ?>
