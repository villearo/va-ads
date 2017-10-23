'use strict';
 
var gulp = require('gulp');
var sass = require('gulp-sass');
 
gulp.task('sass', function () {
  return gulp.src('./styles/sass/*.sass')
    .pipe(sass.sync().on('error', sass.logError))
    .pipe(gulp.dest('./styles/css'));
});
 
gulp.task('watch', function () {
  gulp.watch('./styles/sass/*.sass', ['sass']);
});
