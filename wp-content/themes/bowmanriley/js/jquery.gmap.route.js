//google map route calculator
routeCalculator = function(){

//if browser supports geo location, show link
  if (typeof navigator.geolocation != "undefined") {
          $('#from-link').show();
        }

  $('body').on('submit','#calculate-route',function(e){
       event.preventDefault();
      calculateRoute($("#from").val(), $("#to").val());
  })
  
  $('body').on('click','#calculate-route a#reset',function(e){
    e.preventDefault();
    $('#calculate-route input').val('');
  });

  //retreive current geo location
$('body').on('click','#from-link',function(event){
     $('#calculate-route  p.error').empty().hide();
     $('body').prepend('<div id="overlay" />');
    $('main').addClass('loading');
    loader('show');
          event.preventDefault();
          var addressId = this.id.substring(0, this.id.indexOf("-"));
 
          navigator.geolocation.getCurrentPosition(function(position) {
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({
              "location": new google.maps.LatLng(position.coords.latitude, position.coords.longitude)
            },
            function(results, status) {
                $('#overlay').remove();
                $('main').removeClass('loading');
                loader('hide');
              if (status == google.maps.GeocoderStatus.OK)
                $("#" + addressId).val(results[0].formatted_address);
              else
               
                $('#calculate-route p.error').show().append("Unable to retrieve your current location");
            });
          },
          function(positionError){
           $('#calculate-route p.error').show().append("Error: " + positionError.message);
          },
          {
            enableHighAccuracy: true,
            timeout: 10 * 1000 // 10 seconds
          });
        });
}

calculateRoute =function (from) {
    $('#calculate-route  p.error').empty().hide();

        $('#map').css({
        height:'80%'
        })
         lat = $('#map').attr('data-lat');
        lng = $('#map').attr('data-lng');

        var myOptions = {
          zoom: 10,
          center: new google.maps.LatLng(lat, lng),
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
       
        to = new google.maps.LatLng(lat, lng);
        // Draw the map
        var mapObject = new google.maps.Map(document.getElementById("map"), myOptions);
 
        var directionsService = new google.maps.DirectionsService();
    
      var directionsRequest = {
          origin: from,
          destination: to,
          travelMode: google.maps.DirectionsTravelMode.DRIVING,
          unitSystem: google.maps.UnitSystem.METRIC
        };
        directionsService.route(
          directionsRequest,
          function(response, status){
            $('aside').append('<div id="directions" />');
            if (status == google.maps.DirectionsStatus.OK){
              directionsDisplay = new google.maps.DirectionsRenderer({
                map: mapObject,
                panel: document.getElementById('directions'),
                directions: response
              });
            }
            else
                $('#calculate-route p.error').show().append("Unable to retrieve your route");
          }
        );
 }