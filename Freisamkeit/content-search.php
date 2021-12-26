<article class="post-wrapper">
  <?php if (has_post_thumbnail()) { ?>
    <div class="featured-image">
      <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo get_the_title(); ?>">
        <div class="featured-image-back-rectangle"></div>
        <div class="image-wrapper" style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>);">
          <?php the_post_thumbnail('medium'); ?>
        </div>
        <p class="image-source"><?php echo get_post(get_post_thumbnail_id())->post_content; ?></p>
      </a>
    </div>
  <?php } ?>

  <div class="post-shortinfo <?php if (!has_post_thumbnail()) {echo 'wide';} ?>">
    <p class="post-meta">
      <i class="fas fa-user"></i>&nbsp;&nbsp;<?php the_author_posts_link(); ?>&nbsp;&nbsp;&nbsp;&nbsp;
      <?php if (is_user_logged_in()) { ?>
        <?php edit_post_link('<i class="fas fa-edit"></i>'); ?>
      <?php } ?>
    </p>

    <h1 class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo get_the_title(); ?>"><?php the_title(); ?></a></h1>

    <div class="post-excerpt">
      <?php the_excerpt(); ?>
    </div>

    <a class="read-more-link" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo get_the_title(); ?>">Weiterlesen...</a>
  </div>
</article>
