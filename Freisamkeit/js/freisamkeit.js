document.addEventListener('DOMContentLoaded', function() {
  // Front page slider
  var amountSlides = jQuery('#featured-posts-slider > .featured-post').length;
  var indexSlider = 1;
  if (amountSlides > 1) {
    setInterval(function() {
      if (indexSlider >= amountSlides) {
        indexSlider = 1;
      } else {
        indexSlider++;
      }

      featuredSliderSet(indexSlider);
    }, sliderInterval);
  }

  jQuery('.featured-post-slider-nav > a').click(function(event) {
    var id = jQuery(this).attr('id');
    featuredSliderSet(id);
  });

  jQuery('#sliderArrowBackwards').click(function() {
    if (indexSlider <= 1) {
      indexSlider = amountSlides;
    } else {
      indexSlider--;
    }
    featuredSliderSet(indexSlider);
  })

  jQuery('#sliderArrowForwards').click(function() {
    if (indexSlider >= amountSlides) {
      indexSlider = 1;
    } else {
      indexSlider++;
    }
    featuredSliderSet(indexSlider);
  })

  function featuredSliderSet(id) {
    indexSlider = id;

    jQuery('#featured-posts-slider .featured-post.visible').removeClass('visible');
    jQuery('#featured-post-slider-post-' + id).addClass('visible');

    jQuery('.featured-post-slider-nav > a.active').removeClass('active');
    jQuery('.featured-post-slider-nav > a#' + id).addClass('active');
  }


  // Search panel
  jQuery('#searchButton').click(function(){
    jQuery('#searchPanel').addClass('displayed');
    setTimeout(function(){
      jQuery('#searchform input#s').focus().select();
    }, 200);
  });

  jQuery('#searchPanel').click(function(){
    jQuery(this).removeClass('displayed');
  });

  jQuery('#searchPanelClose').click(function(){
    jQuery('#searchPanel').removeClass('displayed');
  });

  jQuery('#searchform').click(function(event){
    event.stopPropagation();
  });


  // Scroll fade-in
  var boxes = jQuery('.content-wrapper').children();
  boxes.push(jQuery('.footer-triangle'));
  var initoffset = jQuery(window).height() + jQuery(document).scrollTop();

  for (var i = 0; i < boxes.length; i++) {
    var current = boxes[i];

    if (jQuery(current).offset().top > initoffset) {
      jQuery(current).addClass('invisible');
    } else {
      // remove if already visible
      boxes.splice(i, 1);
    }
  }

  jQuery(window).scroll(function(){
      var scrolldistance = jQuery(document).scrollTop();
      var scrolldistancebottom = scrolldistance + jQuery(window).height();

      // make boxes visible again
      for (var i = 0; i < boxes.length; i++) {
        var current = boxes[i];

        if (jQuery(current).offset().top < scrolldistancebottom) {
          jQuery(current).removeClass('invisible');
          boxes.splice(i, 1);
        }
      }
  });

  jQuery(window).resize(function(){
      var scrolldistance = jQuery(document).scrollTop();
      var scrolldistancebottom = scrolldistance + jQuery(window).height();

      // make boxes visible again
      for (var i = 0; i < boxes.length; i++) {
        var current = boxes[i];

        if (jQuery(current).offset().top < scrolldistancebottom) {
          jQuery(current).removeClass('invisible');
          boxes.splice(i, 1);
        }
      }
  });


  // Mobile nav menu
  jQuery('#navButton').click(function(){
    jQuery('#navButton').toggleClass('opened');
    jQuery('.nav-wrapper').toggleClass('opened');
  });


  // Scroll-up button
  jQuery('#scrollUpButton').click(function() {
      jQuery("html, body").animate({ scrollTop: 0 }, 1000);
  });


  // Cookie banner
  jQuery('#cookiesAccept').click(function(){
    jQuery.cookie('cookiesaccept', 'true');
    jQuery('#cookieBanner').addClass('invisible');
  });


  // Close Panels on escape press
  jQuery(document).on('keydown', function(event) {
       if (event.key == 'Escape') {
           jQuery('#searchPanel').removeClass('displayed');
       }
   });
});
