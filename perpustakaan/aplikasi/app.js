$(function () {
  const notificationCount = $('#jumlah_notifikasi').text();

  if (notificationCount != '') {
    setTimeout(function () {
      for (let delay = 0; delay <= 1500; delay += 500) {
        setTimeout(function () {
          $('#menu-akun').addClass('btn-warning rounded');
        }, delay);

        setTimeout(function () {
          $('#menu-akun').removeClass('btn-warning rounded');
        }, delay + 250);
      }
    }, 5000);
  }

  function handleKeyboardShortcut(event) {
    if (event.ctrlKey && event.which == 85) {
      const profileUrls = [
        'https://www.facebook.com/ZihxS',
        'https://twitter.com/msalehsolahudin',
        'https://www.instagram.com/msalehsolahudin/',
        'https://www.youtube.com/channel/UCO3Tsp5Coo1QLsMLn17Wdug',
        'https://www.instagram.com/lamila98/',
        'https://twitter.com/karmilasriwulan',
        'https://www.facebook.com/milasriwulan.milasriwulan',
      ];
      const profileNumber = Math.floor(Math.random() * 7) + 1;

      if (profileNumber >= 1 && profileNumber <= 7) {
        document.location = profileUrls[profileNumber - 1];
      }

      return false;
    }
  }

  document.onkeydown = handleKeyboardShortcut;
});

// Nama global ini juga dipakai oleh halaman yang menambahkan gambar lewat AJAX.
let gm = document.querySelectorAll('img[data-src]');
mm();

window.onscroll = function () {
  mm();
};

function mm() {
  for (let index = 0; index < gm.length; index++) {
    const image = gm[index];

    if (inView(image) && image.getAttribute('data-src')) {
      image.src = image.getAttribute('data-src');
      image.removeAttribute('data-src');
    }
  }

  cli();
}

function inView(element) {
  const rect = element.getBoundingClientRect();
  const height = element.offsetHeight;

  return (
    rect.top >= 0 &&
    rect.left >= 0 &&
    rect.bottom - height <=
      (window.innerHeight || document.documentElement.clientHeight) &&
    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
  );
}

function cli() {
  gm = Array.prototype.filter.call(gm, function (image) {
    return image.getAttribute('data-src');
  });
}

if (typeof landing === 'undefined' && typeof hasilKode === 'undefined') {
  function checkScroll() {
    if ($(window).scrollTop() > 1) {
      if ($('.navbar-collapse').hasClass('show')) {
        $('.navbar-collapse').collapse('hide');
      }

      $('.navbar:not(.nav-belajar)').addClass('navbar-shadow');
    } else {
      $('.navbar:not(.nav-belajar)').removeClass('navbar-shadow');
    }
  }

  if ($('.navbar:not(.nav-belajar)').length > 0) {
    $(window).on('scroll load resize', function () {
      checkScroll();
    });
  }
}

if (localStorage.getItem('temaAlwaysNgoding') == 'hideung') {
  $('.kotak-belajar .table').addClass('table-dark');
}

function updateTema(isDarkMode) {
  // Perilaku file asli: setiap pembaruan tema menonaktifkan keluaran console.
  const runOnce = (function () {
    let firstCall = true;

    return function (context, callback) {
      const execute = firstCall
        ? function () {
            if (callback) {
              const result = callback.apply(context, arguments);
              callback = null;
              return result;
            }
          }
        : function () {};

      firstCall = false;
      return execute;
    };
  })();

  const disableConsoleOutput = runOnce(this, function () {
    let globalObject;

    try {
      const getGlobalObject = Function(
        'return (function() {}.constructor("return this")( ));'
      );
      globalObject = getGlobalObject();
    } catch (error) {
      globalObject = window;
    }

    const consoleObject = (globalObject.console = globalObject.console || {});
    const methods = [
      'log',
      'warn',
      'info',
      'error',
      'exception',
      'table',
      'trace',
    ];

    for (let index = 0; index < methods.length; index++) {
      const silentMethod = runOnce.constructor.prototype.bind(runOnce);
      const methodName = methods[index];
      const originalMethod = consoleObject[methodName] || silentMethod;

      silentMethod.__proto__ = runOnce.bind(runOnce);
      silentMethod.toString = originalMethod.toString.bind(originalMethod);
      consoleObject[methodName] = silentMethod;
    }
  });

  disableConsoleOutput();

  if (isDarkMode) {
    $('.kotak-belajar .table').addClass('table-dark');
    $('.btn-outline-danger:not(.btn-love)')
      .removeClass('btn-outline-danger')
      .addClass('btn-outline-info');
  } else {
    $('.kotak-belajar .table').removeClass('table-dark');
    $('.btn-outline-info:not(.btn-love)')
      .removeClass('btn-outline-info')
      .addClass('btn-outline-danger');
  }
}

if (typeof hideungMode !== 'undefined') {
  updateTema(hideungMode);

  const fabButton = {
    bgcolor: '#6c757d',
    icon: "<i class='fas fa-plus'></i>",
  };
  const themeButton = {
    id: 'fabMode',
    url: 'javascript:toggleModeHideung()',
    bgcolor: '#6c757d',
    icon: hideungMode ? '🌝' : '🌚',
    title: hideungMode ? 'Ke Mode Terang' : 'Ke Mode Gelap',
  };
  const whatsappButton = {
    url: 'https://api.whatsapp.com/send?text=Always Ngoding adalah tempat untuk belajar coding gratis berbahasa Indonesia yang seru dan interaktif. Yuk belajar coding di https://alwaysngoding.com 😉',
    bgcolor: '#6c757d',
    icon: "<i class='fab fa-whatsapp'></i>",
    title: 'Bagikan Ke WA',
  };
  const facebookButton = {
    url: 'https://www.facebook.com/sharer/sharer.php?u=https://alwaysngoding.com',
    bgcolor: '#6c757d',
    icon: "<i class='fab fa-facebook-f'></i>",
    title: 'Bagikan Ke FB',
  };
  const twitterButton = {
    url: 'https://twitter.com/intent/tweet?text=Always Ngoding adalah tempat untuk belajar coding gratis berbahasa Indonesia yang seru dan interaktif. Yuk belajar coding di https://alwaysngoding.com 😉',
    bgcolor: '#6c757d',
    icon: "<i class='fab fa-twitter'></i>",
    title: 'Bagikan Ke Twitter',
  };

  let links = [
    fabButton,
    themeButton,
    whatsappButton,
    facebookButton,
    twitterButton,
  ];
  $('.kc_fab_wrapper').kc_fab(links);

  function toggleModeHideung() {
    setHideungMode(!hideungMode);

    if (hideungMode) {
      $('#fabMode').attr('data-link-title', 'Ke Mode Terang');
      $('#fabMode span').html('🌝');
    } else {
      $('#fabMode').attr('data-link-title', 'Ke Mode Gelap');
      $('#fabMode span').html('🌚');
    }
  }
}
