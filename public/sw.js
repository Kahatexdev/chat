// In host's sw.js
<<<<<<< HEAD
importScripts('./js/wirechat/sw.js');

=======
importScripts('/js/wirechat/sw.js'); 
>>>>>>> 5aff95375d4f64bc33181b45c4eaedf34ea17bf1


// Example: Custom event listener in main SW
self.addEventListener('install', event => {
    console.log('Main Service Worker Installed');
    self.skipWaiting();
});

self.addEventListener('activate', event => {
    console.log('Main Service Worker Activated');
    event.waitUntil(self.clients.claim());
});
