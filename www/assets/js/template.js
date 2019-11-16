$(function () {

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

(function ($) {
  "use strict"; // Start of use strict

  // Toggle the side navigation
  $("#sidebarToggle, #sidebarToggleTop").on('click', function (e) {
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

  // Feche qualquer acordeão de menu aberto quando a janela for redimensionada abaixo de 768px
  $(window).resize(function () {
    if ($(window).width() < 768) {
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Impedir que o wrapper de conteúdo role enquanto a navegação lateral fixa pairava sobre
  $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function (e) {
    if ($(window).width() > 768) {
      var e0 = e.originalEvent,
        delta = e0.wheelDelta || -e0.detail;
      this.scrollTop += (delta < 0 ? 1 : -1) * 30;
      e.preventDefault();
    }
  });

  // Role para o topo do botão
  $(document).on('scroll', function () {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });

  // Rolagem suave usando o jQuery easing
  $(document).on('click', 'a.scroll-to-top', function (e) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    e.preventDefault();
  });

  // Seletor de tamanho do pacote só é mostrado caso seja selecionado `Retirar Pacote` $var=1
  $('.radioRetirar').click(function () {
    if ($(this).prop('value') == 1) {
      $('.form-group-pacote').show()
    } else {
      $('.form-group-pacote').hide();
    }
  });

})(jQuery); // End of use strict

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

function validaEmail(email) {
  console.log(email);
  if (
    email.value.indexOf("@") == -1 ||
    email.valueOf.indexOf(".") == -1 ||
    email.value == "" ||
    email.value == null
  ) {
    alert("Por favor, indique um e-mail válido.");
    email.focus();
    return false;
  }
}




// VALIDAÇÕES FORMS ADMIN
function validaForm(form) {
  if (form.enderecoRetirada.value == "" || form.enderecoRetirada.value == null) {
    alert("Por favor, indique o Endereço de Retirada.");
    form.enderecoRetirada.focus();
    return false;
  }
}


// VALIDAÇÕES FORMS APP
function validaFormNovoPedido(form) {
  if (form.enderecoRetirada.value == "" || form.enderecoRetirada.value == null) {
    alert("Por favor, indique o Endereço de Retirada.");
    form.enderecoRetirada.focus();
    form.enderecoRetirada.classList.add('form-error');
    return false;
  } else {
    form.enderecoRetirada.classList.remove('form-error');
  }

  if (form.enderecoDestino.value == "" || form.enderecoDestino.value == null) {
    alert("Por favor, indique o Endereço de Destino.");
    form.enderecoDestino.focus();
    form.enderecoDestino.classList.add('form-error');
    return false;
  } else {
    form.enderecoDestino.classList.remove('form-error');
  }

}