$(document).ready( function () {
	var iframe_width = $('#leftbar').width()+100;
	var iframe_height = $('#leftbar').height();
	var window_height = $(window).height();
	
	var top_adjustment = (window_height - iframe_height)/2;
	
	if(window_height > iframe_height) {
		var styles = {
		  position : "absolute",
		  top : Math.abs(top_adjustment)+"px",
		  left : "-"+iframe_width+"px"
		};
	} else {
		var styles = {
		  position : "absolute",
		  left : "-"+iframe_width+"px"
		};

	}
	
	$('#leftbar').css(styles);
	
	var panel_button_height = $('#panelToggle').width();
	var panel_button_top_adjustment = (window_height - panel_button_height)/2;
	$('#panelToggle').css("top", panel_button_top_adjustment+"px");
	
	$('#panelToggle').click( function () {
		var panel_position = $('#leftbar').position();
		$('#leftbar').animate({ left: '0' }, 1000);
		
		$(this).hide();
		$('#closeButton').show();
		$(this).stop();
		return false;
	});
	
	$('#closeButton').click( function () {
		$('#leftbar').animate({ left: "-"+(iframe_width+100)+"px" }, 1000);
		
		setTimeout(function(){ 
			$('#closeButton').hide();
			$('#panelToggle').show();
		}, 1000);
	});
});