$(function() {

  function initFullPage() {
    var $fullPage = $('#fullpage');

    if ($fullPage.length) {
      var options = {
        resize: true,
        paddingTop: '70px',
        responsiveWidth: 1200,
        slidesNavigation: true
      };

      $fullPage.fullpage(options);
    }
  }

  function initMap() {
    var mapCanvas = document.getElementById("map");
    var mapOptions = {
      center: new google.maps.LatLng(54.976488, -1.606866),
      zoom: 10
    };
    var map = new google.maps.Map(mapCanvas, mapOptions);
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
    autoplay: true,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    }
  });
});
