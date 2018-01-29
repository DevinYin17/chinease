'use strict'

module.exports = (grunt) ->

  require('load-grunt-config') grunt,
    configPath: require('path').join(process.cwd(), 'build'),
    data:
      webRoot: 'web/'
      resourceRoot: 'static/'
      buildDir: 'web/build/'
    loadGruntTasks:
      pattern: ['grunt-*', 'git-changelog']

  require('time-grunt')(grunt)
