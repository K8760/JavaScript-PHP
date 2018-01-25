function initMap() {
    // create a map, point to the central of Finland
    var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 62.2426034, lng: 25.7472567},
        zoom: 7
    });
    
    // content string will display course info texts
    var contentString = "";
    // info window will display above content string
    var infowindow = new google.maps.InfoWindow({
        content: contentString
    });

    // load and show markers
    $.ajax({
		url: 'data/kentat.json'
    }).fail(function() {
            console.log("fail!");
    }).done(function(data) {
        // loop through all courses
        $.each(data.kentat, function(index,kentta) {
            // get position lat and lng
            var kenttaLatLng = {lat: kentta.lat, lng: kentta.lng};
            // marker
            var marker = new google.maps.Marker({
                position: kenttaLatLng,
                map: map,
                // include data to marker -> show in infowindow
                title: kentta.Kentta,
                kuvaus: kentta.Kuvaus,
                tyyppi: kentta.Tyyppi,
                osoite: kentta.Osoite,
                puhelin: kentta.Puhelin,
                sahkoposti: kentta.Sahkoposti,
                web: kentta.Webbi
            });
            // marker icon types
            if (kentta.Tyyppi == "Kulta")
                marker.setIcon('http://maps.google.com/mapfiles/ms/icons/yellow-dot.png');
            else if (kentta.Tyyppi == "Etu")
                marker.setIcon('http://maps.google.com/mapfiles/ms/icons/green-dot.png');
            else if (kentta.Tyyppi == "Kulta/Etu")
                marker.setIcon('http://maps.google.com/mapfiles/ms/icons/blue-dot.png'); 
            // marker event handling
            marker.addListener('click', function() {
                infowindow.setContent(
                    '<div id="content">'+
                    '<h1 id="heading">'+this.title+'</h1>'+
                    '<div id="bodyContent">'+
                    '<p>'+this.kuvaus+'</p>'+
                    '<p>'+
                    'Tyyppi:'+this.tyyppi+'<br/>'+
                    'Osoite:'+this.osoite+'<br/>'+
                    'Puhelin:'+this.puhelin+'<br/>'+
                    'Sähköposti:'+this.sahkoposti+'<br/>'+
                    'Web:<a href="'+this.web+'" target="_blank">'+this.web+'<br/>'+
                    '</p>'+
                    '</div>'+
                    '</div>'
                );
                // show info window
                infowindow.open(map, this);
            });
        }); // each
    }); // ajax done
} // init map