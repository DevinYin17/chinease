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
});
