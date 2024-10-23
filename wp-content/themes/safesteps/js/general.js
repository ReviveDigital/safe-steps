// Mobile Menu
$('.header__mobile-icon').click(function() {
  $('.header__nav').slideToggle('medium');
});

// Sub Nav Drop Down
$('nav .page_item_has_children > a, nav .menu-item-has-children > a').each(
  function() {
    $(this).after('<i class="fa fa-angle-down"></i>');
    $(this).next('i').on('click',
      function() {
        $(this).toggleClass('fa-angle-down fa-angle-up').next('ul').slideToggle();
        $(this).parents('.menu-navigation-container:first').find('i.fa.fa-angle-up').not($(this)).each(function(){$(this).toggleClass('fa-angle-down fa-angle-up').next('ul').slideUp();});
      }
    );
  }
);

// Slider
var swiper = new Swiper('.swiper-container', {
  pagination: {
      el: '.swiper-pagination',
      dynamicBullets: true,
    },
});

// Google Maps
var map;
var bounds;

(function($) {

function render_map( $el ) {

var $markers = $el.find('.marker');


var args = {
  center    : new google.maps.LatLng(0, 0),
  mapTypeId : google.maps.MapTypeId.ROADMAP,
  scrollwheel : false,
  panControl  : false
};

map = new google.maps.Map( $el[0], args);
map.markers = [];
$markers.each(function(){

  add_marker( $(this), map );

});

center_map( map );

}

var infowindow = new google.maps.InfoWindow({
content   : ''

});

function add_marker( $marker, map ) {

var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

var marker = new google.maps.Marker({
  position  : latlng,
  map     : map,
});

map.markers.push( marker );

if( $marker.html() )
{

  google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent($marker.html());
            infowindow.open(map, marker);
  });

       google.maps.event.addListener(map, 'click', function(event) {
          if (infowindow) {
              infowindow.close(); }
      });

}

}

function center_map( map ) {

bounds = new google.maps.LatLngBounds();
$.each( map.markers, function( i, marker ){

  var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

  bounds.extend( latlng );

});

if( map.markers.length == 1 ) {
    map.setCenter( bounds.getCenter() );
    map.setZoom( 15 );
}
else {
  map.setZoom( 6 );
  map.setCenter( bounds.getCenter() );
}
}

$(document).ready(function(){

  $('.acf-map').each(function(){
    render_map( $(this) );
  });

});


})(jQuery);

// Cookie Bar
$policy  = "";

jQuery(function() {
    if(getCookie('acceptedcookies') == '') {
           jQuery('body').prepend('<div class="cookie"><p class="cookie__text">This site requires cookies in order to give you the best user experience. By using this site, you are agreeing to the use of cookies</p><a href="" onclick="setCookie(); return false;" class="cookie__button">Accept</a></div>');
    }
});

function setCookie() {
    document.cookie = 'acceptedcookies=true; expires=Sat, 01 Jan 2050 00:00:00 UTC; path=/;';
    jQuery('.cookie').slideUp(function() { jQuery(this).remove(); });
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0)==' ') c = c.substring(1);
    if (c.indexOf(name) != -1) return c.substring(name.length,c.length);
    }
    return "";
}
