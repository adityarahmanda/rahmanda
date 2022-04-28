'use strict'

const pkg = require('../../package.json')
const year = new Date().getFullYear()

function getBanner(pluginFilename) {
  return `/*!
  * Rahmanda${pluginFilename ? ` ${pluginFilename}` : ''} v${pkg.version} (${pkg.homepage})
  * Copyright ${year} ${pkg.author}
  */`
}

module.exports = getBanner