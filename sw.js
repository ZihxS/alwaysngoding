self.addEventListener("install", function(event) {
	event.waitUntil(
		caches.open("ang-pwa").then(function(cache) {
			return cache.addAll([
				"/",
			]);
		})
	);
});

self.addEventListener("fetch", function(event) {
	if ((event.request.url).includes("perpustakaan") || (event.request.url).includes("media")) {
		event.respondWith(
			caches.open("ang-pwa").then(async function(cache) {
				const response = await cache.match(event.request);
				cache.addAll([event.request.url]);
				if (response) {
					return response;
				}
				return fetch(event.request);
			})
		);
	}
});
