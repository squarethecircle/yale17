var pageid = { // CaSe-SeNsItIvE!
  0: "home",
  1: "forum",
	2: "meet",
	3: "classDB",
	4: "calendar",
	5: "resources",
	6: "wall"
};

$('#panels').ready(function() { // Automatically generate code for panels
	var html = '';
	for (var i in pageid) {
		if (i > 0){
			html += '<div class="panel" id="p' + i + '"><div class="insidepanel"></div></div>';
		}
	}
	$('#panels').html(html);
});
$('.dockcontainer').ready(function() { // Automatically generate code for dock items
	var html = '', pname;
	for (var i in pageid) {
		pname = pageid[i];
		html += '<a class="dockitem" id="d' + i + '"><span>' + pname.charAt(0).toUpperCase() + pname.slice(1) + '</span><img src="gfx/dock/' + pname + '.png" /></a>';
	}
	$('.dockcontainer').html(html);
});

var curpage = 0;
function extractInt(str) {
	return str.match(/\d+/)[0];
}

$(document).ready(function() {
	// Initialize
	$('#screen').hide();
	$('.panel').hide();
	
	// Handle panel animations and loading
	$('.dockitem').click( function() {
		var id = extractInt($(this).attr('id'));
		if (curpage > 0) {
			$('#p' + curpage).animate({top: $(window).height()}, 1000, function() {
				$(this).hide(); $(this).children().html('');
			});
			var pid = $('#p' + curpage);
			pid.children().html('');
			//pid.hide("slide", { direction: "down" }, 1000);
			if (id == 0 || curpage == id) {
				$('#screen').fadeOut(800);
				$(this).css("opacity", "1");
				$('a.dockitem').animate({color: "#ffffff"}, 1000);
			}
		}
		var newpage = 0;
		if (id > 0 && curpage != id) {
				var pid = $('#p' + id);
				pid.css('top', $(window).height());
				if (curpage > 0) {
					pid.delay(1000);
				} else {
					pid.delay(50);
					$('a.dockitem').animate({color: "#000000"}, 1000);
					$('#screen').fadeIn(800);
				}
				pid.children().html('<h2>Loading...</h2>');
				/*pid.show("slide", { direction: "down" }, 1000);
				$.get("p" + pageid[id] + ".php", function(data){
					pid.children().html(data);
				});*/
				pid.show().animate({top: '0px'}, 1000, function() {
					$.get("p" + pageid[id] + ".php", function(data){
						pid.children().html(data);
					});
				});
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
	$('.dockcontainer').hover( function() {
			$(this).css("opacity", "1");
		}, function() {
			if (curpage > 0) {
				$(this).css("opacity", "0.2");
			}
		}
	);
} );