'use strict'

module.exports =
  options:
    compress:
      drop_console: true
    sourceMap: false
  chinease:
    files: [
      {
        expand: true,
        cwd: '<%= buildDir %>/script/',
        src: '*.js',
        dest: '<%= buildDir %>/script/'
      }
    ]
