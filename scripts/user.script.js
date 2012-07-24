function sprintf() {
	if (!arguments || arguments.length < 1 || !RegExp) {
		return;
	}
	var str = arguments[0];
	var re = /([^%]*)%('.|0|\x20)?(-)?(\d+)?(\.\d+)?(%|b|c|d|u|f|o|s|x|X)(.*)/;
	var a = b = [], numSubstitutions = 0, numMatches = 0;
	while (a = re.exec(str)) {
		var leftpart = a[1], pPad = a[2], pJustify = a[3], pMinLength = a[4];
		var pPrecision = a[5], pType = a[6], rightPart = a[7];
		numMatches++;
		if (pType == '%') {
			subst = '%';
		} else {
			numSubstitutions++;
			if (numSubstitutions >= arguments.length) {
				alert('Error! Not enough function arguments (' + (arguments.length - 1) + ', excluding the string)\nfor the number of substitution parameters in string (' + numSubstitutions + ' so far).');
			}
			var param = arguments[numSubstitutions];
			var pad = '';
			if (pPad && pPad.substr(0,1) == "'") pad = leftpart.substr(1,1);
			else if (pPad) pad = pPad;
			var justifyRight = true;
			if (pJustify && pJustify === "-") justifyRight = false;
			var minLength = -1;
			if (pMinLength) minLength = parseInt(pMinLength);
			var precision = -1;
			if (pPrecision && pType == 'f') precision = parseInt(pPrecision.substring(1));
			var subst = param;
			if (pType == 'b') subst = parseInt(param).toString(2);
			else if (pType == 'c') subst = String.fromCharCode(parseInt(param));
			else if (pType == 'd') subst = parseInt(param) ? parseInt(param) : 0;
			else if (pType == 'u') subst = Math.abs(param);
			else if (pType == 'f') subst = (precision > -1) ? Math.round(parseFloat(param) * Math.pow(10, precision)) / Math.pow(10, precision): parseFloat(param);
			else if (pType == 'o') subst = parseInt(param).toString(8);
			else if (pType == 's') subst = param;
			else if (pType == 'x') subst = ('' + parseInt(param).toString(16)).toLowerCase();
			else if (pType == 'X') subst = ('' + parseInt(param).toString(16)).toUpperCase();
		}
		str = leftpart + subst + rightPart;
	}
	return str;
}

var paramsChat = 'location=0,status=0,scrollbars=0,width=430,height=500';
var paramsSkype = 'location=0,status=0,scrollbars=0,width=450,height=350';

var principal = '/sites/all/themes/qellupunuy/images/icon-principal.png';
var other = '/sites/all/themes/qellupunuy/images/icon-other.png';

var iprincipal = {
	image: principal,
	iconsize: [26, 46],
	iconanchor: [12, 46],
	infowindowanchor: [12,0]
};

var iother = {
	image: other,
	iconsize: [26, 46],
	iconanchor: [12, 46],
	infowindowanchor: [12,0]
};

// JQuery Popup.
(function($) {		
	$.fn.popup = function(params, href) {
		href = (typeof href == 'undefined') ? $(this).attr('href') : href;
		function clickHandler(e) {
			if (e.ctrlKey || e.shiftKey || e.metaKey)
				return;
			var w = window.open(href, '_blank', params);
			if (w && !w.closed) {
				w.focus();
				e.preventDefault();
			}
		}
		this
			.bind('click', clickHandler);
		return this;
	}
})(jQuery); 

// Popup Settings
(function($) {
	var sharebarHandler = function() {	
		var ventana = $(window).width();
		// co es el tamanio de el espacio a cada lado del centro y se le resta 83 por el tamanio del sharebar.
		// 83 es el tamanio de Share bar y 960 es el tamanio de #main.
		var co = parseInt((ventana-960)/2) - 83;
		// Posicionamos el Sharebar
		$('#sharebar').css('left', co);
	}

	$(document).ready(function() { 
		//Tour prices tables.
		$.ajax({
			url: "/sites/all/themes/qellupunuy/get.php",
			type: "GET",
			success: function(cambio){
				$(".fprice").each(function(){
					$(this).css("font-size", "11px");
					price = 0;
					price = parseInt($(this).text());
					// Opera y reemplaza precios.
					$(this)
            .text("USD " + price)
            .next("td")
            .text("S/." + parseInt(price * cambio))
            .css("font-size", "11px");
				});
			}
		})	

		// Popup.
		$('.live-chat').popup(paramsChat);
		$('.live-skype').popup(paramsSkype);

		// Hide Blocks.
		$('#welcome .hide').click(function() {
			$('#welcome').hide('slow');
			return false;
		}) ;
    
    // Making simple link item clickeable.
		$('.simple-item').click(function () {
			l = $(this).find('a').attr('href');
			location.href = l;
		});

		sharebarHandler();
	});
	$(window).resize(function() {
    sharebarHandler();
  });

})(jQuery); 
