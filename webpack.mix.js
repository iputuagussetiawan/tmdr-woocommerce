const mix = require('laravel-mix');

mix.sass('source/scss/layout.scss', 'assets/css/')
    .sourceMaps(true, 'source-map');

mix.js('source/js/layout.js', 'assets/js/')
    .sourceMaps(true, 'source-map');

// Wordpress Custom Admin Login CSS
mix.sass('source/scss/tmdr-admin.scss', 'assets/css/')
    .sourceMaps(true, 'source-map');


mix.options({
    processCssUrls: false, // Process/optimize relative stylesheet url()'s. Set to false, if you don't want them touched.
});

// mix.disableNotifications()