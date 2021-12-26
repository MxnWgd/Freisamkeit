<?php get_header(); ?>

<div class="content-wrapper">
  <div class="posts-list-wrapper">
    <?php while (have_posts()) {
    	the_post();

    	get_template_part('content-single');
    } ?>
  </div>

  <div class="page-title">
    <div class="horizontal-bar-blue"></div>
    <h3 class="page-title-heading">Ähnliche Beiträge</h3>
  </div>
  <div class="related-posts-wrapper">
    <?php
      $orig_post = $post;
      global $post;
      $tags = wp_get_post_tags($post->ID);

      if ($tags) {
        $tag_ids = array();

        foreach($tags as $individual_tag) {
          $tag_ids[] = $individual_tag->term_id;
        }

        $args=array(
          'tag__in' => $tag_ids,
          'post__not_in' => array($post->ID),
          'posts_per_page' => 2,
        );

        $my_query = new wp_query($args);
        $found_posts = false;

        while ($my_query->have_posts()) {
          $my_query->the_post();
          $found_posts = true;
          ?><article class="post-wrapper">
            <?php if (has_post_thumbnail()) { ?>
              <div class="featured-image">
                <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo get_the_title(); ?>">
                  <div class="featured-image-back-rectangle"></div>
                  <div class="image-wrapper">
                    <?php the_post_thumbnail('small'); ?>
                  </div>
                  <p class="image-source"><?php echo get_post(get_post_thumbnail_id())->post_content; ?></p>
                </a>
              </div>
            <?php } ?>

            <div class="post-shortinfo">
              <p class="post-meta">
                <i class="fas fa-user"></i>&nbsp;&nbsp;<?php the_author_posts_link(); ?>&nbsp;&nbsp;&nbsp;&nbsp;
              </p>

              <h1 class="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo get_the_title(); ?>"><?php the_title(); ?></a></h1>

              <div class="post-excerpt">
                <?php the_excerpt(); ?>
              </div>

              <a class="read-more-link" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo get_the_title(); ?>">Weiterlesen...</a>
            </div>
          </article>
        <?php }

        if (!$found_posts) {
          ?><p>Keine ähnlichen Beiträge gefunden.</p><?php
        }
      } else {
        ?><p>Keine ähnlichen Beiträge gefunden.</p><?php
      }

      $post = $orig_post;
      wp_reset_query();
      ?>
    </div>
</div>

<?php get_footer(); ?>
