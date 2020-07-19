'use strict';

const gulp      = require('gulp'),
    shell       = require('gulp-shell'),
    sass        = require('gulp-sass'),
    clean       = require('gulp-clean'),
    del         = require('del'),
    concat      = require('gulp-concat'),
    concatCss   = require('gulp-concat-css'),
    browserSync = require('browser-sync').create(),
    sourcemaps  = require('gulp-sourcemaps'),
    minify      = require('gulp-minify'),
    less        = require('gulp-less'),
    cleanCSS   = require('gulp-clean-css'),
    merge       = require('merge-stream'),
    themeInfo   = require('./theme.json');

let path, theme, assets, resource = {};

path = {
    "public"      : "../../public",
    "theme"       : "../../public/themes/" + themeInfo.name.toLowerCase(),
    "assets"      : "assets",
    "resource"    : "resources",
    "css"         : "/css",
    "js"          : "/js",
    "sass"        : "/sass",
    "video"       : "/videos",
    "image"       : "/img",
    "vendor"      : "/vendor",
    "maps"        : "../maps",
    "plugins"     : "/plugins"
};

theme = {
    "name"      : themeInfo.name,
    "path"      : path.theme,
    "js"        : path.theme + path.js,
    "css"       : path.theme + path.css,
    "maps"      : path.maps
};

assets = {
    "path"      : path.assets,
    "css"       : path.assets + path.css,
    "js"        : path.assets + path.js,
    "image"     : path.assets + path.image,
    "video"     : path.assets + path.video,
    "vendor"    : path.assets + path.vendor,
    "plugins"   : path.assets + path.plugins,
    "maps"      : path.maps
};

resource = {
    "path"      : path.resource,
    "vendor"    : path.resource + path.vendor,
    "extVendor" : path.resource + '/ext-vendor',
    "assets"    : path.resource + '/' + path.assets
};

resource.asset = {
    "css"       : resource.assets + path.css,
    "js"        : resource.assets + path.js,
    "image"     : resource.assets + path.image,
    "video"     : resource.assets + path.video,
    "vendor"    : resource.assets + path.vendor,
    "sass"      : resource.assets + path.sass,
    "plugins"   : resource.assets + path.plugins,
    "maps"      : path.maps
};

function cleanTask() {
    return del(assets.path+"/**/*");
}

function cleanFile(file) {
    return del(file);
}

