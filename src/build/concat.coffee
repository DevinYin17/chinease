'use strict'

module.exports =
  options:
    stripBanners: true
  chinease:
    files:
      '<%= buildDir %>/script/vendor.js': [
        'node_modules/jquery/dist/jquery.js'
        'node_modules/fullpage.js/jquery.fullPage.js'
        'vendor/bower/jquery_lazyload/jquery.lazyload.js'
        'vendor/bower/jQuery.dotdotdot/src/jquery.dotdotdot.js'
        '<%= resourceRoot %>/script/common/*.js'
      ]
