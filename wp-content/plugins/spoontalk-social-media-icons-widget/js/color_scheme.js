
function prev_icons()
{
			var style = document.getElementById("icon_style").value;
			jQuery(".sm-preview-pane-load").fadeIn(1500);
			jQuery(".social-icon-prev-inner").fadeOut();
			
			if(style == 'default_style')
			{
				
				document.getElementById('fb-spoontalk-social').style.backgroundColor = '#3b5998';
				document.getElementById('linkedin-spoontalk-social').style.backgroundColor = '#007bb6';
				document.getElementById('tw-spoontalk-social').style.backgroundColor = '#00aced';
				document.getElementById('g-plus-spoontalk-social').style.backgroundColor = '#f74425';
				document.getElementById('rss-spoontalk-social').style.backgroundColor = '#C58542';
				document.getElementById('youtube-spoontalk-social').style.backgroundColor = '#bb0000';
				document.getElementById('pinterest-spoontalk-social').style.backgroundColor = '#cb2027';
				document.getElementById('flickr-spoontalk-social').style.backgroundColor = '#ff0084';
				document.getElementById('instagram-spoontalk-social').style.backgroundColor = '#517fa4';
				document.getElementById('dribble-spoontalk-social').style.backgroundColor = '#00bf8f';
			}
			else
			{
				document.getElementById('fb-spoontalk-social').style.backgroundColor = style;
				document.getElementById('linkedin-spoontalk-social').style.backgroundColor = style;
				document.getElementById('tw-spoontalk-social').style.backgroundColor = style;
				document.getElementById('g-plus-spoontalk-social').style.backgroundColor = style;
				document.getElementById('rss-spoontalk-social').style.backgroundColor = style;
				document.getElementById('youtube-spoontalk-social').style.backgroundColor = style;
				document.getElementById('pinterest-spoontalk-social').style.backgroundColor = style;
				document.getElementById('flickr-spoontalk-social').style.backgroundColor = style;
				document.getElementById('instagram-spoontalk-social').style.backgroundColor = style;
				document.getElementById('dribble-spoontalk-social').style.backgroundColor = style;
				
			}
			setTimeout(function(){
					jQuery(".sm-preview-pane-load").fadeOut();
				jQuery(".social-icon-prev-inner").fadeIn(500);
				},1500);
}



function color_scheme_function1()
{
	var color_scheme = document.getElementById("color_scheme_func").value;
	
	if(color_scheme == "1")
	{
	  jQuery("#new_color_scheme").fadeIn(2000);
	  jQuery("#default_colors").fadeOut();
	  jQuery("#facebook-feed-table_prev").fadeOut();
	}
	else if(color_scheme == "0")
	{
		jQuery("#default_colors").fadeIn(2000);
		jQuery("#new_color_scheme").fadeOut();
		jQuery("#facebook-feed-table_prev").fadeIn(2000);
	}
	else
	{
		jQuery("#default_colors").fadeOut();
		jQuery("#new_color_scheme").fadeOut();
	}
}


function prev_custom_color()
{
	var color = jQuery(".wp-color-result").css("background-color");
    jQuery(".sm-preview-pane-load").fadeIn(1500);
	jQuery(".social-icon-prev-inner").fadeOut();
	
	            document.getElementById('fb-spoontalk-social').style.backgroundColor = color;
				document.getElementById('linkedin-spoontalk-social').style.backgroundColor = color;
				document.getElementById('tw-spoontalk-social').style.backgroundColor = color;
				document.getElementById('g-plus-spoontalk-social').style.backgroundColor = color;
				document.getElementById('rss-spoontalk-social').style.backgroundColor = color;
				document.getElementById('youtube-spoontalk-social').style.backgroundColor = color;
				document.getElementById('pinterest-spoontalk-social').style.backgroundColor = color;
				document.getElementById('flickr-spoontalk-social').style.backgroundColor = color;
				document.getElementById('instagram-spoontalk-social').style.backgroundColor = color;
				document.getElementById('dribble-spoontalk-social').style.backgroundColor = color;
	
	setTimeout(function(){
					jQuery(".sm-preview-pane-load").fadeOut();
				jQuery(".social-icon-prev-inner").fadeIn(500);
				},1500);
	            
}
