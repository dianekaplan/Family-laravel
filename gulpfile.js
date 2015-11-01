var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {

 //this will generate app.css
 mix.sass('app.scss', 'resources/css');
 //mix.sass('app.scss').scripts();  //can also add them all together like that

 //the second argument is the output file, if you leave it NULL it makes css/all.css
 //the third argument here is the base directory where  we're looking.  resources/assets is the default, but we want public/css
 //mix.styles([
 //'vendor/normalize.css', 'app.css'], 'public/output/final.css', 'public/css');

 //this uses app.css that's created above
 //it will make all.css
 mix.styles([
     //'newribbon_styles.css', //has newribbon colors
     'libs/bootstrap.min.css',  //has navbar, rounded corners
     'app.css', //has spacing at the top of the page, it also changed the display for h3 and has glyphicon stuff- more bootstrap
     //'libs/select2.min.css', //this has the nicer styles for tag selection
     'new.css', //has gallery styles for image display
     'newribbon_styles.css' //has newribbon colors- having it last in the list makes it win conflicts

     ], 'public/css', 'resources/css');

 //
 //'vendor/normalize.css', 'app.css'], null, 'public/css');


 //assumes resources/js (but you can modify the third argument to set it)
    mix.scripts([
        'libs/jquery.js',
        'libs/select2.min.js',
        'libs/bootstrap.min.js'
        //'libs/jquery.min.js'  //from cloudflare, but including it made a bug during 24
    ], 'public/js', 'resources/js');

    //jquery.min.js, bootstrap.min.js, and select2.min.js are from cloudflare
    //jquery.js is from jquery.com

mix.phpUnit();

 mix.version('public/css/all.css');

    //in case you're tempted to try again, adding this for js made a bad error, so it's not right to have both
    //mix.version('public/js/all.js');

});
