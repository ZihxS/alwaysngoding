if ('serviceWorker' in navigator) {
    navigator.serviceWorker.register(window.location.href.includes('belajar-') ? '../sw.js' : 'sw.js').then(function(_){
        console.log("service worker registered");
    }).catch(function(err) {
        console.log("error: ", err)
    });
}
