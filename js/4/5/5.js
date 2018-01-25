var i = -1;

$(document).ready(function(){
    $( ".auto" ).autocomplete({
       source: function( request, response ) {
        $.ajax({
            url: "ajax-suggest.php?q=" + $( ".auto" ).val(),
            cache: false
        }).done(function(data) {
            console.log("done");
            showNames(data);
            //keys();
        }).fail(function() {
            console.log("error");
        }).always(function() {
            console.log("complete");
        })
       }
    }); 
    
    $("body").keydown(function(e) {
    switch(e.which) {
        case 38: // up
            if (i>0) i = i - 1;
            $('.selected').removeClass('selected');
            $('ul.ehdot li').eq(i).addClass('selected');
        break;
        case 40: // down
            if (i<$('ul.ehdot li').length-1)  i = i + 1;
            $('.selected').removeClass('selected');
            $('ul.ehdot li').eq(i).addClass('selected');

        break;

        default: return; 
    }
    e.preventDefault();
    });
   
});

function showNames(data)
{
    $(".ehdot").empty();
    var names = data.split("\t");
    for(var i = 0; i<names.length; i++)
    {
        $(".ehdot").append("<li>"+names[i]+"</li>");
    } 
}


//http://student.labranet.jamk.fi/~ara/jsvastaukset/04-4nelkku/