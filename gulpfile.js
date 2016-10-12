var gulp = require('gulp'),
    gutil = require('gulp-util'),
    sass = require('gulp-sass'),
    browserSync = require('browser-sync').create(),
    autoprefixer = require('gulp-autoprefixer'),
    uglify = require('gulp-uglify'),
    header  = require('gulp-header'),
    rename = require('gulp-rename'),
    cssnano = require('gulp-cssnano'),
    plumber = require('gulp-plumber'),
    concat = require('gulp-concat'),
    package = require('./package.json');

var scripts = [
  'node_modules/parsleyjs/dist/parsley.js',
  'node_modules/parsleyjs/dist/i18n/id.js',
  'node_modules/jquery.maskedinput/src/jquery.maskedinput.js'
];

var adminScripts = [
  'node_modules/parsleyjs/dist/parsley.js',
  'node_modules/parsleyjs/dist/i18n/id.js',
  'node_modules/datatables.net/js/jquery.dataTables.js',
  'public/assets/vendor/datatables/dataTables.bootstrap.js'
];

var banner = [
  '/*!\n' +
  ' * <%= package.name %>\n' +
  ' * <%= package.title %>\n' +
  ' * <%= package.url %>\n' +
  ' * @author <%= package.author %>\n' +
  ' * @version <%= package.version %>\n' +
  ' * Copyright ' + new Date().getFullYear() + '. <%= package.license %> licensed.\n' +
  ' */',
  '\n'
].join('');

gulp.task('css', function () {
  gulp.src('public/assets/scss/style.scss')
    .pipe(plumber(function(error){
      gutil.log(gutil.colors.red(error.message));
      this.emit('end');
    }))
    .pipe(sass({errLogToConsole: true}))
    .pipe(autoprefixer('last 4 version'))
    .pipe(gulp.dest('public/assets/css'))
    // .pipe(cssnano())
    // .pipe(rename({ suffix: '.min' }))
    // .pipe(header(banner, { package : package }))
    // .pipe(gulp.dest('app/assets/css'))
    .pipe(browserSync.reload({stream:true}));

    gulp.src('public/assets/scss/admin.scss')
    .pipe(plumber(function(error){
      gutil.log(gutil.colors.red(error.message));
      this.emit('end');
    }))
    .pipe(sass({errLogToConsole: true}))
    .pipe(autoprefixer('last 4 version'))
    .pipe(gulp.dest('public/assets/css'))
    // .pipe(cssnano())
    // .pipe(rename({ suffix: '.min' }))
    // .pipe(header(banner, { package : package }))
    // .pipe(gulp.dest('app/assets/css'))
    .pipe(browserSync.reload({stream:true}));
});

gulp.task('js',function(){
  gulp.src('src/js/scripts.js')
    .pipe(plumber())
    //.pipe(jshint('.jshintrc'))
    //.pipe(jshint.reporter('default'))
    .pipe(header(banner, { package : package }))
    .pipe(gulp.dest('app/assets/js'))
    .pipe(uglify())
    .pipe(header(banner, { package : package }))
    .pipe(rename({ suffix: '.min' }))
    .pipe(gulp.dest('app/assets/js'))
    .pipe(browserSync.stream());
});

gulp.task('scripts', function() {
  gulp.src(scripts)
    .pipe(concat('all.js'))
    .pipe(gulp.dest('public/assets/js'))
    .pipe(uglify())
    .pipe(rename({ suffix: '.min' }))
    .pipe(gulp.dest('public/assets/js'));

  gulp.src(adminScripts)
    .pipe(concat('admin.js'))
    .pipe(gulp.dest('public/assets/js'))
    .pipe(uglify())
    .pipe(rename({ suffix: '.min' }))
    .pipe(gulp.dest('public/assets/js'))
});

gulp.task('browser-sync', function() {
  browserSync.init({
    proxy: "localhost/daftar-amcc/public"
  });
});

gulp.task('bs-reload', function () {
  browserSync.reload();
});

gulp.task('default', ['css', 'scripts', 'browser-sync'], function () {
  gulp.watch("public/assets/scss/**/*.scss", ['css']);
  //gulp.watch("src/js/*.js", ['js']);
  gulp.watch("app/**/*.php", ['bs-reload']);
});
