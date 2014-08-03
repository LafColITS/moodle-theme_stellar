var gulp    = require('gulp'),
    jshint  = require('gulp-jshint'),
    phplint = require('phplint'),
    less    = require('gulp-less');

// PHP lint theme files.
gulp.task('phplint', function() {
  return phplint(['*.php', './layout/**/*.php', './lang/**/*.php']);
});

// Compile CSS from LESS files.
gulp.task('styles', function() {
  return gulp.src('./less/stellar.less')
    .pipe(less())
    .pipe(gulp.dest('./style/'));
});

// Lint JS.
gulp.task('scripts', function() {
  return gulp.src('./gulpfile.js')
    .pipe(jshint())
    .pipe(jshint.reporter('default'));
});

// Watch.
gulp.task('watch', function() {
  gulp.watch('./less/**/*.less', ['styles']);
  gulp.watch(['*.php', './layout/**/*.php', './lang/**/*.php'], ['phplint']);
  gulp.watch('./gulpfile.js', ['scripts']);
});
