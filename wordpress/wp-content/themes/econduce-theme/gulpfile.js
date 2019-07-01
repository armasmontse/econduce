var watch_scss_path = 'sass',
    main_scss_path = watch_scss_path + '/',
    main_js_path = './es6/',
    dist_js_path = 'js',
    bs_path = '/econduce/wordpress/';
/**
 * Required modules
 * @type {[]}
 */
var gulp = require('gulp');
var watch = require('gulp-watch');
var plumber = require("gulp-plumber");
var notify = require("gulp-notify");
var browserSync = require('browser-sync').create();
var gutil = require("gulp-util");
var rename = require("gulp-rename");

//Sass
var sass = require('gulp-sass'); 
//DESCOMENTAR CADA QUE SUBA 
//var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');

//JS
var babel = require("gulp-babel");
var webpack = require("webpack");
var webpackConfig = require('./webpack.config')(main_js_path, dist_js_path);
var concat = require('gulp-concat');
var minify = require('gulp-minify');


gulp.task('build-libs', function () {
  //axios, promise polyfill y  ramda 
  gulp.src([
    './node_modules/ramda/dist/ramda.min.js',
    './node_modules/es6-promise/dist/es6-promise.min.js',
    './node_modules/es6-promise/dist/es6-promise.auto.min.js',
    './node_modules/axios/dist/axios.min.js',
  ])
  .pipe(concat('libs.js')).pipe(gulp.dest('./js/'));

  //gsap
  gulp.src([
    main_js_path + 'gsap/TweenLite.js',
    main_js_path + 'gsap/TweenMax.js',
    main_js_path + 'gsap/TimelineMax.js',
  ])
  .pipe(concat('gsap.js'))
  .pipe(minify({
    mangle:false,
    ext: {
      src:'.js',
      min:'.min.js'
    }
  }))
  .pipe(gulp.dest('./js/'))
});



//sass and js sourcemaps
var sourcemaps = require('gulp-sourcemaps');

gulp.task('sass', function(){
  gulp.src(main_scss_path + 'mazorca.scss')
    .pipe(plumber({
        errorHandler: notify.onError({
          icon: './screenshot.png',
          message: "on line <%= error.message.split('on line')[1] %>",
          title: "Sass Error"
        })
      })
    )
    .pipe(sourcemaps.init())
    .pipe(sass({
      outputStyle: 'compressed'
    })) // Using gulp-sass
    .pipe(rename("mazorca.css"))
    .pipe(notify('Mazorca ha sido compilado'))
    .pipe(autoprefixer({
      browsers: ['last 8 versions'],
      cascade: false
    }))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('./css'))
    .pipe(browserSync.reload({stream:true}));
});

gulp.task('webpack', function(callback) {
  var myConfig = Object.create(webpackConfig);
  myConfig.plugins = [
    new webpack.optimize.DedupePlugin(),
    new webpack.optimize.UglifyJsPlugin({ compress: {
                warnings: false
            },
            mangle: false
          })
  ];

  // run webpack
  webpack(myConfig, function(err, stats) {
    if (err) throw new gutil.PluginError('webpack', err);
    gutil.log('[webpack]', stats.toString({
      colors: true,
      progress: true
    }));
    callback();
  });
});

gulp.task('browser-sync', function() {
  browserSync.init(['./style.css'],{ //files to inject
     proxy: "localhost:8888" + bs_path,
     port:4000
  });
});


gulp.task('watch', ['browser-sync', 'sass', 'webpack'], function() {
  gulp.watch(watch_scss_path + '/**/*.scss', ['sass']);
  gulp.watch(main_js_path + '/**/*.js', ['webpack']);
  gulp.watch(dist_js_path + '/*.js', browserSync.reload);
  gulp.watch('./**/*.php', browserSync.reload);
});
