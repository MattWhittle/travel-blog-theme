var gulp = require('gulp');
var $    = require('gulp-load-plugins')();
var browserSync = require('browser-sync');
var reload = browserSync.reload;

var sassPaths = [
  'bower_components/normalize.scss/sass',
  'bower_components/foundation-sites/scss',
  'bower_components/motion-ui/src'
];

gulp.task('sass', function() {
  return gulp.src('scss/app.scss')
    .pipe($.sass({
      includePaths: sassPaths,
      outputStyle: 'compressed' // if css compressed **file size**
    })
      .on('error', $.sass.logError))
    .pipe($.autoprefixer({
      browsers: ['last 2 versions', 'ie >= 9']
    }))
    .pipe(gulp.dest('css'));
});

var JSFiles = [
  './bower_components/foundation-sites/dist/js/foundation.min.js',
  './bower_components/what-input/dist/what-input.min.js'
];

gulp.task('moveJSFiles', function() {
  gulp.src(JSFiles, {})
    .pipe(gulp.dest('js/'));
});

gulp.task('browser-sync', function(){
  var files= [
    './styles.css',
    './*.php',
    './template-parts/*.php',
    './inc/*.php',
    './js/*.js',
    'css/app.css'
  ];

  //initializes browserSync

  browserSync.init(files, {
    proxy: "http://localhost/daniellesblog/",
    notify: false
  });
});

gulp.task('default', ['sass', 'browser-sync', 'moveJSFiles'], function() {
  gulp.watch(['scss/**/*.scss'], ['sass']);
});
