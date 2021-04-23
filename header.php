<!DOCTYPE html>
<?php global $wp; $current_url = home_url(add_query_arg(array(), $wp->request)); ?>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta property="og:url" content="<?php echo $current_url; ?>">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php is_front_page() ? bloginfo('name') : wp_title(''); ?>">
    <meta property="og:description" content="<?php echo is_front_page() ? bloginfo('description') : get_the_excerpt(get_the_ID()); ?>">
    <meta property="og:image" content="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium') ?>">

    <meta name="theme-color" content="#A4005A">
    <meta name="description" content="<?php echo get_the_excerpt(get_the_ID()); ?>">

    <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <?php wp_head(); ?>
  </head>

  <body>
    <header>
      <div class="horizontal-bar-yellow"></div>

      <div class="header-triangle">
        <div class="header-triangle-shape"></div>
        <div class="header-text">
          <?php if (has_custom_logo()) { ?>
            <?php the_custom_logo(); ?>
          <?php } else { ?>
            <h1 class="header-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html(get_bloginfo('name')); ?></a></h1>
          <?php } ?>
            <h2 class="header-subtitle"><?php echo get_bloginfo('description', 'display'); ?></h2>
        </div>
      </div>

      <div class="nav-wrapper">
        <?php if (has_nav_menu('primary')) {
          wp_nav_menu(array(
              'menu_class' => 'header-menu',
              'container' => '',
              'theme_location' => 'primary',
            ));
        } else {
          wp_list_pages(array(
            'container' => '',
            'title_li' => ''
          ));
        } ?>
        <a class="nav-button" id="navButton" title="Menü"><span class="nav-button-span"></span></a>
        <a class="search-button" id="searchButton" title="Suche"><i class="fas fa-search"></i></a>
      </div>
    </header>
