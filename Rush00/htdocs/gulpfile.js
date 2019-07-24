/*
 * Gulpfile
 */

// Load plugins
var gulp         = require('gulp');
var stylus       = require('gulp-stylus');
var autoprefixer = require('gulp-autoprefixer');
var cleanCSS     = require('gulp-clean-css');
var uglify       = require('gulp-uglify');
var rename       = require('gulp-rename');
var util         = require('gulp-util');

// Paths
var sourcePath = 'resources';
var distPath = 'resources';
var paths = {
    styles: sourcePath + '/styles',
    scripts: sourcePath + '/scripts',
};

// Styles
gulp.task('styles', function() {
    return gulp.src(paths.styles + '/*.styl')
        .pipe(stylus())
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(cleanCSS({
            advanced: false,
            keepSpecialComments: '*'
        }))
        .pipe(rename('style.css'))
        .pipe(gulp.dest(distPath));
});


// Styles from external lib (pikaday for example)
gulp.task('external-css', function() {
    return gulp.src(paths.styles + '/*.css')
        .pipe(cleanCSS({
            advanced: false,
            keepSpecialComments: '*'
        }))
        .pipe(rename('style.css'))
        .pipe(gulp.dest(distPath));
});

// Scripts
gulp.task('scripts', function() {
    return gulp.src(paths.scripts + '/**/*.js')
        .pipe(uglify())
        .pipe(rename({ suffix: '.min' }))
        .pipe(gulp.dest(distPath + '/js'));
});

// Watch
gulp.task('watch', function() {
    gulp.watch(paths.styles + '/**/*.styl', gulp.series('styles'));
    gulp.watch(paths.scripts + '/**/*.js', gulp.series('scripts'));
});

// Default
gulp.task(
    'default',
    gulp.series(
        gulp.parallel('watch','styles', 'scripts')
    )
);

// Build: one shot
gulp.task(
    'build',
    gulp.parallel('styles', 'scripts')
);
