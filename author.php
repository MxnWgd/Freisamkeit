<?php get_header(); ?>

<div class="content-wrapper">
  <div class="page-title">
    <div class="horizontal-bar-blue"></div>
    <h3 class="page-title-heading"><?php echo get_the_archive_title(); ?></h3>
  </div>

  <div class="author-info">
    <div class="author-image-wrapper">
      <div class="author-image-back-rectangle"></div>
      <?php echo get_wp_user_avatar(get_the_author_meta('ID'), 'medium');  ?>
      <i class="fas fa-user"></i>
    </div>
    <div class="author-desc"><?php echo get_the_author_meta('description'); ?></div>
  </div>

  <h1>Artikel</h1>

  <div class="posts-list-wrapper">
    <?php
    if (have_posts()) {
      while (have_posts()) {
        the_post();

        get_template_part('content');
      }
    } else {
      ?><p>Keine Artikel.</p><?php
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
