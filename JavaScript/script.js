let map, infoWindow;
let autocomplete;
let address1Field;
let address2Field;
let postalField;

function initMap() {
const sydney = new google.maps.LatLng(-33.867, 151.195);
  map = new google.maps.Map(document.getElementById("map"), {
    center: sydney,
    zoom: 15,
  });
  const geocoder = new google.maps.Geocoder();
  const infowindow = new google.maps.InfoWindow();
  document.getElementById("submit").addEventListener("click", () => {
    geocodeLatLng(geocoder, map, infowindow);
  });
  const request = {
    query: "Museum of Contemporary Art Australia",
    fields: ["name", "geometry"],
  };
  service = new google.maps.places.PlacesService(map);
  service.findPlaceFromQuery(request, (results, status) => {
    if (status === google.maps.places.PlacesServiceStatus.OK && results) {
      for (let i = 0; i < results.length; i++) {
        createMarker(results[i]);
      }
      map.setCenter(results[0].geometry.location);
    }
  });
}

function geocodeLatLng(geocoder, map, infowindow) {
    // const lat = document.getElementById("latitude").value;
    // const lon = document.getElementById("latitude").value;
    const input = document.getElementById("latlng").value;
    const latlngStr = input.split(",", 2);
    const latlng = {
      lat: parseFloat(latlngStr[0]),
      lng: parseFloat(latlngStr[1]),
    };
    geocoder
      .geocode({ location: latlng })
      .then((response) => {
        if (response.results[0]) {
          map.setZoom(11);
          const marker = new google.maps.Marker({
            position: latlng,
            map: map,
          });
          infowindow.setContent(response.results[0].formatted_address);
          infowindow.open(map, marker);
        } else {
          window.alert("No results found");
        }
      })
      .catch((e) => window.alert("Geocoder failed due to: " + e));
  }
  
// function getInputValue(){
//     var lat = document.getElementById('latitude').value;
//     var lon = document.getElementById('longitude').value;
//     var latlon = lat + "," + lon;
//     window.alert("latlon =" + latlon);
    
// }

function createMarker(place) {
    if (!place.geometry || !place.geometry.location) return;
    const marker = new google.maps.Marker({
      map,
      position: place.geometry.location,
    });
    google.maps.event.addListener(marker, "click", () => {
      infowindow.setContent(place.name || "");
      infowindow.open(map);
    });
  }

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(
    browserHasGeolocation
      ? "Error: The Geolocation service failed."
      : "Error: Your browser doesn't support geolocation."
  );
  infoWindow.open(map);
}

function initAutocomplete() {
    address1Field = document.querySelector("#ship-address");
    autocomplete = new google.maps.places.Autocomplete(address1Field, {
      componentRestrictions: { country: ["us", "ca"] },
      fields: ["address_components", "geometry"],
      types: ["address"],
    });
    address1Field.focus();
    autocomplete.addListener("place_changed", fillInAddress);
  }
  
  function fillInAddress() {
    const place = autocomplete.getPlace();
    let address1 = "";
    for (const component of place.address_components) {
      const componentType = component.types[0];
      switch (componentType) {
        case "street_number": {
          address1 = `${component.long_name} ${address1}`;
          break;
        }
        case "route": {
          address1 += component.short_name;
          break;
        }
      }
    }
    address1Field.value = address1;
  }

  function addressCaller() {
      
  }
