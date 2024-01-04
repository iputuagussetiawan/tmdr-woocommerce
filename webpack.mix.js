const mix = require('laravel-mix');

mix.sass('source/scss/layout.scss', 'assets/css/')
    .sass('source/scss/pages/login.scss', 'assets/css/pages/')
    .sass('source/scss/pages/register.scss', 'assets/css/pages/')
    .sass('source/scss/pages/myaccount.scss', 'assets/css/pages/')
    .sass('source/scss/pages/shop.scss', 'assets/css/pages/')
    .sourceMaps(true, 'source-map');

mix.js('source/js/layout.js', 'assets/js/')
    .js('source/js/pages/login.js', 'assets/js/pages/')
    .js('source/js/pages/register.js', 'assets/js/pages/')
    .js('source/js/pages/myaccount.js', 'assets/js/pages/')
    .js('source/js/pages/shop.js', 'assets/js/pages/')
    .sourceMaps(true, 'source-map');

// Wordpress Custom Admin Login CSS
mix.sass('source/scss/tmdr-admin.scss', 'assets/css/')
    .sourceMaps(true, 'source-map');


mix.options({
    processCssUrls: false, // Process/optimize relative stylesheet url()'s. Set to false, if you don't want them touched.
});

// mix.disableNotifications()