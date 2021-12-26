<?php get_header(); ?>

<div class="content-wrapper front-page">
  <div class="featured-posts-slider" id="featured-posts-slider">
    <?php $i = 0; ?>
    <?php foreach (get_posts(array(
       'post__in' => get_option('sticky_posts'),
       'ignore_sticky_posts' => 1,
     )) as $key => $value) {
       ?>
      <?php $i++; ?>
      <article class="post-wrapper featured-post <?php echo $i == 1 ? 'visible' : '' ?>" id="featured-post-slider-post-<?php echo $i; ?>">
         <div class="featured-image">
           <div class="featured-image-back-rectangle"></div>
           <a href="<?php echo get_post_permalink($value->ID); ?>" rel="bookmark" title="<?php echo $value->post_title ?>">
             <div class="image-wrapper" style="background-image: url(<?php echo get_the_post_thumbnail_url($value->ID, 'large') ?>);"></div>
             <p class="image-source"><?php echo get_post(get_post_thumbnail_id($value->ID))->post_content; ?></p>
           </a>
           <div class="post-data">
             <p class="post-meta">
               <i class="fas fa-user"></i>&nbsp;&nbsp;<a href="<?php echo get_author_posts_url($value->post_author); ?>"><?php echo get_the_author_meta('display_name', $value->post_author) ?></a>&nbsp;&nbsp;&nbsp;&nbsp;
             </p>
             <h1 class="post-title"><?php echo $value->post_title ?></h1>
             <div class="post-excerpt">
               <?php echo get_the_excerpt($value->ID); ?>
             </div>
           </div>
         </div>
      </article>
    <?php } ?>

    <?php if ($i > 1) {?>
      <div class="featured-post-slider-nav">
        <?php for ($j = 1; $j <= $i; $j++) { ?>
          <a id="<?php echo $j; ?>" class="<?php echo $j == 1 ? 'active' : '' ?>" title="Zu Beitrag <?php echo $j; ?> gehen"><i class="fas fa-circle"></i></a>
        <?php }; ?>
      </div>

      <div class="featured-post-slider-arrows">
        <a class="slider-arrow-left" id="sliderArrowBackwards" title="Vorheriger Beitrag"><i class="fas fa-chevron-left"></i></a>
        <a class="slider-arrow-right" id="sliderArrowForwards" title="Nächster Beitrag"><i class="fas fa-chevron-right"></i></a>
      </div>
    <?php } ?>
  </div>


  <?php
  $cat_order = explode("\n", get_theme_mod('front_page_category_order'));
  foreach ($cat_order as $k => $v) {
    if (get_cat_ID($v) == null) { continue; } ?>
    <div class="category-header">
      <div class="horizontal-bar-blue"></div>
      <h3 class="category-header-title"><a href="<?php echo get_category_link(get_cat_ID($v)); ?>"><?php echo $v; ?></a></h3>
    </div>

    <div class="posts-list-wrapper">
    <?php
    foreach (get_posts(array(
        'numberposts' => 3,
        'category' => get_cat_ID($v),
      )) as $key => $value) {
      	?>
        <article class="post-wrapper">
          <?php if (has_post_thumbnail($value->ID)) { ?>
            <div class="featured-image">
              <a href="<?php echo get_post_permalink($value->ID); ?>" rel="bookmark" title="<?php echo $value->post_title ?>">
                <div class="featured-image-back-rectangle"></div>
                <div class="image-wrapper">
                  <?php echo get_the_post_thumbnail($value->ID, 'medium'); ?>
                </div>
                <p class="image-source"><?php echo get_post(get_post_thumbnail_id($value->ID))->post_content; ?></p>
              </a>
            </div>
          <?php } ?>

          <div class="post-shortinfo <?php if (!has_post_thumbnail($value->ID)) {echo 'wide';} ?>">
            <p class="post-meta">
              <i class="fas fa-user"></i>&nbsp;&nbsp;<a href="<?php echo get_author_posts_url($value->post_author); ?>"><?php echo get_the_author_meta('display_name', $value->post_author) ?></a>&nbsp;&nbsp;&nbsp;&nbsp;
              <?php if (is_user_logged_in()) { ?>
                <a href="<?php echo get_edit_post_link($value->ID); ?>" title="Bearbeiten"><i class="fas fa-edit"></i></a>
              <?php } ?>
            </p>

            <h1 class="post-title"><a href="<?php echo get_post_permalink($value->ID); ?>" rel="bookmark" title="<?php echo $value->post_title ?>"><?php echo $value->post_title ?></a></h1>

            <div class="post-excerpt">
              <?php echo get_the_excerpt($value->ID); ?>
            </div>

            <a class="read-more-link" href="<?php echo get_post_permalink($value->ID); ?>" rel="bookmark" title="<?php echo $value->post_title ?>">Weiterlesen...</a>
          </div>
        </article>
        <?php
      }
    ?></div><?php
  } ?>

  <div class="sidebar">
    <?php get_sidebar('front-page-sidebar'); ?>
  </div>
</div>

<?php get_footer(); ?>
