<style>
		.spoontalk-social{
		  <?php 
		  if ($icon_style != "default_style")
		  {
			  echo 'background-color:'.$icon_style.'';
		  }
		  ?>
		
		
		<?php
		if ($icon_style=="default_style")
		{
			echo '.fb-spoontalk-social { background: #3b5998; }.linkedin-spoontalk-social { background: #007bb6; }.tw-spoontalk-social { background: #00aced; }.g-plus-spoontalk-social { background: #f74425; }.rss-spoontalk-social { background: #C58542; } .youtube-spoontalk-social { background: #bb0000; }.pinterest-spoontalk-social { background: #cb2027; } .flickr-spoontalk-social { background: #ff0084; }.instagram-spoontalk-social { background: #517fa4; } .dribble-spoontalk-social { background: #00bf8f;
}';
		}
		?>	

}		
</style>