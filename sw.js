
const CACHE_NAME = "photo-cache-v1";

const FILES = [
    "./",
    "./index.html",
    "./style.css",
    "./manifest.json"
];

// Install Service Worker
self.addEventListener("install", function(event) {

    event.waitUntil(
        caches.open(CACHE_NAME)
        .then(function(cache) {
            return cache.addAll(FILES);
        })
    );

});

// Fetch Cached Files
self.addEventListener("fetch", function(event) {

    event.respondWith(
        caches.match(event.request)
        .then(function(response) {

            return response || fetch(event.request);

        })
    );

});
