$(function() {

  // if (document.cookie.match(/^(.*;)?\s*adminToggled\s*=\s*[^;]+(.*)?$/)  ) {
  //   console.log('tem o cookie no admin');
  //   $("body").toggleClass("sidebar-toggled");
  //   $(".sidebar").toggleClass("toggled");
  //   if ($(".sidebar").hasClass("toggled")) {
  //     $('.sidebar .collapse').collapse('hide');
  //   }
  // }

  // if (document.cookie.match(/^(.*;)?\s*appToggled\s*=\s*[^;]+(.*)?$/)  ) {
  //   console.log('tem o cookie no app');
  //   $("body").toggleClass("sidebar-toggled");
  //   $(".sidebar").toggleClass("toggled");
  //   if ($(".sidebar").hasClass("toggled")) {
  //     $('.sidebar .collapse').collapse('hide');
  //   }
  // }
  
});

(function($) {
  "use strict"; // Start of use strict

  function setCookie(name, value) {
    var cookie = name + "=" + escape(value);
    document.cookie = cookie;
  }

  function getCookie(name) {
    var cookies = document.cookie;
    var prefix = name + "=";
    var begin = cookies.indexOf("; " + prefix);
    if (begin == -1) {
      begin = cookies.indexOf(prefix);
      if (begin != 0) {
        return null;
      }
    } else {
      begin += 2;
    }
    var end = cookies.indexOf(";", begin);
    if (end == -1) {
      end = cookies.length;
    }
    return unescape(cookies.substring(begin + prefix.length, end));
  }

  function deleteCookie(name) {
    if (getCookie(name)) {
      document.cookie = name + "=" + "; expires=Thu, 01-Jan-70 00:00:01 GMT";
    }
  }
  
  // Toggle the side navigation
  $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
    if ($(".sidebar").hasClass("toggled")) {
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // // Toggle the side navigation APP
  // $("#app #sidebarToggle, #app #sidebarToggleTop").on('click', function(e) {
  //   if ($("#app .sidebar").hasClass("toggled")) {
  //     setCookie('appToggled', '1');
  //   } else {
  //     deleteCookie('appToggled');
  //   };
  // });

  // // Toggle the side navigation ADMIN
  // $("#admin #sidebarToggle, #admin #sidebarToggleTop").on('click', function(e) {
  //   if ($("#admin .sidebar").hasClass("toggled")) {
  //     setCookie('adminToggled', '1');
  //   } else {
  //     deleteCookie('adminToggled');
  //   };
  // });

  // Close any open menu accordions when window is resized below 768px
  $(window).resize(function() {
    if ($(window).width() < 768) {
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
    if ($(window).width() > 768) {
      var e0 = e.originalEvent,
        delta = e0.wheelDelta || -e0.detail;
      this.scrollTop += (delta < 0 ? 1 : -1) * 30;
      e.preventDefault();
    }
  });

  // Scroll to top button appear
  $(document).on('scroll', function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });

  // Smooth scrolling using jQuery easing
  $(document).on('click', 'a.scroll-to-top', function(e) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    e.preventDefault();
  });

})(jQuery); // End of use strict
