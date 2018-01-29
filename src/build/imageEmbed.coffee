'use strict'

module.exports =
  chinease:
    options:
      baseDir: '<%= webRoot %>'
      deleteAfterEncoding: false
    files:
      '<%= buildDir %>/css/app.css': ['<%= buildDir %>/css/app.css']
