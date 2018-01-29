'use strict'

module.exports =
  options:
    map: false
    processors: [
      require('autoprefixer') {
        browsers: [
          '> 0.04%'
        ]
      }
    ]
  chinease:
    src: [
      '<%= buildDir %>/css/app.css'
    ]
