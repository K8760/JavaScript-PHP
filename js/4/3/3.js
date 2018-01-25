$(document).ready(function(){
    $("h3").click(function(){
        $(this).next("p").toggle();
    });
});