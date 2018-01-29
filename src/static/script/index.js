$(function() {
  var isPlain = false;
  var autoPlayTimer;
  var isAutoPlay = false;

  function autoPlay() {
    var totalTimes = $('.home-page .slide').length || 0;
    var currentTimes = 0;
    autoPlayTimer = setInterval(function() {
      if (currentTimes < totalTimes) {
        isAutoPlay = true;
        $.fn.fullpage.moveSlideRight();
        currentTimes++;
      } else {
        window.clearInterval(autoPlayTimer);
      }
    }, 3000);
  }

  function loading() {
    $index = $('.index-wrapper');
    if ($index.length && $index.hasClass('loading')) {
      $index.removeClass('loading');
    }
  }

  function loadImages($wrapper) {
    $wrapper.find('img').each(function(){
      $this = $(this);
      $this.attr('src', $this.data('original'));
      $this.removeAttr('data-original');
    })
  }

  function fetchNews() {
    var $whatsNew = $('.whats-new');
    var hideArticle = [2, 5];

    $.ajax({
      type: 'GET',
      url: '/word-press/get-news',
      success: function(data) {
        var $articleLeft = $('.article-left');
        var $articleRight = $('.article-right');

        if ($whatsNew.length && $articleLeft.length && $articleRight.length && data.length == 6) {
          for (var i = 0; i < data.length; i++) {
            if (!window.config.isMobileBrowser || hideArticle.indexOf(i) === -1) {
              var article = data[i];
              var $article = '<a href="' + article.url + '" class="article-item" style="background-image: url(' + article.custom_field.cover + ')" target="_blank"><span class="title">' + article.title + '</span></a>'

              if (i === 0) {
                $articleLeft.append($article);
              } else {
                $articleRight.append($article);
              }
            }
          }

          if (!window.config.isMobileBrowser) {
            $whatsNew.find('.title').dotdotdot({height: 70, wrap: 'letter', watch: true});
          }
        } else {
          $whatsNew.remove();
        }
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        $whatsNew.remove();
      }
    });
  }

  function initFullPage() {
    var $fullPage = $('#fullpage');
    // Only landing page need full page handling
    if ($fullPage.length) {
      var options = {
        resize: true,
        paddingTop: '70px',
        responsiveWidth: 1200,
        slidesNavigation: true,
        onLeave: function(index, nextIndex, direction) {
          !isPlain && loadImages($('.fp-section').eq(nextIndex));
        },
        onSlideLeave: function() {
          if (!isAutoPlay && autoPlayTimer) {
            window.clearInterval(autoPlayTimer);
          } else {
            isAutoPlay = false;
          }
        }
      };
      if (window.document.body.scrollWidth > options.responsiveWidth && !window.config.isMobileBrowser) {
        options.onLeave = function(index, nextIndex, direction) {
          if (nextIndex === 1) {
            $('.button-backtotop').hide();
            $('header').removeClass('opaque');
          } else {
            $('.button-backtotop').show();
            $('header').addClass('opaque');
          }

          !isPlain && loadImages($('.fp-section').eq(nextIndex));
        }
      }

      $fullPage.fullpage(options);
      autoPlay();
      isPlain = $('.fp-responsive').length;
      !isPlain && loadImages($('.fp-section').eq(1));
    }
    isPlain && $('img').lazyload({effect: 'fadeIn'});

    $('.button-backtotop').on('click', function() {
      if ($.isFunction($.fn.fullpage.moveTo)) {
        $.fn.fullpage.moveTo(1);
      }
    });
  }

  function initSwiper() {
    var $swiperHomePage = new Swiper('.home-page.swiper-container', {
      pagination: '.pagination',
      paginationClickable: true,
      nextButton: '.home-page .next',
      prevButton: '.home-page .prev',
      loop: true
    });

    var $swiperCustomizedPlan = new Swiper('.customized-plan .swiper-container', {
      slidesPerView: 'auto',
      autoplay: 3000,
      autoplayStopOnLast: true,
      spaceBetween: 16
    });

    var $swiperHomePage = new Swiper('.cooperate-partner .swiper-container', {
      nextButton: '.cooperate-partner .next',
      prevButton: '.cooperate-partner .prev'
    });
  }

  function copyCnzz() {
    var $cnzz = $('.cnzz');
    if ($cnzz && $cnzz.length > 1) {
      $cnzz.eq(1).append($cnzz.eq(0).html());
    }
  }

  function init() {
    if (!window.config.isMobileBrowser) {
      initFullPage();
      loading();
    } else {
      initSwiper();
      copyCnzz();
    }
    fetchNews();
  }

  init();
});
