const gulp = require('gulp');
const sass = require('gulp-dart-sass');

const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const cssSorter = require("css-declaration-sorter");
const combineMq = require('postcss-combine-media-query');
const browserSync = require('browser-sync').create();
const cleanCss = require("gulp-clean-css");
const uglify = require("gulp-uglify");
const rename = require("gulp-rename");
// const phpBeautify = require('gulp-php-beautifier');
// const htmlBeautify = require("gulp-html-beautify"); // HTMLビューティファイはコメントアウト

// SassのコンパイルとミニファイしてテーマのCSSフォルダへコピー
function compileSass() {
  return gulp.src("./src/assets/sass/**/*.scss")
    .pipe(sass().on('error', sass.logError))
    .pipe(postcss([autoprefixer(), cssSorter(), combineMq()]))
    .pipe(gulp.dest("./css")) // .min化前CSSを一旦出力
    .pipe(cleanCss())
    .pipe(rename({ suffix: ".min" }))
    .pipe(gulp.dest("./css"))
    .pipe(browserSync.stream());
}

// JavaScriptファイルをテーマのJSフォルダへコピー＆ミニファイ
function minJS() {
  return gulp.src("./src/assets/js/**/*.js")
    .pipe(gulp.dest("./js/"))  // コピー
    .pipe(uglify())            // ミニファイ
    .pipe(rename({ suffix: ".min" }))
    .pipe(gulp.dest("./js/"))
    .pipe(browserSync.stream());
}
// PHPファイルを整形するタスク
// function formatPHP() {
//   return gulp.src("./**/*.php") // テーマの全PHPファイルを対象
//     .pipe(phpBeautify({ indent_size: 2 })) // インデントサイズなど設定
//     .pipe(gulp.dest(file => file.base)); // 同じディレクトリに上書き保存
// }
// PHPファイルの変更も監視対象に含める
function watch() {
  browserSync.init({
    proxy: "http://cafe.local"
  });
  gulp.watch("./src/assets/sass/**/*.scss", compileSass);
  gulp.watch("./src/assets/js/**/*.js", minJS);
  // gulp.watch("./**/*.php").on('change', browserSync.reload);
}

// デフォルトタスクと、開発＆ビルド用の各タスク
gulp.task('default', gulp.parallel(watch));
exports.dev = gulp.parallel(watch);
exports.build = gulp.series(compileSass, minJS);
exports.compileSass = compileSass;
exports.minJS = minJS;
// exports.formatPHP = formatPHP;

// コメントアウトしているが残しておきたいタスク例
// HTMLファイルの整形（WordPressでは利用しないためコメントアウト）
// function formatHTML() {
//   return gulp.src("./src/**/*.html")
//     .pipe(htmlBeautify({ indent_size: 2, indent_with_tabs: true }))
//     .pipe(gulp.dest("./"));
// }
// 画像のコピー（別途スクリプトで処理するためコメントアウト）
// function copyImage() {
//   return gulp.src("./src/assets/img/**/*")
//     .pipe(gulp.dest("./public/assets/img/"));
// }
