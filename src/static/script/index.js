$(function() {

  function initFullPage() {
    var $fullPage = $('#fullpage');

    if ($fullPage.length) {
      var options = {
        resize: true,
        paddingTop: '70px',
        responsiveWidth: 1200,
        slidesNavigation: true,
        onLeave: function(index, nextIndex, direction) {
          if (nextIndex === 8) {
            $('.next-icon').hide();
          } else {
            $('.next-icon').show();
          }
        }
      };

      $fullPage.fullpage(options);

      $('.next-icon').on('click', function() {
        $.fn.fullpage.moveSectionDown();
      });
    }
  }

  function initMap() {
    var mapCanvas = document.getElementById("map");
    var mapOptions = {
      center: new google.maps.LatLng(54.976488, -1.606866),
      zoom: 14
    };
    var map = new google.maps.Map(mapCanvas, mapOptions);
    new google.maps.Marker({
      position: new google.maps.LatLng(54.976488, -1.606866),
      title: "Chinease",
      map: map,
    })
  }

  function init() {
    initFullPage();
    initMap();
  }

  init();
  // $('[data-toggle="tooltip"]').tooltip();

  var swiper1 = new Swiper('.swiper-container.schools', {
    slidesPerView: 5,
    spaceBetween: 75,
    loop: true,
    autoplay: 3000,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    onInit: function(swiper) {
      $('.swiper-button-next').on('click', function() {
        swiper.slideNext();
      });
      $('.swiper-button-prev').on('click', function() {
        swiper.slidePrev();
      });
    }
  });

  $('.page-four-2 .item').on('click', function() {
    var $video = $('.video-' + ($(this).index() + 1));

    if ($video && $video.length) {
      $('.video-youtube').each(function(index, item){
        item.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
      });
      $('.video-youtube').hide();

      $video.show();
    }
  });
});
