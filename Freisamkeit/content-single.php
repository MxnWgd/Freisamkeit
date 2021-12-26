<article class="single-wrapper">
  <?php if (has_post_thumbnail()) { ?>
    <div class="featured-image">
      <div class="featured-image-back-rectangle"></div>
      <div class="image-wrapper" style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>);"></div>
      <p class="image-source"><?php echo get_post(get_post_thumbnail_id())->post_content; ?></p>
    </div>
  <?php } ?>

  <div class="post-text">
    <p class="post-meta">
      <i class="fas fa-user"></i>&nbsp;&nbsp;<?php the_author_posts_link(); ?>&nbsp;&nbsp;&nbsp;&nbsp;
      <i class="fas fa-archive"></i>&nbsp;&nbsp;<?php the_category(',&nbsp;'); ?>&nbsp;&nbsp;&nbsp;&nbsp;
      <?php if (is_user_logged_in()) { ?>
        <?php edit_post_link('<i class="fas fa-edit"></i>'); ?>
      <?php } ?>
    </p>

    <h1 class="post-title"><?php the_title(); ?></h1>

    <div class="post-content">
      <?php the_content(); ?>
    </div>

    <div class="post-tags">
      <?php the_tags('', ''); ?>
    </div>
  </div>


  <div class="horizontal-bar-blue"></div>
  <div class="author-info">
    <div class="author-image-wrapper">
      <div class="author-image-back-rectangle"></div>
      <?php echo get_wp_user_avatar(get_the_author_meta('ID'), 'large');  ?>
      <i class="fas fa-user"></i>
    </div>
    <div class="author-desc">
      <h3><?php echo the_author_posts_link(); ?></h3>
      <?php echo get_the_author_meta('description'); ?>
    </div>
  </div>
</article>
