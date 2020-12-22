<?php
/*---------------------------------------------------
Styling for social icons
----------------------------------------------------*/



function spoontalk_social_scripts()
		{
		  
			$spoontalk_social_style_settings = get_option ('spoontalk_social_style_settings');
		
		  	$size = $spoontalk_social_style_settings['size'];
			$alignment = $spoontalk_social_style_settings['align'];
			$border = $spoontalk_social_style_settings['border'];
			$bottom_spacing=$spoontalk_social_style_settings['bottom_spacing'];
			$icon_style=$spoontalk_social_style_settings['icon_style'];
              
			?>
			<style>
			.spoontalk-social
			{
			color: white !important;
			text-align: center !important;
			margin-bottom:<?php echo $bottom_spacing;?>px;
			border-radius:<?php echo $border;?>%;

		    background:<?php echo $spoontalk_social_style_settings['icon_style']; ?>;
	
<?php
			// Checking size  if size if 40
			if( $size=="40")
			{
			?>
			line-height: 51px !important;
			width: 48px !important;
			height: 48px !important;
			font-size: 2em !important;
			<?php
			}
			if( $size=="35")
			{
			// Checking size if its 35 then set it
			?>
			line-height: 34px !important;
			width: 32px !important;
			height: 32px !important;
			font-size: 1.5em !important;
			<?php
			}
			if( $size=="30")
			{
			// Checking size if its  30 small then set it
			?>
			line-height: 25px !important;
			width: 30px !important;
			height: 24px !important;
			font-size: 1em !important;
			<?php
			}
			if( $size=="25")
			{
			// Checking size if 25  then set it
			?>
			line-height: 25px !important;
			width: 24px !important;
			height: 24px !important;
			font-size: 1em !important;
			<?php
			}
			?>
			
	
			}
			
		
.alignment { text-align:<?php echo $alignment;?>; }
<?php   if($icon_style=='default_style') { ?>		 
.fb-spoontalk-social { background: #3b5998; }

.tw-spoontalk-social { background: #00aced; }

.linkedin-spoontalk-social { background: #007bb6; }

.g-plus-spoontalk-social{ background:#f74425 ; }

.rss-spoontalk-social { background: #C58542; }

.youtube-spoontalk-social { background: #bb0000; }

.pinterest-spoontalk-social {background: #cb2027; }

.flickr-spoontalk-social { background: #ff0084; }

.instagram-spoontalk-social { background: #517fa4; }

.dribble-spoontalk-social { background: #00bf8f; }
<?php  }   ?>
</style>
<?php
	}
	add_action('wp_enqueue_scripts', 'spoontalk_social_scripts');
?>