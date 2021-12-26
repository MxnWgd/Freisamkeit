<?php get_header(); ?>

<div class="content-wrapper">
  <div class="page-title">
    <?php if (has_post_thumbnail()) { ?>
      <div class="image-wrapper" style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>);"></div>
      <p class="image-source"><?php echo get_post(get_post_thumbnail_id())->post_content; ?></p>
    <?php } ?>
    <div class="horizontal-bar-blue"></div>
    <h3 class="page-title-heading"><?php the_title(); ?></h3>
  </div>

  <div class="page-content">
    <?php the_content(); ?>
  </div>
</div>

<?php get_footer(); ?>
