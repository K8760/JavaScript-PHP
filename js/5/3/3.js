var infowindow;

// init map
function initMap() {
    // connect direction service
    var directionsService = new google.maps.DirectionsService();
    // connect directions renderer
    var directionsDisplay = new google.maps.DirectionsRenderer();
    // create a map
    var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 62.2426034, lng: 25.7472567},
        zoom: 4
    });
    // create info window 
    infowindow = new google.maps.InfoWindow();
    // use map in directions display
    directionsDisplay.setMap(map);
    // show button event handling
    $("#nappi").click(function(){
        // calculate and display direction
        calculateAndDisplayRoute(directionsService, directionsDisplay, map);
    });    
}

// calc and display route
function calculateAndDisplayRoute(directionsService, directionsDisplay, map) {
    // get route
    if ($("#adr1").val() == "" || $("#adr2").val() == "") $("#message").text("Choose origin and destination!");
    else {
        var way = '';
        if (document.getElementById("r1").checked) { 
            way = document.getElementById("r1").value;
            $("#message").text("");
        }
        else if (document.getElementById("r2").checked) { 
            way = document.getElementById("r2").value;
            $("#message").text("");
        }
        else $("#message").text("Choose way of travelling!");
    }
    directionsService.route({
        origin: $("#adr1").val(),
        destination: $("#adr2").val(),
        travelMode: way
    }, function(response, status) {
        console.log(response); // MUISTA tutustua datarakenteeseen Console-ikkunan kautta!!
        if (status === 'OK') {
            // display route
            directionsDisplay.setDirections(response);
            // show distance and duration in a info window
            infowindow.setContent(response.routes[0].legs[0].distance.text + "<br>" + response.routes[0].legs[0].duration.text + " ");
            infowindow.setPosition(response.routes[0].legs[0].end_location);
            infowindow.open(map);
        } else {
            console.log('Directions request failed due to ' + status);
        }
    });
}