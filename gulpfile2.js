var gulp = require('gulp');
var shell = require('gulp-shell');
var elixir = require('laravel-elixir');
// var del = require('del');
var themeInfo = require('./theme.json');

process.env.DISABLE_NOTIFIER = true;

elixir.config.publicPath = 'assets';
elixir.config.sourcemaps = true;

var publicPath = '../../public';
var themePath = publicPath + '/themes/' + themeInfo.name.toLowerCase();
var cssPath = themePath + '/css';
var jsPath =  themePath + '/js';

var Task = elixir.Task;

// elixir.extend('del', function(path) {
//     new Task('del', function() {
//         return del(path, {force:true});
//     });
// });

elixir.extend('stylistPublish', function() {
    new Task('stylistPublish', function() {
        return gulp.src("").pipe(shell("php ../../artisan stylist:publish " + themeInfo.name));
    });
});

elixir(function (mix) {

    // mix.del(['assets/css', 'assets/js']);
    // mix.del(themePath+'/**');

    mix.sass(
        'styles.scss', 'resources/assets/css/styles.css'
    );

    mix.styles([
        'bootstrap.css',
        'font-awesome.css',
        'icomoon.css',
        'styles.css'
    ],'resources/assets/css/style.min.css');

    mix.scripts([
        'jquery.js'
    ], 'resources/assets/js/jquery.min.js');

    mix.scripts([
        'bootstrap.js',
        'slimmenu.js',
        'dropit.js',
        'icheck.js',
        '../vendor/jquery-unveil/jquery.unveil.min.js',
        '../vendor/smartmenus/dist/jquery.smartmenus.js'
    ], 'resources/assets/js/vendor.min.js');

    mix.scripts([
        'bootstrap-datepicker.js',
        'datepicker-locales/bootstrap-datepicker.tr.min.js',
        'bootstrap-timepicker.js'
    ], 'resources/assets/js/datetime.min.js');

    mix.scripts([
        '../vendor/vue/dist/vue.min.js',
        '../vendor/axios/dist/axios.min.js',
        '../vendor/gasparesganga-jquery-loading-overlay/dist/loadingoverlay.min.js'
    ], 'resources/assets/js/contact.min.js');

    mix.scripts([
        'custom.js'
    ], 'resources/assets/js/custom.min.js');

    mix.copy('resources/assets', 'assets');

    mix.version([
        'css/style.min.css',
        'js/datetime.min.js',
        'js/vendor.min.js',
        'js/contact.min.js',
        'js/custom.min.js'
    ],'assets');

    mix.stylistPublish();

});
