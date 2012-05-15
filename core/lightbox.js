jQuery(document).ready(function($) {
	
	$('.lightbox_trigger').click(function(e) {
		e.preventDefault();
		var image_href = $(this).attr("href");
		if ($('#lightbox').length > 0) { 
			$('#content').html('<img src="' + image_href + '" />');
			//Change this to modify transaction
			//E.g .show(fast) or .show(slow) or fadeIn('fast') or anything else...
			$('#lightbox').fadeIn('fast');
		}
		else { //#lightbox does not exist - create and insert (runs 1st time only)
			//create HTML markup for lightbox window
			var lightbox = 
			'<div id="lightbox">' +
				'<p>Close</p>' +
				'<div id="content">' + 
					'<img src="' + image_href +'" />' +
				'</div>' +	
			'</div>';
				
			$('body').append(lightbox);
		}
		
	});
	//Click anywhere to exit the lightbox
	$('#lightbox').live('click', function() { 
		$('#lightbox').fadeOut('fast');
	});

});