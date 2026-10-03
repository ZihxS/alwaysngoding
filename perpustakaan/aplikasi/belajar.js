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

let navOuterHeight = $('nav').outerHeight() + 1;

function setupSlip(element) {
  element.addEventListener(
    'slip:beforereorder',
    function (event) {
      if (event.target.classList.contains('nr')) {
        event.preventDefault();
      }
    },
    false
  );

  element.addEventListener(
    'slip:beforeswipe',
    function (event) {
      if (
        event.target.nodeName == 'INPUT' ||
        event.target.classList.contains('ns')
      ) {
        event.preventDefault();
      }
    },
    false
  );

  element.addEventListener(
    'slip:beforewait',
    function (event) {
      if (event.target.classList.contains('ns')) {
        event.preventDefault();
      }
    },
    false
  );

  element.addEventListener(
    'slip:reorder',
    function (event) {
      const item = arrRangkaian[event.detail.originalIndex];
      arrRangkaian.splice(event.detail.originalIndex, 1);
      arrRangkaian.splice(event.detail.spliceIndex, 0, item);
      event.target.parentNode.insertBefore(
        event.target,
        event.detail.insertBefore
      );
      $('#arrRangkaian').val(arrRangkaian);
      return false;
    },
    false
  );

  return new Slip(element);
}
