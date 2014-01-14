/**
 * Created by maciek on 14/01/14.
 */

jQuery(function(window, $){
    var nav = $('ul.nav').eq(0);
    var currentPage = nav.attr('id').substr(4);
    nav.find('li').each(function(){
        if ($(this).hasClass(currentPage)) {
            $(this).addClass('active');
        }
    });
}(window, jQuery));