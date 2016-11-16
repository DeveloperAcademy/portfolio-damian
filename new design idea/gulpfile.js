var gulp = require('gulp');
var browserSync = require('browser-sync');
var sass = require('gulp-sass');

gulp.task('reload', function() {

	browserSync.reload();

});

gulp.task('serve', ['sass'], function() {

	browserSync({
		server:'portfolio'
	});

	gulp.watch('portfolio/*.html', ['reload']);
	gulp.watch('portfolio/scss/**/*.scss', ['sass']);
});

gulp.task('sass', function() {

	return gulp.src('portfolio/scss/**/*.scss')	
		   .pipe(sass().on('error', sass.logError))
		   .pipe(gulp.dest('portfolio/css'))
		   .pipe(browserSync.stream());      
});

gulp.task('default', ['serve'], function() {


});