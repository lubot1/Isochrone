function initMap() {
    //Initialize new map object
      map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: 0, lng: 0 },
        zoom: 1,
      });
      //Created using the events sample at https://developers.google.com/maps/documentation/javascript/events#maps_event_simple-javascript
      map.addListener("click", (e) => {
          new google.maps.Marker({
              position: e.latLng,
              map: map
          });
          map.panTo(e.latLng)
          map.setZoom(8);
      });
  }
  