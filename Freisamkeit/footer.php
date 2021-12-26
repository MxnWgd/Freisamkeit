    <footer>
      <div class="footer-triangle">
        <div class="footer-triangle-shape"></div>
        <div class="footer-text">
          <div class="nav-footer">
            <?php if (has_nav_menu('footer')) {
              wp_nav_menu(array(
                'container' => '',
                'menu_class' => 'footer-menu',
                'theme_location' => 'footer',
              ));
            } ?>
          </div>
          <a href="https://liberale-hochschulgruppen.de/" target="_blank" class="footer-logo-link" title="Liberale Hochschulgruppen" rel="noreferrer"><img class="footer-logo" src="<?php echo get_template_directory_uri(); ?>/img/lhg-logo.png" alt="Liberale Hochschulgruppen"></a>
        </div>
      </div>

      <div class="footer-sm-icons">
        <a title="Nach oben scrollen" class="scroll-up-button" id="scrollUpButton"><i class="fas fa-arrow-up"></i></a>
        <span class="vertical-separator">&nbsp;</span>

        <?php if (get_theme_mod('sm_facebook_url') != null) { ?>
          <a title="Facebook-Profil" class="sm-icon" target="_blank" href="<?php echo get_theme_mod('sm_facebook_url'); ?>" rel="noreferrer"><i class="fab fa-facebook"></i></a>
        <?php } ?>
        <?php if (get_theme_mod('sm_insta_url') != null) { ?>
          <a title="Instagram-Profil" class="sm-icon" target="_blank" href="<?php echo get_theme_mod('sm_insta_url'); ?>" rel="noreferrer"><i class="fab fa-instagram"></i></a>
        <?php } ?>
        <?php if (get_theme_mod('sm_twitter_url') != null) { ?>
          <a title="Twitter-Profil" class="sm-icon" target="_blank" href="<?php echo get_theme_mod('sm_twitter_url'); ?>" rel="noreferrer"><i class="fab fa-twitter"></i></a>
        <?php } ?>
      </div>


      <script type="text/javascript">
        var sliderInterval = <?php echo get_theme_mod('featured_post_interval') != null ? get_theme_mod('featured_post_interval') : 8000; ?>;
      </script>
      <?php wp_footer(); ?>
      <!-- theme by: Maxi W. -->
    </footer>

    <div class="search-cover" id="searchPanel">
      <button id="searchPanelClose"><i class="fas fa-times"></i></button>
      <?php get_search_form(); ?>
    </div>

    <?php if (!isset($_COOKIE['cookiesaccept']) || $_COOKIE['cookiesaccept'] != 'true') { ?>
      <div class="cookie-banner" id="cookieBanner">
        <h3>Cookies</h3>
        <p>
          Diese Website verwendet Cookies, um korrekt zu funktionieren. Durch die weitere Verwendung erklärst Du dich damit einverstanden.
        </p>
        <button id="cookiesAccept" class="cookie-banner-accept">Ok, verstanden!</button>
      </div>
    <?php } ?>
  </body>
</html>
