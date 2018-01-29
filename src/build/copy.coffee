'use strict'

module.exports =
  chinease:
    expand: true
    cwd: '<%= resourceRoot %>/'
    src: [
      'script/*.*'
      'images/**/*.*'
    ]
    dest: '<%= buildDir %>/'
