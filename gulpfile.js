const { src, dest, series, watch, parallel } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const imagemin = require('gulp-imagemin');
const webp = require('gulp-webp');
const concat = require('gulp-concat');

sass.compiler = require('node-sass');

// Utilidades css
const autoprefixer = require('autoprefixer');
const postcss = require('gulp-postcss');
const cssnano = require('cssnano');
const sourcemaps = require('gulp-sourcemaps');

// JS
const terser =  require('gulp-terser-js');


const paths = {
	imagenes: 'src/img/**/*',
	scss: 'src/scss/**/*.scss',
	js: 'src/js/**/*.js'
}




// Obtimiza el css
function css() {
	return src(paths.scss)
		.pipe(sourcemaps.init())
		.pipe(sass())
		.pipe(postcss([autoprefixer(), cssnano()]))
		.pipe(sourcemaps.write('.'))
		.pipe(dest("./public/build/css"))
}

// Optimiza las imaganes(las hace menos pesadas)
function imagenes() {
	return src(paths.imagenes)
		.pipe(imagemin()  )
		.pipe(dest("./public/build/img"));
}

// Creas versiones webp de algunas imaganes
function versionWebp(){
	return src(paths.imagenes)
		.pipe( webp() )
		.pipe(dest("./public/build/img"));
}


// funciones para javascript
function javascript(){
	return src(paths.js)
		.pipe(sourcemaps.init())
		.pipe(concat('bundle.js'))
		.pipe(terser())
		.pipe(sourcemaps.write('.'))
		.pipe(dest("./public/build/js"))
}

// Hace el complidado de scss y javascript
function watchArchivo(){
	watch(paths.scss, css);
	watch(paths.js, javascript);
}



exports.imagenes = imagenes;
exports.watchArchivo = watchArchivo;
exports.css = css;
exports.default = series(css, imagenes, javascript, versionWebp, watchArchivo );