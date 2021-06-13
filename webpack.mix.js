let mix = require('laravel-mix').mix;

const isProduction = process.env.NODE_ENV == "production" ? true : false;
const path = require('path');
let directory = path.basename(path.resolve(__dirname));

const source = 'Themes/' + directory;
const dist   = 'public/themes/' + directory.toLowerCase();
const asset  = source + '/assets';
const resource_asset = source + '/resources/assets';

mix.copy(`node_modules/bs-stepper/dist/css/bs-stepper.css`, resource_asset + '/css');

mix.copy(`${__dirname}/node_modules/jquery-mask-plugin/dist/jquery.mask.min.js`, resource_asset + '/js');

mix.copy('node_modules/vue/dist/vue.min.js', resource_asset + '/js');
mix.copy('node_modules/vue/dist/vue.js', resource_asset + '/js');
mix.copy('node_modules/axios/dist/axios.min.js', resource_asset + '/js');

mix.copy(`${__dirname}/node_modules/vue2-dropzone/dist/vue2Dropzone.js`, resource_asset + '/js');
mix.copy(`${__dirname}/node_modules/vue2-dropzone/dist/vue2Dropzone.min.css`, resource_asset + '/css');

mix.copyDirectory(`${__dirname}/node_modules/jssocials/dist`, resource_asset + '/vendor/jssocials');

// Sass Generate
if( ! isProduction) {
    mix
        .sourceMaps(true, 'source-map')
        .webpackConfig({devtool: 'source-map'});
}

mix
    .sass(source + '/resources/assets/sass/styles.scss', dist + '/css')
    .options({
        processCssUrls: false
    })

// Copy Directory to asset
mix.copyDirectory(resource_asset, dist);

mix.combine([
    resource_asset + '/plugins/revolution/css/settings.css',
    resource_asset + '/plugins/revolution/css/layers.css',
    resource_asset + '/plugins/revolution/css/navigation.css'
], dist + '/plugins/revolution/css/jquery.revolution.min.css');

mix.combine([
    resource_asset + '/plugins/revolution/js/jquery.themepunch.tools.min.js',
    resource_asset + '/plugins/revolution/js/jquery.themepunch.revolution.min.js',
    resource_asset + '/plugins/revolution/js/extensions/revolution.extension.actions.min.js',
    resource_asset + '/plugins/revolution/js/extensions/revolution.extension.carousel.min.js',
    resource_asset + '/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js',
    resource_asset + '/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js',
    resource_asset + '/plugins/revolution/js/extensions/revolution.extension.migration.min.js',
    resource_asset + '/plugins/revolution/js/extensions/revolution.extension.navigation.min.js',
    resource_asset + '/plugins/revolution/js/extensions/revolution.extension.parallax.min.js',
    resource_asset + '/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js',
    resource_asset + '/plugins/revolution.js/extensions/revolution.extension.video.min.js'
], dist + '/plugins/revolution/js/jquery.revolution.min.js');

mix.combine([
    resource_asset + '/js/bootstrap.js',
    resource_asset + '/js/dropit.js',
    resource_asset + '/js/icheck.js',
    resource_asset + '/js/magnific.js',
    resource_asset + '/js/jquery.unveil.js',

    'node_modules/smartmenus/dist/jquery.smartmenus.min.js'
], dist + '/js/vendor.min.js');

mix.combine([
    resource_asset + '/css/bootstrap.css',
    resource_asset + '/css/font-awesome.css',
    resource_asset + '/css/icomoon.css',
], dist + '/css/vendor.min.css');

mix.minify(dist + '/js/custom.js');

if ( isProduction )
{
    mix.version();
}

// Browser Sync
if( ! isProduction) {
    mix
        .browserSync(
        {
            proxy: 'aslanlarpetrol.test',
            files: [source + '/**/*.*']
        }
    );
}