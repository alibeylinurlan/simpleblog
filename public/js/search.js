$(document).ready(function(){
    $('#searchbox, #searchbox2').on('click', function(){
        $('#searchcomponent').fadeIn();
        $('#search').focus();
    });
    $('#searchclose').on('click', function(){
        $('#searchcomponent').fadeOut();
    });
});
