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

  function myMap1() {
    var mapCanvas = document.getElementById("map");
    var mapOptions = {
      center: new google.maps.LatLng(54.976488, -1.606866),
      zoom: 10
    };
    var map = new google.maps.Map(mapCanvas, mapOptions);
    console.log('ok');
  }

  function init() {
    initFullPage();
    myMap1();
  }

  init();
  // $('[data-toggle="tooltip"]').tooltip();

  var swiper1 = new Swiper('.swiper-container.schools', {
    slidesPerView: 4,
    spaceBetween: 10,
    loop: true,
    autoplay: true
  });
  var swiper2 = new Swiper('.swiper-container.cities', {
    loop: true,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    autoplay: true
  });
});
