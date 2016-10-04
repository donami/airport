var gulp = require('gulp');
var sass = require('gulp-sass');

gulp.task('build-sass', function() {
  return gulp.src('scss/**/*.scss')
    .pipe(sass({indentedSyntax: true}).on('error', sass.logError))
    .pipe(gulp.dest('public/css'));
});

gulp.task('watch', function() {
  gulp.watch('scss/**/*.scss', ['build-sass']);
});

gulp.task('default', ['watch']);
