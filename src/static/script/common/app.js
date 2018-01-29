$(function() {

  function bindScrollEvent() {
    var bannerHeight = $('.banner').height();
    var headerHeight = $('header').height();
    var applicationPosition = 0;
    var $application = $('.apply-wrapper');

    if (bannerHeight != null && headerHeight != null) {
      $(window).on('scroll', function() {
        var scrollheight = bannerHeight - headerHeight;
        // new feature
        scrollheight = 10;
        if ($(document).scrollTop() > scrollheight) {
          $('.button-backtotop').show();
          $('header').addClass('opaque');
        } else {
          $('.button-backtotop').hide();
          $('header').removeClass('opaque');
        }

        if ($application[0]) {
          applicationPosition = $(document).scrollTop() + window.screen.availHeight * 3 / 4 - $application[0].offsetTop;
          if (applicationPosition > 0) {
            $application.find('.mask').css({top: applicationPosition + 'px'});
            $application.css({'background-position': '50% ' + ((applicationPosition - 1000) / 2) + 'px'});

            if (applicationPosition < $application[0].offsetHeight) {
              $application.find('.error-tip').hide();
            }
          } else {
            $application.find('.mask').css({top: 0});
            $application.css({'background-position': '50% -1000px'});
          }
        }
      });
    } else {
      $('header').addClass('opaque');
    }

    $('.button-backtotop').on('click', function() {
      $('html,body').stop().animate({scrollTop: 0}, 500);
    });
  }

  /**
   * Bind the event on element which has class '.helpdesk-consultation' to popup a helpdesk dialog
   */
  function bindHelpdeskEvent() {
    $('.helpdesk-consultation').on('click', function() {
      var left = window.innerWidth - 400, top = window.innerHeight - 450;
      var chatDomain = window.config.chatDomain;
      var accountId = window.config.accountId || '54f6cfef8f5e88b96a8b4567';
      var url = chatDomain + '/chat/client?accountId=' + accountId + '#bottom';
      var params = 'height=450,width=400,left=' + left + ',top=' + top + ',toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no,status=no';
      window.open(url, 'newwindow', params);
    });
  }

  /**
   * Bind the event on element which has class '.helpdesk-feedback' to popup a feedback dialog
   */
  function bindFeedbackEvent() {
    $('.helpdesk-feedback').on('click', function() {
      var options = {
        user: {
          accountId: window.config.accountId || '54f6cfef8f5e88b96a8b4567',
          origin: 'visitor',
          fields: [{
              label: 'feedback_customer_name',
              name: 'name',
              value: '',
              type: 'text',
              readonly: false
            }, {
              label: 'feedback_customer_email',
              name: 'email',
              value: '',
              type: 'email',
              readonly: false
            }]
        }
      };
      var left = window.innerWidth - 470, top = window.innerHeight - 600;
      var chatDomain = window.config.chatDomain;
      var windowParams = "height=600,width=470,left=" + left + ",top=" + top + ",toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no,status=no";

      var url = chatDomain + "/chat/feedback";
      if (options.user) {
        var params = JSON.stringify(options.user);
        url = url + "?params=" + params;
      }

      window.open(url, 'newwindow', windowParams)
    });
  }

  /**
   * Bind the toggle event to the right corner icon
   */
  function bindToggleIcon() {
    $menu = $('.left-wrapper');

    function menuHandle(className) {
      if ($menu.hasClass(className)) {
        $menu.removeClass('phone-active toggle-active');
      } else {
        $menu.removeClass('phone-active toggle-active');
        $menu.addClass(className);
      }
    }

    if ($menu.length) {
      $('.toggle').on('click', function() {
        menuHandle('toggle-active');
      });

      $('.phone').on('click', function() {
        menuHandle('phone-active');
      });

      $('.close').on('click', function() {
        $menu.removeClass('phone-active');
      });

      $('.mask').on('click', function() {
        $menu.removeClass('phone-active toggle-active');
      });
    }
  }

  function bindRegisterEvent() {
    $('.apply-btn').on('click', function () {
      var signupUrl = '/signup';
      var emailReg = /^([a-zA-Z0-9]+[_|\-|\.]?)*([a-zA-Z0-9])+@([a-zA-Z0-9]+[_|\-|\.]?)*([a-zA-Z0-9])+\.[a-zA-Z]{2,3}$/;
      var phoneReg = /^0?1[0-9]{10}$/;
      var val = $(this).parent().find('input').val() || '';

      if (!val.trim()) {
        window.location.href = signupUrl
        return
      }
      if (emailReg.test(val)) {
        window.location.href = signupUrl + '?email=' + val;
        return
      }
      if (phoneReg.test(val)) {
        window.location.href = signupUrl + '?phone=' + val;
        return
      }

      $(this).parent().find('.error-tip').fadeIn();
    });

    $('.apply-inputbox').on('focus', function () {
      $(this).parent().find('.error-tip').fadeOut();
    });
  }

  function fetchNews() {
    var $article = $('.recommendation .article-recommendation');

    if ($article.length) {
      $.ajax({
        type: 'GET',
        url: '/word-press/article-recommendation',
        success: function(data) {
          if ($article.length && data.length == 3) {
            for (var i = 0; i < data.length; i++) {
              var article = data[i];
              $('.recommendation .article-list').append('<a href="' + article.url + '" class="article-item" target="_blank"><i style="background-image: url(' + article.custom_field.cover + ')"></i><label>' + article.title + '</label></a>')
            }
            if (!window.config.isMobileBrowser) {
              $article.find('label').dotdotdot({height: 70, wrap: 'letter', watch: true});
            }
          } else {
            $article.remove();
          }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
          $article.remove();
        }
      });
    }
  }

  function randomCase() {
    var planItemSelector = '.index-wrapper .plan-item';
    if (!$(planItemSelector).length) {
      planItemSelector = '.recommendation .plan-item';
    }

    var $planItem = $(planItemSelector);
    if ($planItem.length) {
      while ($(planItemSelector + ':not(.hidden)').length > 4) {
        $planItem.eq(parseInt(Math.random() * $planItem.length)).addClass('hidden');
      }
    }
  }

  function imageSimpleLazyLoad() {
    $images = $('img');
    if ($images && $images.length) {
      $images.each(function(index, image) {
        (function($image) {
          var imageSrc = $image.data('src');
          if (imageSrc) {
            var image = new Image();
            image.src = imageSrc;
            image.onload = function() {
              $image.attr('src', imageSrc);
            };
          }
        })($(image));
      });
    }
  }

  function init() {
    if (!window.config.isMobileBrowser) {
      bindScrollEvent();
      bindFeedbackEvent();
      randomCase();
    } else {
      bindToggleIcon();
    }

    imageSimpleLazyLoad();
    bindHelpdeskEvent();
    bindRegisterEvent();
    fetchNews();
  }

  init();
});
