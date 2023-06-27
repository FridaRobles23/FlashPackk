<!DOCTYPE html>
<html>

<head>
 
     
    <style>
        #map-layer {
            height: 400px;
            margin-bottom: 20px;
        }

        .lbl-locations {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .locations-option {
            margin-bottom: 10px;
        }

        .btn-draw {
            padding: 10px 20px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div hidden class="form-group">
            <div class="form-check form-check-inline">
                <input type="radio" name="travel_mode" class="form-check-input travel_mode" value="WALKING" id="walkingMode">
                <label class="form-check-label" for="walkingMode">WALKING</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" name="travel_mode" class="form-check-input travel_mode" value="DRIVING" id="drivingMode" checked>
                <label class="form-check-label" for="drivingMode">DRIVING</label>
            </div>
        </div>

        <div class="lbl-locations">Rutas chidas</div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group locations-option">
                    <input type="text" id="origin" name="way_start" class="form-control way_points" placeholder="Punto salida" value="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group locations-option">
                    <input type="text" id="destination" name="way_end" class="form-control way_points" placeholder="Punto destino" value="">
                </div>
            </div>
        </div>

        <div class="form-group">
            <input type="button" id="drawPath" value="Generar ruta" class="btn btn-primary btn-draw">
        </div>

        <div id="map-layer"></div>
        <div class="form-group">
            <label for="tiempo">Tiempo</label>
            <input type="text" class="form-control way_points" name="tiempo" id="tiempo" aria-describedby="helpId" placeholder="" readonly>

            <label for="distancia">Distancia</label>
            <input type="text" class="form-control way_points" name="distancia" id="distancia" aria-describedby="helpId" placeholder="" readonly>
        </div>
    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBOA478T5bcnu39VBVCmw4z60bDhIVPleM&callback=initMap" async defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        var map;
        var directionsService;
        var directionsDisplay;
        var currentLocationMarker;

        function initMap() {
            var mapLayer = document.getElementById("map-layer");
            var centerCoordinates = new google.maps.LatLng(19.4116, -99.0212);
            var defaultOptions = {
                center: centerCoordinates,
                zoom: 15
            };
            map = new google.maps.Map(mapLayer, defaultOptions);

            directionsService = new google.maps.DirectionsService();
            directionsDisplay = new google.maps.DirectionsRenderer();
            directionsDisplay.setMap(map);

            $("#drawPath").on("click", function () {
                var start = $("#origin").val();
                var end = $("#destination").val();
                drawPath(start, end);
            });

            if (navigator.geolocation) {
                navigator.geolocation.watchPosition(function (position) {
                    var currentLatLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                    if (currentLocationMarker) {
                        currentLocationMarker.setPosition(currentLatLng);
                    } else {
                        currentLocationMarker = new google.maps.Marker({
                            position: currentLatLng,
                            map: map,
                            icon: "https://maps.gstatic.com/mapfiles/ms2/micons/truck.png",
                            zIndex: 999
                        });
                    }
                }, function (error) {
                    console.error("Error accessing geolocation:", error);
                });
            }
        }

        function drawPath(start, end) {
            directionsService.route({
                origin: start,
                destination: end,
                optimizeWaypoints: true,
                travelMode: $("input[name='travel_mode']:checked").val()
            }, function (response, status) {
                if (status === 'OK') {
                    directionsDisplay.setDirections(response);

                    // Get distance and duration
                    var route = response.routes[0];
                    var distance = route.legs[0].distance.text;
                    var duration = route.legs[0].duration.text;

                    // Save data to the database
                    saveData(distance, duration);
                } else {
                    window.alert('Problem in showing direction due to ' + status);
                }
            });
        }

        function saveData(distance, duration) {
            // Here, you can implement your code to save the distance and duration to the database.
            // You can use AJAX or any other method to send the data to the server-side script for database interaction.
            // For demonstration purposes, let's just log the data to the console.
            console.log('Distance: ' + distance);
            console.log('Duration: ' + duration);
            $("#distancia").val(distance);
            $("#tiempo").val(duration);
        }
    </script>
</body>

</html>
