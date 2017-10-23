'use strict';
 
var gulp = require('gulp');
var sass = require('gulp-sass');
var browserSync = require('browser-sync').create();

// Enter URL of your local server here
// Example: 'http://localwebsite.dev'
var URL = 'http://plugintesti.dev/';
 
gulp.task('sass', function () {
  return gulp.src('./styles/sass/*.sass')
    .pipe(sass.sync().on('error', sass.logError))
    .pipe(gulp.dest('./styles/css'))
	.pipe(browserSync.reload({
		stream: true
	}));
});
 
gulp.task('watch', ['browserSync', 'sass'], function () {
	gulp.watch('./styles/sass/*.sass', ['sass']);
	gulp.watch('**/*.php', browserSync.reload); 
	//gulp.watch('app/js/**/*.js', browserSync.reload); 
});

gulp.task('browserSync', function() {
  browserSync.init({
    //server: {
    //  baseDir: 'http://plugintesti.dev'
    //},
    proxy: URL,
  })
})
