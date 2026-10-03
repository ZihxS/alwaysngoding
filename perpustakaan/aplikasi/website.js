(function disableConsole() {
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
})();

$(function () {
  $('[data-toggle="tooltip"]').tooltip({
    container: 'body',
    trigger: 'hover',
  });
});

function tooltip() {
  $('div.tooltip').remove();
  $('[data-toggle="tooltip"]').tooltip({
    container: 'body',
    trigger: 'hover',
  });
}

function notifikasi(type, message) {
  $.notify(
    { message: message },
    {
      type: 'bg-' + type,
      allow_dismiss: true,
      newest_on_top: true,
      timer: 2000,
      offset: 15,
      placement: { from: 'bottom', align: 'right' },
      animate: { enter: 'animated fadeIn', exit: 'animated fadeOut' },
      template:
        '<div data-notify="container" class="bootstrap-notify-container alert alert-dismissible {0} p-r-35" role="alert">' +
        '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
        '<span data-notify="icon"></span> ' +
        '<span data-notify="title">{1}</span> ' +
        '<span data-notify="message">{2}</span>' +
        '<div class="progress" data-notify="progressbar">' +
        '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
        '</div>' +
        '<a href="{3}" target="{4}" data-notify="url"></a>' +
        '</div>',
    }
  );
}

$(document).on('focusin', function (event) {
  if ($(event.target).closest('.mce-window').length) {
    event.stopImmediatePropagation();

    if ($(window).width() < '768') {
      $('span:contains("x")').css('margin-top', '4px');
    }
  }
});
