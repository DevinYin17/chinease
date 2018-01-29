'use strict'

cdnMap = require('../package.json').cdnMap

aliases =
  default: [
    'build'
    'watch:chinease'
  ]
  build: [
    'clean:chinease'
    'copy:chinease'
    'sass:chinease'
    'postcss:chinease'
    'concat:chinease'
  ]
  dist: [
    'build'
    'uglify:chinease'
    'imageEmbed:chinease'
    'cssmin:chinease'
  ]

module.exports = aliases
