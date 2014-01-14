/**
 * Created by maciek on 14/01/14.
 */

/**
 * Created by maciek on 14/01/14.
 */

jQuery(function(window, $){
    var map;
    function initialize() {
        var mapProp = {
            center: new google.maps.LatLng(52.225213, 21.028081),
            zoom: 18,
            mapTypeId: google.maps.MapTypeId.SATELLITE
        };

        map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
    }

    initialize();
}(window, jQuery));