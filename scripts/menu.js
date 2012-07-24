(function ($) {
  Drupal.behaviors.qellupunuy = {
    attach: function (context, settings) {
      $("#mainmenu", context).find("li").each(function (i) {
        $(this).hover(function () {
          loadMenu(this);
          $(this).addClass('menu-selected');
        }, function () {
          $(this).children(".menu-content").hide();
          $(this).removeClass('menu-selected');
        });
      });

      function loadMenu(menu) {
        var _menu = $(menu);
        _menu.children(".menu-content").show();
        if (!_menu.data('load')) {
          _menu.data('load', true);
          // The menu contains the id for the taxonomy term. Eg. <li id="4"...
          superMenu(_menu, _menu.attr('id'));
        }
      }
      
      var externalHotel = function (response) {
        var five = [], four = [], three = [], two = [];
        $.each(response.hoteles, function (key, oHotel) {
          hotel = oHotel.hotel;
          // The number.
          belong = oHotel.hotel.categoria.split(' ');
          belong = belong[1];
          str = sprintf('<li><a href="%s">%s</a></li>', hotel.path, hotel.title);
          switch (belong) {
            case '2' :
              two.push(str);
            break;
            case '3' :
              three.push(str);
            break;
            case '4' :
              four.push(str);
            break;
            case '5' :
              five.push(str);
            break;
          }
        });
        $(current).find('.hotel-5').html(five.join(''));
        $(current).find('.hotel-4').html(four.join(''));
        $(current).find('.hotel-3').html(three.join(''));
        $(current).find('.hotel-2').html(two.join(''));
      }

      var superMenu = function (menu, where) {
        
        var qpurl = Drupal.settings.qellupunuy.qpurl;
        var qpexternal = Drupal.settings.qellupunuy.qpexternal;
        
        // Loading.
        loading = '<li class="align-center"><img src="/sites/all/themes/qellupunuy/images/ajax-loader.gif" alt="Loading..." /></li>';
        $(menu).find('.hotel-5').html(loading);
        $(menu).find('.hotel-4').html(loading);
        $(menu).find('.hotel-3').html(loading);
        $(menu).find('.hotel-2').html(loading);
        current = menu;
        if(qpexternal) {
          $.ajax({
            // The url: is the generated path with views.
            url: qpurl + where,
            dataType: 'jsonp',
            async: true,
            jsonpCallback: 'externalHotel',
            success: externalHotel
          });
        } else {
          $.ajax({
            // The url: is the generated path with views.
            url: qpurl + where,
            dataType: 'json',
            async: true,
            success: externalHotel
        });
        }

      }

    }
  }

})(jQuery);
