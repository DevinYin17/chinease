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



  function init() {
    initFullPage();
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
