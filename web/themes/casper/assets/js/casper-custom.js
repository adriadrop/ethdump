


/**
 * Main JS file for Casper behaviours
 */

/* globals jQuery, document */
(function ($, undefined) {
    "use strict";

    var $document = $(document);

    $document.ready(function () {

        var hue = -340;
        var mseconds = 400;
        var direction = 1;

    if ($('.front').length ) {
        var timer = setInterval(function() {
        var filters = $('.blog-logo img').css( "filter" );

        if (hue == -340) { 
          direction = 1;
        }
        else if (hue == -280){
          direction = 0;
        }

        if (direction == 1){
          hue++;
        }
        if (direction == 0){
          hue--;
        }

          $('.blog-logo').css('filter', 'hue-rotate(' + hue + 'deg) blur(5px) opacity(60%)');
        }, mseconds);
      }

    });


})(jQuery);
