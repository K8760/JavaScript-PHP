/* Houses- JavaScript */
$(document).ready(function(){
    // use ajax() to load h04t04-ajax-json-talot.json file
    // call showHouses from done()-function
    $.ajax({
        url: "talot.json",
        cache: false
    }).done(function(data) {
        console.log("done");
        showHouses(data);        
    }).fail(function() {
        console.log("error");
    }).always(function() {
        console.log("complete");
    });
});

// function shows houses information
function showHouses(data) {
    // loop through all houses data 
    $.each(data.houses, function(index, talo) {
        // create a div element and add "houseContainer" class to it
        var div = $("<div class='houseContainer'></div>");
        // create img element and use "houseImage" class to it and src to house image
        var i = index + 1;
        var a = "kuvat/talo" + i + ".jpg";
        var image = $("<img class='houseImage'/>");
        image.attr('src', a);
        // create p element, use address as a text and "header" class
        var header = $("<p class='header'></p>").text(talo.address);
        console.log(talo.address);
        // create p element ja use house size as a text
        var size = $("<p></p>").text(talo.size);
        // create p element and use house text as a text and "text" class
        var text = $("<p class='text'></p>").text(talo.text);
        // create p element and use house price as a text
        var price = $("<p></p>").text(talo.price);
        //  add all elements to houseDiv lisÃ¤tÃ¤Ã¤n kaikki luodut elementit taloDiv-elementtiin
        div.append(image,header,size,text,price);
        // add div to #houses in DOM
        $("#houses").append(div);
    });
}