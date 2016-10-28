$(document).ready(function(){
    $("button").click(function(){
        $(this).toggleClass("active");
        $(this).next().toggleClass("show");
    });
});


