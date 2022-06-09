function iniciarMap(){
    var coord = {lat:-11.0063927 ,lng: -74.8046517};
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