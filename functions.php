<?php
  /*---------------------------------------------
    General functions
  ---------------------------------------------*/

  function freisamkeit_script_enqueue() {
      wp_enqueue_script('customjs', get_template_directory_uri() . '/js/freisamkeit.js', array('jquery'), '', true);
      wp_enqueue_script('jquerycookie', get_template_directory_uri() . '/js/jquery.cookie.js', array('jquery'), '', true);
  }
  add_action('wp_enqueue_scripts', 'freisamkeit_script_enqueue');

  function freisamkeit_theme_enqueue() {
    wp_enqueue_style('customstyle', get_template_directory_uri() . '/style.css', array(), '', 'all');
  }

  add_action('wp_enqueue_scripts', 'freisamkeit_theme_enqueue');

  function wpdocs_excerpt_more($more) {
    return '...';
  }
  add_filter('excerpt_more', 'wpdocs_excerpt_more');


  /*---------------------------------------------
    Theme support
  ---------------------------------------------*/

  function freisamkeit_theme_setup() {
  //
  //   add_theme_support('editor-styles');
  //   add_editor_style('https://fonts.googleapis.com/css?family=Open+Sans:300,400|Muli:300,400|Roboto:300,400|Source+Code+Pro');
  //   add_editor_style('style-editor.css');

    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
      'height' => 300,
      'width' => 700,
      'flex-height' => true,
      'flex-width' => true,
    ));

    register_nav_menu('primary', 'Obere Menüleiste');
    register_nav_menu('footer', 'Fußleistenmenü');

    register_sidebar( array(
        'name'          => 'Startseiten-Widget-Bereich',
        'id'            => 'front-page-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<div class="page-title"><div class="horizontal-bar-blue"></div><h3 class="page-title-heading">',
        'after_title'   => '</h3></div>',
    ) );
  }

  add_action('after_setup_theme', 'freisamkeit_theme_setup');

  /*-----------------------------------------------
    Theme Customizer
  -----------------------------------------------*/

  class Freisamkeit_Theme_Customize {
    public static function freisamkeit_customize_register($wp_customize) {
      $categories_list = get_categories(array('orderby' => 'name',));
      $category_string = ""; // keep double quotes!!!
      $category_string_def = "";

      $i = 1;
      foreach($categories_list as $single_cat) {
  	     $category_string .= "- " . $single_cat->name . "<br/>";
  	     $category_string_def .= $i . ". " . $single_cat->name . "\n";
         $i++;
      }

      $wp_customize->add_section('front_page_options', array(
        'title' => 'Startseiteneinstellungen',
        'description' => 'Hier kannst du Einstellugen für die Startseite vornehmen.',
        'priority' => 2,
      ));


      $wp_customize->add_setting('front_page_category_order', array(
        'default' => $category_string_def,
        'capability' => 'edit_theme_options',
        'type' => 'theme_mod',
        'validate_callback' => 'validate_categories',
      ));

      $wp_customize->add_control('front_page_category_order_option', array(
        'type' => 'textarea',
        'settings' => 'front_page_category_order',
        'section' => 'front_page_options',
        'label' => 'Reihenfolge der Kategorien',
        'description' => "Hier kann die Reihenfolge der Kategorien angepasst werden. Die Kategorien bitte untereinander schreiben:<br/><pre>Kategorie 1<br/>Kategorie 2<br/>...</pre><b>Verfügbare Kategorien</b><br/>" . $category_string,
      ));

      function validate_categories($validity, $value) {
        if (empty($value)) {
          $validity->add('required', 'Bitte Kategorien eintragen');
        } else {
          $cats = explode("\n", $value);
          if (sizeof($cats) == 0) {
            $validity->add('required', 'Bitte Kategorien eintragen');
          } else {
            foreach ($cats as $k => $v) {
              if ($v != '' && get_cat_ID($v) == null) {
                $validity->add('required', "Keine Kategorie \"" . $v . "\" gefunden.\n");
              }
            }
          }
        }
        return $validity;
      }

      $wp_customize->add_setting('featured_post_interval', array(
        'default' => '8000',
        'capability' => 'edit_theme_options',
        'type' => 'theme_mod',
      ));

      $wp_customize->add_control('featured_post_interval_option', array(
        'settings' => 'featured_post_interval',
        'section' => 'front_page_options',
        'label' => 'Interval für angeheftete Beiträge',
        'description' => 'Hier kannst du das Interval in Millisekunden angeben, in welchem durch die angehefteten Beiträge auf der Startseite zyklisch iteriert wird.',
      ));


      $wp_customize->add_section('sm_options', array(
        'title' => 'Social-Media-Icons',
        'description' => 'Hier können Links zu Social-Media-Profilen eingefügt werden. Bleibt ein Feld leer, wird kein Symbol für das Social-Media-Netzwerk angezeigt.',
        'priority' => 1,
      ));

      $wp_customize->add_setting('sm_facebook_url', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'type' => 'theme_mod',
      ));

      $wp_customize->add_control('sm_facebook_url_option', array(
        'settings' => 'sm_facebook_url',
        'section' => 'sm_options',
        'label' => 'Facebook',
        'description' => 'Hier kannst du den Link zum Facebookprofil eintragen.',
      ));

      $wp_customize->add_setting('sm_insta_url', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'type' => 'theme_mod',
      ));

      $wp_customize->add_control('sm_insta_url_option', array(
        'settings' => 'sm_insta_url',
        'section' => 'sm_options',
        'label' => 'Instagram',
        'description' => 'Hier kannst du den Link zum Instagramprofil eintragen.',
      ));

      $wp_customize->add_setting('sm_twitter_url', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'type' => 'theme_mod',
      ));

      $wp_customize->add_control('sm_twitter_url_option', array(
        'settings' => 'sm_twitter_url',
        'section' => 'sm_options',
        'label' => 'Twitter',
        'description' => 'Hier kannst du den Link zum Twitterprofil eintragen.',
      ));
    }
  }

  add_action('customize_register', array('Freisamkeit_Theme_Customize', 'freisamkeit_customize_register'));

  /*-----------------------------------------------
    Custom blocks
  -----------------------------------------------*/

function custom_block_admin() {
  wp_enqueue_script(
    'custom-blocks',
    get_template_directory_uri() . '/blocks/blocks.js',
    array('wp-blocks', 'wp-element')
  );

  wp_enqueue_style(
    'custom-blocks',
    get_template_directory_uri() . '/blocks/blocks.css',
    array()
  );
}
add_action('enqueue_block_editor_assets', 'custom_block_admin');

function custom_block_frontend() {
  wp_enqueue_style(
    'custom-blocks',
    get_template_directory_uri() . '/blocks/blocks.css',
    array()
  );
}
add_action('wp_enqueue_scripts', 'custom_block_frontend');

?>
