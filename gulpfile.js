"use strict";
//===========================================
var gulp = require('gulp'),
	autoprefixer = require('gulp-autoprefixer'),
	cleanCSS = require('gulp-clean-css'),
	imagemin = require('gulp-imagemin'),
	imageminPngquant = require('imagemin-pngquant'),
	rename = require("gulp-rename"),
	sass = require('gulp-sass'),
	sourcemaps = require('gulp-sourcemaps'),
	concat = require('gulp-concat'),
	order = require("gulp-order"),
	uglify = require('gulp-uglify'),
	spritesmith = require('gulp.spritesmith'),
	browserSync = require('browser-sync'),
	reload = browserSync.reload,
	notify = require("gulp-notify");
//===========================================
var buidPath = 'm88thems-wp/',
		proxyURL = 'wordpress.loc/',
		path = {
			build: {
				home: buidPath,
				php:  buidPath + '**/*.php',
				js:   buidPath + 'js/**/*.js',
				jsPath: buidPath + 'js/',
				jsLib: buidPath + 'js/lib/**/*.js',
				jsLibPath: buidPath + 'js/lib/',
				sass: buidPath + 'sass/**/*.+(sass|scss)',
				sassPath: buidPath + 'sass/',
				css:  buidPath + 'css/**/*.css',
				cssPath:  buidPath + 'css/',
				icon: buidPath + 'img/icons/*.+(png|jpg)',
				img:  buidPath + 'img/**/*.*',
				imgPath:  buidPath + 'img/',
				fonts:  buidPath + 'fonts/**/*.*'
			}
		};
// Server
//===========================================
gulp.task('webserver', function () {
	browserSync({
		proxy: proxyURL,
		online: true,
		host: 'localhost',
		logPrefix: "Frontend_Devil"
	});
});
// SASS/SCSS
// ===========================================
gulp.task('sass:build', function () {
	return gulp.src(path.build.sass)
		.pipe(sourcemaps.init())
		.pipe(sass().on("error", notify.onError()))
		.pipe(autoprefixer(['last 20 versions', '> 1%', 'ie > 8']))
		.pipe(rename(function (path) {
			path.extname = ".css"
		}))
		.pipe(sourcemaps.write())
		.pipe(gulp.dest(path.build.cssPath))
		.pipe(cleanCSS())
		.pipe(sourcemaps.write())
		.pipe(rename(function (path) {
			path.extname = ".min.css"
		}))
		.pipe(gulp.dest(path.build.cssPath))
		.pipe(reload({stream: true}));
});
// JavaScript
// ===========================================
gulp.task('js:build', function(){
	return gulp.src(path.build.jsLib)
		.pipe(order([
			'jquery.js',
			path.build.jsLib
		]))
		.pipe(sourcemaps.init())
		.pipe(concat('scripts.js'))
		.pipe(uglify())
		.pipe(rename(function (path) {
			path.extname = ".min.js"
		}))
		.pipe(sourcemaps.write())
		.pipe(gulp.dest(path.build.jsPath))
		.on('error', function(err) {
			console.error('Error in compress task', err.toString());
		});
});
gulp.task('jsMain:build', function(){
	return gulp.src(path.build.jsPath + 'main.js')
		.pipe(sourcemaps.init())
		.pipe(uglify())
		.pipe(rename(function (path) {
			path.extname = ".min.js"
		}))
		.pipe(sourcemaps.write())
		.pipe(gulp.dest(path.build.jsPath))
		.on('error', function(err) {
			console.error('Error in compress task', err.toString());
		});
});
// Img min / sprite
// ===========================================
gulp.task('sprite:build', function () {
	var spriteData = gulp.src(path.build.icon)
		.pipe(spritesmith({
			imgName: 'sprite.png',
			cssName: '_sprite.scss',
			algorithm: 'diagonal',
			imgPath: '../img/sprite.png'
		}))
	spriteData.img.pipe(gulp.dest(path.build.imgPath));
	spriteData.css.pipe(gulp.dest(path.build.sassPath));
});
gulp.task('img:build', function () {
		gulp.src(path.build.img)
		.pipe(imagemin({
			progressive: true,
			svgoPlugins: [{removeViewBox: false}],
			use: [imageminPngquant()],
			interlaced: true
		}))
		.pipe(gulp.dest(path.build.img))
		.pipe(reload({stream: true}));
});
// Watch
// ===========================================
gulp.task('watch', function () {
	gulp.watch(path.build.php).on('change', browserSync.reload);
	gulp.watch(path.build.fonts).on('change', browserSync.reload);
	gulp.watch(path.build.img, ['img:build']);
	gulp.watch(path.build.icon, ['sprite:build']);
	gulp.watch(path.build.sass, ['sass:build']);
	gulp.watch(path.build.jsLib, ['js:build']);
	gulp.watch(path.build.jsPath + 'main.js', ['jsMain:build']);
});
//===========================================
gulp.task('default', ['js:build','jsMain:build','sass:build','sprite:build','img:build','webserver','watch']);