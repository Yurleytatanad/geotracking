function iniciarMap(){
    var coord = {lat: 10.9685, lng: -74.78132};
    var map = new google.maps.Map(document.getElementById('map'),{
      zoom: 10,
      center: coord
    });
    var marker = new google.maps.Marker({
      position: coord,
      map: map
    });
}


function initMap(){


}