const mix_ = require('laravel-mix');


mix_.setPublicPath('./dist')
  .js('./assets/js/_main.js', 'js/main.min.js')
  .less('assets/less/main.less', 'css/main.min.css')
  .options({
    processCssUrls: false
  })
  .copy('./assets/img/*', 'dist/css/img/')
  .copy('./node_modules/bootstrap/fonts/*', 'dist/fonts/')
  .styles('assets/css/editor-style.css', 'dist/css/editor-style.css');


if (mix_.inProduction()) {
  mix_.version();
} else {
  mix_.sourceMaps();
}
