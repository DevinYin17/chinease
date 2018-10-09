$(function() {

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
    initMap();
  }

  init();
});
