$(document).ready(function(){
    $(".invisible-content").hide();
    $(document).on('click',"#btn", function(){
        var morelessbutton = $(".invisible-content").is(":visible")?'Read More':'Read Less';
        $(this).text(morelessbutton);
        $(this).parent(".box").find(".invisible-content").toggle();
        $(this).parent(".box").find(".visible-content").toggle();
    });
});