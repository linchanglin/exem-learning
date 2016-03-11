var gulp = require('gulp');
var elixir = require('laravel-elixir');

/**
 * Copy any needed files.
 *
 * Do a 'gulp copyfiles' after bower updates
 */
gulp.task("copyfiles", function() {

    gulp.src("vendor/bower_dl/jquery/dist/jquery.min.js")
        .pipe(gulp.dest("resources/assets/js/"));

    gulp.src("vendor/bower_dl/bootstrap/dist/js/bootstrap.min.js")
        .pipe(gulp.dest("resources/assets/js/"));

    gulp.src("vendor/bower_dl/bootstrap/dist/css/bootstrap.min.css")
        .pipe(gulp.dest("resources/assets/sass/"));

    gulp.src("vendor/bower_dl/bootstrap/dist/css/bootstrap-theme.min.css")
        .pipe(gulp.dest("resources/assets/sass/"));

    gulp.src("vendor/bower_dl/bootstrap/dist/fonts/**")
        .pipe(gulp.dest("public/assets/fonts"));


    //select2 的迁移
    gulp.src("vendor/bower_dl/select2-4.0.1/dist/css/select2.min.css")
        .pipe(gulp.dest("resources/assets/sass/"));

    gulp.src("vendor/bower_dl/select2-4.0.1/dist/js/select2.min.js")
        .pipe(gulp.dest("resources/assets/js/"));

});

/**
 * Default gulp is to run this elixir stuff
 */
elixir(function(mix) {

    //添加单元测试
    mix.phpUnit();



    // Combine scripts
    mix.scripts([
            'js/jquery.min.js',
            'js/bootstrap.min.js',
            'js/select2.min.js',
        ],
        'public/assets/js/all.js', 'resources/assets');

    // Compile CSS
    mix.sass([
            'bootstrap.min.css',
            'bootstrap-theme.min.css',
            'select2.min.css',
        ],
        'public/assets/css/all.css', 'resources/assets');

    mix.sass([
            'app.scss',
        ],
        'public/assets/css/app.css', 'resources/assets');


    mix.scripts([
            'js/questionSelects.js',
        ],
        'public/assets/js/questionSelects.js', 'resources/assets');

});