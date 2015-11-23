// npm install --save-dev gulp gulp-plumber gulp-watch gulp-minify-css gulp-uglify gulp-rename gulp-notify gulp-include gulp-sass

var gulp = require( 'gulp' ),
    plumber = require( 'gulp-plumber' ),
    watch = require( 'gulp-watch' ),
    minifycss = require( 'gulp-minify-css' ),
    uglify = require( 'gulp-uglify' ),
    rename = require( 'gulp-rename' ),
    notify = require( 'gulp-notify' ),
    include = require( 'gulp-include' ),
    sass = require( 'gulp-sass' );

var onError = function( err ) {
    console.log( 'An error occurred:', err.message );
    this.emit( 'end' );
}

var paths = {
    /* Source paths */
    styles: ['./sass/*'],
    scripts: [
        './src/js/*',
        './src/vendor/js/*'
    ],
    images: ['./src/images/**/*'],
    fonts: [
        './src/fonts/*',
        './src/vendor/fonts/*'
    ],

    /* Output paths */
    stylesOutput: './css',
    scriptsOutput: './assets/js',
    imagesOutput: './assets/images',
    fontsOutput: './assets/fonts'
};

gulp.task( 'sass', function() {
    return gulp.src( paths.styles, {
        style: 'expanded'
    } )
    .pipe( plumber( { errorHandler: onError } ) )
    .pipe( sass() )
    .pipe( gulp.dest( paths.stylesOutput ) )
    .pipe( minifycss() )
    .pipe( rename( { suffix: '.min' } ) )
    .pipe( gulp.dest( paths.stylesOutput ) )
    .pipe( notify( { message: 'Styles task complete' } ) )
} );

gulp.task( 'watch', function() {
    gulp.watch( paths.styles, [ 'sass' ] );
} );

gulp.task( 'default', [ 'sass', 'watch' ], function() {

} )