$(document).ready(function() {
    $("button").click( function()
           {
             $("ul").append(
                 $('<li>').append(
                 $('<span>').append($('#nimi').val()),
                 $('<span id="sp">').append('x')
                 ));
             $('#nimi').val('');
             $('#nimi').focus();
           })
            $('ul').on('click', '#sp', function(){
             $(this).parent().remove();
             $('#nimi').focus();
             });
})