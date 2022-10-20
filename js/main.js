$(document).ready(function() {

    $('#btn-menu').on('click', function() {
        var menu = $('#menu');

        if( menu.hasClass('active') ) {
            menu.hide("slow", function() {
                menu.removeClass('active');
                console.log('Menu hidden');
            });
        } else if( !menu.hasClass('active') ) {
            menu.show("slow", function() {
                menu.addClass('active');
                console.log('Menu visible');
            });
        }
    });

});