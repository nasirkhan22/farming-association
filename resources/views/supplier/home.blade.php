@extends('layouts.supplier.layout')
@section('page-header')
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Dashboard</h5>
                    <p class="m-b-0">&nbsp;</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{route('farmer.home')}}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="row">
        <!-- task, page, download counter  start -->
       <!--  <div  id="map" ></div>
                <script>
                  var customLabel = {
                      restaurant: {
                          label: 'R'
                      },
                      bar: {
                          label: 'B'
                      }
                  };
                    //Render google map
                  function initMap(){  
                        var point=null;
                      var map = new google.maps.Map(document.getElementById('map'), {
                          center: new google.maps.LatLng(34.1688, 73.2215),
                          zoom: 12
                      });


                      // Change this depending on the name of your PHP or XML file
                      downloadUrl('property_location_marker.php', function(data) {

                          var xml = data.responseXML;
                          var markers = xml.documentElement.getElementsByTagName('marker');
                          Array.prototype.forEach.call(markers, function(markerElem) {
                              var id = markerElem.getAttribute('id');
                              var cordinates_street_address = markerElem.getAttribute('cordinates_street_address');
                               var cordinates_country = markerElem.getAttribute('cordinates_country');
                               var city = markerElem.getAttribute('city');
                               var state = markerElem.getAttribute('state');
                               var owner_name = markerElem.getAttribute('owner_name');
                               var owner_email = markerElem.getAttribute('owner_email');
                               var owner_phone = markerElem.getAttribute('owner_phone');
                                var updated_at = markerElem.getAttribute('updated_at');
                              var latitude = markerElem.getAttribute('lat');
                              var longitude = markerElem.getAttribute('lng');
                                var tittleText="Lease Management System";

                               point = new google.maps.LatLng(
                                  parseFloat(markerElem.getAttribute('lat')),
                                  parseFloat(markerElem.getAttribute('lng')));

                              var infowincontent = document.createElement('div');
                              var strong = document.createElement('strong');
                              strong.textContent = "Name="+name
                              infowincontent.appendChild(strong);
                              infowincontent.appendChild(document.createElement('br'));

                              var text = document.createElement('text');
                              text.textContent = "Address="+cordinates_street_address
                              infowincontent.appendChild(text);
                             
                              var marker = new google.maps.Marker({
                                  map: map,
                                  position: point,
                                  

                              });


                             

                      var contentString =
                    '<div id="content">' +
                    '<div id="siteNotice">' +
                    "</div>" +
                    '<h4 id="firstHeading" class="firstHeading">Lease Management System</h4>' +
                    '<div id="bodyContent">' +
                    '<h6>Address:'+'&nbsp<b>'+cordinates_street_address+'</b></h6>' +
                    '<h6>City:'+'&nbsp<b>'+city+'</b></h6>' +
                     '<h6>State:'+'&nbsp<b>'+state+'</b></h6>' +

                    '<h6>Latitude:'+'&nbsp<b> '+latitude+'</b></h6>' +
                   '<h6>Longitude:'+'&nbsp<b> '+longitude+'</b></h6>' +
                      '<h6>Property Owner:'+'&nbsp<b>'+owner_name+'</b></h6>' +
                      '<h6>Owner Email:'+'&nbsp<b>'+owner_email+'</b></h6>' +
                      '<h6>Owner Phone:'+'&nbsp<b>'+owner_phone+'</b></h6>' +



                       
                    "</div>" +
                  "</div>";
                   
                      var infowindow = new google.maps.InfoWindow({
                        content: contentString
                      });
                                         
                              marker.addListener('mouseover',function()
                              {
                                  infowindow.open(map, marker);
                              });
                               marker.addListener('mouseout',function()
                              {
                                  infowindow.close(map, marker);
                              });

                          });
                      });
                  }

                  function downloadUrl(url, callback) {
                      var request = window.ActiveXObject ?
                          new ActiveXObject('Microsoft.XMLHTTP') :
                          new XMLHttpRequest;

                      request.onreadystatechange = function() {
                          if (request.readyState == 4) {
                              request.onreadystatechange = doNothing;
                              callback(request, request.status);
                          }
                      };

                      request.open('GET', url, true);
                      request.send(null);
                  }

                  function doNothing() {}
              </script>
              <script async defer
                      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGdcSfLwqmDVg_HLbYAJo0qkbElSM5_fc&callback=initMap">
              </script> -->


              <div class="col col-md-12">
        <div id="map" style="width:100%; height:500px"></div>
    </div>
    
    <script type="text/javascript">
        function initMap() {
            const myLatLng = { lat: 34.1688, lng: 73.2215 };
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 12,
                center: myLatLng,
            });
  
            var locations = {{ Js::from($locations) }};
  
            var infowindow = new google.maps.InfoWindow();
  
            var marker, i;
              
            for (i = 0; i < locations.length; i++) {  
                  marker = new google.maps.Marker({
                    position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                    map: map
                  });
                    
                  google.maps.event.addListener(marker, 'mouseover', (function(marker, i) {
                    return function() {
                      infowindow.setContent(locations[i][0]);
                      infowindow.open(map, marker);
                    }
                  })(marker, i));
            }
        }
  
        window.initMap = initMap;
    </script>
  
    <script type="text/javascript"
        src="https://maps.google.com/maps/api/js?key=AIzaSyAGdcSfLwqmDVg_HLbYAJo0qkbElSM5_fc&callback=initMap" ></script>

    </div>
@endsection
