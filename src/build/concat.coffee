'use strict'

module.exports =
  options:
    stripBanners: true
  chinease:
    files:
      '<%= buildDir %>/script/vendor.js': [
        'node_modules/jquery/dist/jquery.js'
        'node_modules/swiper/dist/js/swiper.min.js'
        'node_modules/fullpage.js/jquery.fullPage.js'
        'vendor/bower/jquery_lazyload/jquery.lazyload.js'
        'vendor/bower/jQuery.dotdotdot/src/jquery.dotdotdot.js'
        '<%= resourceRoot %>/script/common/*.js'
      ]
      '<%= buildDir %>/script/upload.js': [
        'node_modules/jquery/dist/jquery.js'
        '<%= resourceRoot %>/script/upload/jquery.ui.widget.js'
        '<%= resourceRoot %>/script/upload/jquery.iframe-transport.js'
        '<%= resourceRoot %>/script/upload/jquery.fileupload.js'
        '<%= resourceRoot %>/script/upload/bootstrap.min.js'
      ]
      '<%= buildDir %>/css/app.css': [
        '<%= buildDir %>/css/app.css'
        'node_modules/fullpage.js/jquery.fullPage.css'
        'node_modules/swiper/dist/css/swiper.min.css'
      ]
