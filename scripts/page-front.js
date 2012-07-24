(function($) {
	var popContent = '<h3><a href="/hoteles-en-%s">Hoteles en %s</a></h3>' +
			'<p>Hoteles en %s, desde <strong class="pop-price">$USD %s</p>' +
			'<p class="hotel-actions"><a href="/hoteles-en-%s" class="button">&iexcl;Reservar ahora!</a></p>';
	$(document).ready(function() { 
		$('#map-home').gMap({
			markers: [
				{
					latitude: -15.843333,
					longitude: -70.023611,
					html: sprintf(popContent,'puno', 'Puno', 'Puno', '100', 'puno'),
					icon: iother,
				},
				{
					latitude: -14.8391,
					longitude: -74.940323,
					html: sprintf(popContent, 'nazca', 'Nazca', 'Nazca', '200', 'nazca'),
					icon: iother,
				},
				{
					latitude: -13.834655,
					longitude: -76.24936,
					html: sprintf(popContent, 'paracas', 'Paracas', 'Paracas', '50', 'paracas'), 
					icon: iother,
				},
				{
					address: 'Cusco, Peru',
					html: sprintf(popContent, 'cusco', 'Cusco', 'Cusco', '200', 'cusco'),
					icon: iprincipal,
				},
				{
					address: 'Arequipa, Peru',
					html: sprintf(popContent, 'arequipa', 'Arequipa', 'Arequipa', '150', 'arequipa'), 
					icon: iprincipal,
				},
				{
					address: 'Lima, Peru',
					html: sprintf(popContent, 'lima', 'Lima', 'Lima', '42', 'lima'),
					icon: iprincipal,
				},
				{
					address: 'Machupicchu, Cusco, Peru',
					html: sprintf(popContent, 'aguas-calientes-machu-picchu', 'Machu Picchu', 'Machu Picchu', '40', 'aguas-calientes-machu-picchu'),
					icon: iprincipal,
				},
				{
					address: 'Urubamba, Cusco, Peru',
					html: sprintf(popContent, 'valle-sagrado-de-los-incas', 'Valle Sagrado', 'Valle Sagrado de los Incas', '25', 'valle-sagrado-de-los-incas'),
					icon: iother,
				},
				{
					address: 'Trujillo, Peru',
					html: sprintf(popContent, 'trujillo', 'Trujillo', 'Trujillo', '49', 'trujillo'),
					icon: iother,
				},
			],
			mapTypeControl: false,
			zoomControl: true,
			streetViewControl: false,
			latitude: -9.189967,
			longitude: -75.015152,
			zoom: 10,
		});
		
		// More hotels.
		$('#home-main').find('.block-title a').each(function() {
			var block = $(this).parent().parent();
			var view_content = block.find('.view-content');
			var more = $(this).clone();
			more.text(more.attr('title'));
			more.appendTo($('<p></p>').addClass('more-hotels').appendTo(view_content));
		});
  });
})(jQuery); 
