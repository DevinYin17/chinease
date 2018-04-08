$(function() {

  function initMap() {
    var mapCanvas = document.getElementById("map");
    var mapOptions = {
      center: new google.maps.LatLng(54.976488, -1.606866),
      zoom: 14
    };
    var map = new google.maps.Map(mapCanvas, mapOptions);
  }

  function init() {
    initMap();
  }

  init();
});
