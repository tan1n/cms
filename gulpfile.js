const { src, dest } = require("gulp");
const concat = require("gulp-concat");
const uglify = require("gulp-uglify");

const bundleJs = () => {
    return src(["public/lib/jquery/jquery.min.js", "public/js/**/*.js"])
        .pipe(uglify())
        .pipe(concat("bundle.js"))
        .pipe(dest("public/dist"));
};

exports.bundleJs = bundleJs;
