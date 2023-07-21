const configuration = {
    sass: ['./src/scss/style.scss'],
    js: ['./src/js/script.js', './src/js/vendor.js'],
    browserSync: {
        proxy: "http://playground.test/",
        host: "playground.test",
        watchTask: true,
        open: "external",
        files: [
          "./assets/dist/css/*.min.css",
          "./assets/dist/js/*.min.js",
          "./**/*.php",
        ],
        logLevel: "silent",
    },
}

module.exports = configuration;