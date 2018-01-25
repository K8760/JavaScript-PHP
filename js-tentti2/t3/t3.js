$(document).ready(function(){   
    $.ajax({
        url: "hcpdata.json",
        cache: false
    }).done(function(data) {
        console.log("done");
        show(data);        
    }).fail(function() {
        console.log("error");
    }).always(function() {
        console.log("complete");
    });

    
});




function show(data) {
    var div = $("<div></div>");
    var ul1 = $("<ul id='nav'></ul>");
    $.each(data.hcpdata, function(index, hkl) {
        var li = $("<li></li>");
        var a = $("<a href='#'></a>").text(hkl.name);
        li.append(a);
        ul1.append(li);
    });
    div.append(ul1);
    $("#pelaajat").append(div);
    var div = $("<div></div>");
    var ul2 = $("<ul id='data'></ul>");
    $.each(data.hcpdata, function(index, hkl) {
        var li = $("<li></li>").text(hkl.name + " " + hkl.hcp);
        ul2.append(li);
    });
    div.append(ul2);
    $("#pelaajat").append(div);
    
    $(document).ready(function(){
        $("#nav li").click(function() {
            var a = $(this).index();
            $("#data li").each(function( index ) {
                if (a != $(this).index()) $(this).hide();
                else $(this).show();
            });
        });
    });
    
    $(document).ready(function(){
        $("#nav li").mouseleave(function() {
            var a = $(this).index();
            $("#data li").each(function( index ) {
                $(this).show();
            });
        });
    });
}


