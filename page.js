/* PAGE ID'S 
	0 - Home
	1 - Forum
	2 - Meet
	3 - ClassDB
	4 - Calendar
*/

var curpage = 0;
function extractInt(str) {
	return str.match(/\d+/)[0];
}

$(document).ready(function() {
	$('#screen').hide();
	$('.panel').hide();
	$(window).resize();
	$('.dockitem').click( function() {
		var id = extractInt($(this).attr('id'));
		if (curpage > 0) {
			$('#p' + curpage).animate({top: $(window).height()}, 1000, function() {$(this).hide()});
			if (id == 0 || curpage == id) {
				$('#screen').fadeOut(800);
			}
		}
		var newpage = 0;
		if (id > 0 && curpage != id) {
			var pid = $('#p' + id);
			if (curpage > 0) {
				pid.css('top', $(window).height());
				pid.delay(1000).show().animate({top: '0px'}, 1000);
			} else {
				pid.css('top', $(window).height());
				pid.delay(50).show().animate({top: '0px'}, 1000);
				$('#screen').fadeIn(800);
			}
			newpage = id;
		}
		curpage = newpage;
	} );
	$('#screen').click( function() {$('#d0').click()});
	
	// Dock
	$('#dock').Fisheye( {
		maxWidth: 90,
		items: 'a',
		itemsText: 'span',
		container: '.dockcontainer',
		itemWidth: 60,
		proximity: 40,
		alignment : 'left',
		valign: 'bottom',
		halign : 'center'
	}	)
} );