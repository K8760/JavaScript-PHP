function initMap() {
    // create a map, point to the central of Finland
    var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 62.2426034, lng: 25.7472567},
        zoom: 7
    });
    
    $("#nappi").click(function(event) {
    var address = encodeURIComponent($("#adr").val());

      $.ajax({
        type: "GET",
        url: "https://maps.googleapis.com/maps/api/geocode/json?address=" + address + "&key=AIzaSyD3furaMgfdYLAB_fI3vcBmjXIdSAEzDSo",
        dataType: "json"
        }).done(function(json) {
                console.log("done");
                show(json);
            }).fail(function() {
                console.log("error");
            }).always(function() {
                console.log("complete");
            })

        });
    function show(json) {
        
        var kenttaLatLng = {lat: json.results[0].geometry.location.lat, lng: json.results[0].geometry.location.lng};
            // marker
        var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: json.results[0].geometry.location.lat, lng: json.results[0].geometry.location.lng},
        zoom: 17
        });
        var marker = new google.maps.Marker({
            position: kenttaLatLng,
            map: map
        });
    }
}