function buildSass(dest='') {
    return gulp.src([
        resource.asset.sass + '/**/*.scss'
    ])
        .pipe(sourcemaps.init({ loadMaps: true }))
        .pipe(sass.sync({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(sourcemaps.write(resource.asset.maps))
        .pipe(gulp.dest(dest ? dest : resource.asset.css))
        .pipe(browserSync.reload({
            stream: true
        }));
}

function combineCSS() {
    return gulp.src([
        resource.asset.css + '/bootstrap.css',
        resource.asset.css + '/font-awesome.css',
        resource.asset.css + '/icomoon.css',
        resource.asset.css + '/styles.css'
    ])
        .pipe(concatCss('style.min.css'))
        .pipe(cleanCSS())
        .pipe(gulp.dest(resource.asset.css));
}

function combineCSSRevSlider() {
    return gulp.src([
        resource.asset.plugins + '/revolution/css/settings.css',
        resource.asset.plugins + '/revolution/css/layers.css',
        resource.asset.plugins + '/revolution/css/navigation.css'
    ])
        .pipe(concatCss('jquery.revolution.min.css'))
        .pipe(cleanCSS())
        .pipe(gulp.dest(resource.asset.plugins + '/revolution/css'));
}

function combineScriptsRevSlider() {
    return gulp.src([
        resource.asset.plugins + '/revolution/js/jquery.themepunch.tools.min.js',
        resource.asset.plugins + '/revolution/js/jquery.themepunch.revolution.min.js',
        resource.asset.plugins + '/revolution/js/extensions/revolution.extension.actions.min.js',
        resource.asset.plugins + '/revolution/js/extensions/revolution.extension.carousel.min.js',
        resource.asset.plugins + '/revolution/js/extensions/revolution.extension.kenburn.min.js',
        resource.asset.plugins + '/revolution/js/extensions/revolution.extension.layeranimation.min.js',
        resource.asset.plugins + '/revolution/js/extensions/revolution.extension.migration.min.js',
        resource.asset.plugins + '/revolution/js/extensions/revolution.extension.navigation.min.js',
        resource.asset.plugins + '/revolution/js/extensions/revolution.extension.parallax.min.js',
        resource.asset.plugins + '/revolution/js/extensions/revolution.extension.slideanims.min.js',
        resource.asset.plugins + '/revolution.js/extensions/revolution.extension.video.min.js'
    ])
        .pipe(concat('jquery.revolution.min.js'))
        .pipe(gulp.dest(resource.asset.plugins + '/revolution/js'));
}

function minifyVendors(dest='') {
    return gulp.src([
        resource.asset.js + '/bootstrap.js',
        resource.asset.js + '/dropit.js',
        resource.asset.js + '/icheck.js',
        resource.asset.js + '/magnific.js',
        resource.asset.vendor + '/jquery-unveil/jquery.unveil.min.js',
        resource.asset.vendor + '/smartmenus/dist/jquery.smartmenus.js'
    ])
        .pipe(concat('vendor.js'))
        .pipe(minify({
            ext: {
                min: '.min.js'
            }
        }))
        .pipe(gulp.dest(dest ? dest : resource.asset.js));
}

function copyResourceToAssets() {
    return gulp.src(resource.assets+"/**/*")
        .pipe(gulp.dest(assets.path));
}

function minifyScripts(dest='') {
    return gulp.src(resource.asset.js+'/custom.js')
        .pipe(minify({
            ext: {
                min: '.min.js'
            }
        }))
        .pipe(gulp.dest(dest ? dest : resource.asset.js));
}

function stylistPublish() {
    return gulp.src("").pipe(shell("php ../../artisan stylist:publish " + theme.name));
}

gulp.task('vendor', function deployVendor() {
   Promise.all([
       combineCSSRevSlider(),
       combineScriptsRevSlider(),
   ]);
});

gulp.task('deploy', function deployTask() {
    return cleanTask().then(function(){
        Promise.all([
            buildSass(),
            combineCSS(),
            minifyVendors(),
            minifyScripts(),
            copyResourceToAssets()
        ]).then(function () {
            setTimeout(stylistPublish, 5000);
        });
    });
});

gulp.task('sass-public', function () {
    return buildSass(theme.css);
});

function scriptsCopyToThemeFolder() {
    return gulp.src(resource.asset.js+'/**/*')
        .pipe(gulp.dest(theme.js))
        .pipe(browserSync.reload({
            stream: true
        }));
}

gulp.task('script-public', function(){
    return cleanFile(resource.asset.js+'/custom.min.js', {force:true}).then(function(){
        Promise.all([
            minifyScripts(theme.js),
            setTimeout(scriptsCopyToThemeFolder, 3000)
        ])
    });
});


//Live Reload
var proxyServer = "http://dev.arslanlar.com";
var arrAddFiles = [
    '**/*.php'
];

gulp.task('browser-sync', function() {
    browserSync.init({
        proxy: proxyServer,
        files: arrAddFiles,
        ghostMode: {
            clicks: true,
            location: true,
            forms: true,
            scroll: true
        },
        notify: true,
        open: false
    });
});

gulp.task('watch', ['browser-sync'], function () {
    gulp.watch([resource.asset.sass + '/**/*.scss'], ['sass-public']);
    gulp.watch([resource.asset.js + '/**/*.js'], ['script-public']);
    gulp.watch('views/**/*.php', browserSync.reload);
});
