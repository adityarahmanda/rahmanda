const fs = require("fs-extra")

fs.copySync('./node_modules/bootstrap/scss', './src/sass/assets/bootstrap5')
fs.copySync('./node_modules/applause-button/src/applause-button.js', './src/js/applause-button.js')
fs.copySync('./node_modules/applause-button/src/applause-button.scss', './src/sass/assets/applause-button/applause-css.scss')