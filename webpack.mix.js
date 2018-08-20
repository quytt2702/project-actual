let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix

  // Disable Notification
  .disableNotifications()

  // .styles([
  //   'public/template/bootstrap/dist/css/bootstrap.min.css',
  //   'public/template/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css',
  //   'public/template/plugins/bower_components/toast-master/css/jquery.toast.css',
  //   'public/template/plugins/bower_components/morrisjs/morris.css',
  //   'public/template/plugins/bower_components/chartist-js/dist/chartist.min.css',
  //   'public/template/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css',
  //   'public/template/plugins/bower_components/calendar/dist/fullcalendar.css',
  //   'public/template/css/animate.css',
  //   'public/template/css/style.css',
  // ], 'public/bundled/layout.css')

  // .scripts([
  //     'public/template/plugins/bower_components/jquery/dist/jquery.min.js',
  //     'public/template/bootstrap/dist/js/bootstrap.min.jss',
  //     'public/template/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js',
  //     'public/template/js/jquery.slimscroll.js',
  //     'public/template/js/waves.js',
  //     'public/template/plugins/bower_components/waypoints/lib/jquery.waypoints.js',
  //     'public/template/plugins/bower_components/counterup/jquery.counterup.min.js',
  //     'public/template/plugins/bower_components/raphael/raphael-min.js',
  //     'public/template/plugins/bower_components/morrisjs/morris.js',
  //     'public/template/plugins/bower_components/chartist-js/dist/chartist.min.js',
  //     'public/template/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js',
  //     'public/template/plugins/bower_components/moment/moment.js',
  //     'public/template/plugins/bower_components/calendar/dist/fullcalendar.min.js',
  //     'public/template/plugins/bower_components/calendar/dist/cal-init.js',
  //     'public/template/js/custom.min.js',
  //     'public/template/js/cbpFWTabs.js',
  //     'public/template/plugins/bower_components/toast-master/js/jquery.toast.js',
  //     'public/template/plugins/bower_components/styleswitcher/jQuery.style.switcher.js',
  //     'public/js/general.js'
  // ], 'public/bundled/all.js')

  .js('resources/assets/js/app.js', 'public/bundled/app.js')
  .sass('resources/assets/sass/app.scss', 'public/bundled/app.css')

  // Asset for landing pages
  .sass('resources/assets/sass/landing-pages/index.scss', 'public/bundled/landing-pages.css')

  .sass('resources/assets/sass/ecommerce.scss', 'public/bundled/ecommerce.css')

  // Versioning
  .version()

  ;
