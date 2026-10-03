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

new WOW().init();
