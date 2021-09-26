var CACHE_NAME = 'my-site-cache-v1';
var urlsToCache = [
    '/',
    // '/wp-content/uploads/2021/09/mColeccionX_21.mp4',
    // '/wp-content/uploads/2021/09/wColeccionX_65.jpg',
    // '/assets/js/jquery.js',
    // '/assets/js/popper.min.js',
     '/assets/js/bootstrap.min.js',
    // '/assets/js/main.min.js?v=0.14',
    // '/assets/css/main.min.css?v=0.10',
    // '/assets/css/bootstrap.min.css',
    // '/assets/css/style.min.css?v=0.24'
];
self.addEventListener('install', function(event) {
    // Perform install steps
    event.waitUntil(
      caches.open(CACHE_NAME)
        .then(function(cache) {
          console.log('Opened cache');
          return cache.addAll(urlsToCache);
        })
    );
  });
  self.addEventListener('fetch', function(event) {
    event.respondWith(
      caches.match(event.request)
        .then(function(response) {
          // Cache hit - return response
          if (response) {
            return response;
          }
  
          return fetch(event.request).then(
            function(response) {
              // Check if we received a valid response
              if(!response || response.status !== 200 || response.type !== 'basic') {
                return response;
              }
  
              // IMPORTANT: Clone the response. A response is a stream
              // and because we want the browser to consume the response
              // as well as the cache consuming the response, we need
              // to clone it so we have two streams.
              var responseToCache = response.clone();
  
              caches.open(CACHE_NAME)
                .then(function(cache) {
                  cache.put(event.request, responseToCache);
                });
  
              return response;
            }
          );
        })
      );
  });
  self.addEventListener('activate', function(event) {

    var cacheAllowlist = ['pages-cache-v1', 'blog-posts-cache-v1'];
  
    event.waitUntil(
      caches.keys().then(function(cacheNames) {
        return Promise.all(
          cacheNames.map(function(cacheName) {
            if (cacheAllowlist.indexOf(cacheName) === -1) {
              return caches.delete(cacheName);
            }
          })
        );
      })
    );
  });
  self.addEventListener('push', function (event) {


    const payload = event.data ? event.data.text() : 'no payload';


    event.waitUntil(


        self.registration.showNotification('Legend', {
            body: payload,
            icon: '/assets/android-icon-192x192.png',
            vibrate: [200, 100, 200, 100, 200, 100, 200],
            tag: 'vibration-sample'
        })
    );
});