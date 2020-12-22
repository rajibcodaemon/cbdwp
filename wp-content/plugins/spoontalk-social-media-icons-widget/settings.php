<?php 

// Lets write the default styling Settings Variable which we will be supporting  default value 


if ( isset( $_POST['submit'] ) ) 
{
$Facebook = $_POST['fb'];
$Linkedin = $_POST['lnkd'];
$Twitter = $_POST['twtr'];
$GooglePlus = $_POST['gp'];

$rss = $_POST['rss'];
$youtube = $_POST['ytube'];
$pinterest = $_POST['prest'];
$flickr = $_POST['fkr'];
$instagram = $_POST['igram'];
$dribble = $_POST['dbr'];


update_option('Facebook',$Facebook);
update_option('Linkedin',$Linkedin);
update_option('Twitter',$Twitter);
update_option('GooglePlus',$GooglePlus);

update_option('rss',$rss);
update_option('youtube',$youtube);
update_option('pinterest',$pinterest);
update_option('flickr',$flickr);
update_option('instagram',$instagram);
update_option('dribble',$dribble);

}
// default  design data  settings for the plugin 

function spoontalk_get_option_defaults() {
$defaults = array ( 
    'border' => 1,
    'align' => 'left',
	'size' => 30,
	'spacing' => 10,
	'bottom_spacing' => 5,
	'newtab'=>0,
	'hover_animation'=>'none',
	'icon_style'=>'default_style',
	'icon_type'=>''
        ); 
  
   return apply_filters( 'spoontalk_social_style_settings', $defaults );
}

if ( false == get_option( 'spoontalk_social_style_settings' ) ) {
	update_option( 'spoontalk_social_style_settings', spoontalk_get_option_defaults() );
}
$spoontalk_social_style_settings = get_option( 'spoontalk_social_style_settings' );


$spoontalk_social_style_settings = wp_parse_args( 
    get_option( 'spoontalk_social_style_settings', array() ), 
    spoontalk_get_option_defaults() 
);

if ( isset( $_POST['submit1'] ) ) 
{
$spoontalk_social_style_settings['border'] = $_POST['border'];
$spoontalk_social_style_settings['align'] = $_POST['align'];
$spoontalk_social_style_settings['size'] = $_POST['size'];
$spoontalk_social_style_settings['spacing'] = $_POST['spacing'];
$spoontalk_social_style_settings['bottom_spacing'] = $_POST['bottom_spacing'];
$spoontalk_social_style_settings['newtab'] = $_POST['newtab'];
$spoontalk_social_style_settings['hover_animation'] = $_POST['hover_animation'];
update_option('spoontalk_social_style_settings', $spoontalk_social_style_settings);
}

if ( isset( $_POST['color_setting_submit'] ) ) 
{

$spoontalk_social_style_settings['icon_style'] = $_POST['icon_bg_color'];
if(empty($_POST['icon_bg_color'])){
	$spoontalk_social_style_settings['icon_style'] = 'default_style';
}
$spoontalk_social_style_settings['icon_type'] = '1';

update_option('spoontalk_social_style_settings', $spoontalk_social_style_settings);

}

if( isset( $_POST['color_default_setting'] ) )
{
	$spoontalk_social_style_settings['icon_style'] = $_POST['icon_style'];
	$spoontalk_social_style_settings['icon_type'] = '0';
	
	update_option('spoontalk_social_style_settings', $spoontalk_social_style_settings);
}


?>

<div class="wrap settings-wrap" id="page-settings">
    <h2> SpiceMailer Social Icon Settings</h2>
    <div id="option-tree-header-wrap">
        <ul id="option-tree-header">
            <li id=""><a href="" target="_blank"></a>
            </li>
            <li id="option-tree-version"><span>Social Media Link Plugin </span>
            </li>
        </ul>
    </div>
<div id="option-tree-settings-api">
    <div id="option-tree-sub-header"></div>
     <div class = "ui-tabs ui-widget ui-widget-content ui-corner-all">
      <ul>
        <li id="tab_create_setting"><a href="#section_general">Social Media URL</a></li>
        <li id="tab_import"><a href="#section_design" >Design Customization</a></li>
		<li id="tab_import"><a href="#section_color" >Color Setting  </a></li>
		  <li id="tab_import"><a href="#section_reorder" >Re order Icons</a></li>
        <li id="tab_import"><a href="#section_howto" >FAQ</a></li>
        <li id="tab_import"><a href="#section_advanced" >Get the Advanced Version</a></li>
      </ul>
<div id="poststuff" class="metabox-holder">
  <div id="post-body">
    <div id="post-body-content">
    
<div id="section_general" class = "postbox">
 <div class="inside">
  <div id="setting_theme_options_ui_text" class="format-settings">
   <div class="format-setting-wrap">
    <h2>Social Media URL Settings >></h2>                                  
	<form method="post" action="#section_general">
	
    <table class="form-table">      
		<tr valign="top">
		<th scope="row"><i class="fa fa-facebook"></i><br/><label class="icon_label" for="fb">Facebook:</label></th>
        <td><input class="regular-text" type="text" size="20" name="fb" id="fb" value= "<?php echo get_option( 'Facebook' );?>" />
		<p class="description">enter facebook URL for eg https://www.facebook.com</p>
		</td>
		<th scope="row"><i class="fa fa-linkedin"></i><br/><label for="lnkd">Linkedin:</label></th>
        <td><input class="regular-text" type="text" size="64" name="lnkd" id="lnkd" value= "<?php echo get_option( 'Linkedin' );?>" />
		<p class="description">enter linkedin URL for eg https://www.linkedin.com</p></td>
		</tr>
		
		<tr valign="top">
         <th scope="row"><i class="fa fa-twitter"></i><br/><label for="twtr">Twitter:</label></th>
         <td><input class="regular-text" type="text" size="64" name="twtr" id="twtr" value= "<?php echo get_option( 'Twitter' );?>" />
		  <p class="description">enter twitter URL for eg https://www.twitter.com</p></td>
		  <th scope="row"><i class="fa fa-google-plus"></i><br/><label for="gp">G Plus:</label></th>
          <td><input class="regular-text" type="text" size="64" name="gp" id="gp" value= "<?php echo get_option( 'Googleplus' );?>" />
		<p class="description">enter twitter URL for eg https://www.plus.google.com</p></td>
		</tr>
		
	 <tr valign="top">
         <th scope="row"><i class="fa fa-rss"></i><br/><label for="rss">Rss:</label></th>
         <td><input class="regular-text" type="text" size="64" name="rss" id="rss" value= "<?php echo get_option( 'rss' );?>" />
		  <p class="description">enter twitter URL for eg https://www.rss.com</p></td>
		  <th scope="row"><i class="fa fa-youtube"></i><br/><label for="ytube">Youtube:</label></th>
          <td><input class="regular-text" type="text" size="64" name="ytube" id="ytube" value= "<?php echo get_option( 'youtube' );?>" />
		<p class="description">enter twitter URL for eg https://www.youtube.com</p></td>
		</tr>
		
		<tr valign="top">
         <th scope="row"><i class="fa fa-pinterest"></i><br/><label for="preest">Pinterest:</label></th>
         <td><input class="regular-text" type="text" size="64" name="prest" id="prest" value= "<?php echo get_option( 'pinterest' );?>" />
		  <p class="description">enter twitter URL for eg https://www.twitter.com</p></td>
		  <th scope="row"><i class="fa fa-flickr"></i><br/><label for="fkr">Flickr:</label></th>
          <td><input class="regular-text" type="text" size="64" name="fkr" id="fkr" value= "<?php echo get_option( 'flickr' );?>" />
		<p class="description">enter twitter URL for eg https://www.plus.Flickr.com</p></td>
		</tr>
		
		<tr valign="top">
         <th scope="row"><i class="fa fa-instagram"></i><br/><label for="igram">Instagram:</label></th>
         <td><input class="regular-text" type="text" size="64" name="igram" id="igram" value= "<?php echo get_option( 'instagram' );?>" />
		  <p class="description">enter twitter URL for eg https://www.instagram.com</p></td>
		  <th scope="row"><i class="fa fa-dribbble"></i><br/><label for="dbr">Dribble:</label></th>
          <td><input class="regular-text" type="text" size="64" name="dbr" id="dbr" value= "<?php echo get_option( 'dribble' );?>" />
		<p class="description">enter twitter URL for eg https://www.plus.dribbble.com</p></td>
		</tr>
		
		<tr valign="top">
        <td><input type="submit" name="submit" value="save settings" class="button button-primary" /></td>
        </tr>
    </table>
	</form>                                  
   </div>
  </div>
 </div>
</div>
    
<div id="section_design" class = "postbox">
 <div class="inside">
  <div id="setting_import_xml_text" class="format-settings">
   <div class="format-setting-wrap">
   <h2>Design Customization Settings >></h2>
    <div class="format-setting-label">                                    
	<form method="post" action="#section_design">
	<?php
		$spoontalk_social_style_settings = get_option ('spoontalk_social_style_settings');
	    $size = $spoontalk_social_style_settings['size'];
	  	$border = $spoontalk_social_style_settings['border'];
	    $align = $spoontalk_social_style_settings['align'];
		$spacing=$spoontalk_social_style_settings['spacing'];
		$bottom_spacing=$spoontalk_social_style_settings['bottom_spacing'];
		$newtab=$spoontalk_social_style_settings['newtab'];
		$hover_animation=$spoontalk_social_style_settings['hover_animation'];		
	?>
    <table class="form-table">									
		<tr valign="top">
		<th scope="row"><label for="border">Icon Border Radius:</label></th>
		<td><select id="border" name="border">
		<?php for($p=1; $p<=50; $p++){ ?>
		<option  <?php
		if ($border==$p) echo 'selected="selected"';  ?>  ><?php echo $p;  }?></option> 
		</select><label for="border">%Percent</label><p class="description">Select 50% for round shape icon </p></td>
		<th scope="row"><label for="size">Icon Size:</label></th>
		<td><select id="size" name="size">
	
		<option  <?php
		if ($size=="25") echo 'selected="selected"';  ?>  ><?php _e('25',''); ?></option>
		<option  <?php
		if ($size=="30") echo 'selected="selected"';  ?>  ><?php _e('30',''); ?></option>
			<option  <?php
		if ($size=="35") echo 'selected="selected"';  ?>  ><?php _e('35',''); ?></option>
		<option  <?php
		if ($size=="40") echo 'selected="selected"';  ?>  ><?php _e('40',''); ?></option> 
		</select><label for="size">px</label><p class="description">select icon size from list. for eg 25 px</p></td>
		</tr>
	
		
		<tr valign="top">
		<th scope="row"><label for="align">Alignment:</label></th>
		<td><select id="align" name="align">
		
		<option  <?php
		if ($align=="left") echo 'selected="selected"';  ?>  ><?php _e('left',''); ?></option> 
		<option  <?php
		if ($align=="center") echo 'selected="selected"';  ?>  ><?php _e('center',''); ?></option>
		<option  <?php
		if ($align=="right") echo 'selected="selected"';  ?>  ><?php _e('right',''); ?></option>
		</select><p class="description">select icons alignment. for eg left</p></td>
		
		<th scope="row"><label for="spacing">Spacing:</label></th>
		<td><select id="spacing" name="spacing">
		<?php for($s=1; $s<=20; $s++){ ?>
		<option  <?php
		if ($spacing==$s) echo 'selected="selected"';  ?>  ><?php echo $s;  }?></option> 
		</select><label for="spacing">PX</label><p class="description">Manage space between icons  </p></td>
		</tr>
		
		
		<tr valign="top">
		
		
		<th scope="row"><label for="bottom_spacing">Bottom Spacing:</label></th>
		<td><select id="bottom_spacing" name="bottom_spacing">
		<?php for($bottom_s=1; $bottom_s<=20; $bottom_s++){ ?>
		<option  <?php
		if ($bottom_spacing==$bottom_s) echo 'selected="selected"';  ?>  ><?php echo $bottom_s;  }?></option> 
		</select><label for="bottom_spacing">PX</label><p class="description">Manage bottom Space of icons  </p></td>
		
		<th scope="row"><label for="bottom_spacing">Open links new tab:</label></th>
	    <td>
        <input id="newtab" name="newtab" type="checkbox" value="1" <?php checked('1', $newtab); ?> />
		<p class="description">Click on this to open link in a new tab  </p>
         </td>
		
		</tr>
		
		<!-- Hove on animation -->
				
		<tr valign="top">
		 	<th scope="row"><label for="animation hour">Animation on Hover :</label></th>
		 <td>
		 <select id="hover_animation" name="hover_animation">
		<option value="none" <?php if ($hover_animation=="none") echo 'selected="selected"';  ?>  ><?php _e('none',''); ?></option>
		<option value="spoontalk-rotate" <?php if ($hover_animation=="spoontalk-rotate") echo 'selected="selected"';  ?>  ><?php _e('rotate',''); ?></option>
		<option  value="hvr-grow-rotate" <?php if ($hover_animation=="hvr-grow-rotate") echo 'selected="selected"';  ?>  ><?php _e('grow-rotate',''); ?></option>
		<option value="hvr-shrink" <?php if ($hover_animation=="hvr-shrink") echo 'selected="selected"';  ?>  ><?php _e('shrink',''); ?></option> 
		<option value="hvr-wobble-to-bottom-right" <?php if ($hover_animation=="hvr-wobble-to-bottom-right") echo 'selected="selected"';  ?>  ><?php _e('wobble',''); ?></option> 
		<option value="hvr-wobble-vertical" <?php if ($hover_animation=="hvr-wobble-vertical") echo 'selected="selected"';  ?>  ><?php _e('wobble-vertical',''); ?></option> 
		<option value="hvr-buzz" <?php if ($hover_animation=="hvr-buzz") echo 'selected="selected"';  ?>  ><?php _e('buzz',''); ?></option> 
		
		<option value="hvr-grow"  <?php if ($hover_animation=="hvr-grow") echo 'selected="selected"';  ?>  ><?php _e('grow',''); ?></option> 
		<option value="hvr-pulse" <?php if ($hover_animation=="hvr-pulse") echo 'selected="selected"';  ?>  ><?php _e('pulse',''); ?></option> 
		<option value="hvr-pulse-grow" <?php if ($hover_animation=="hvr-pulse-grow") echo 'selected="selected"';  ?>  ><?php _e('pulse-grow',''); ?></option> 
		<option value="hvr-pulse-shrink" <?php if ($hover_animation=="hvr-pulse-shrink") echo 'selected="selected"';  ?>  ><?php _e('pulse-shrink',''); ?></option> 
		<option value="hvr-push" <?php if ($hover_animation=="hvr-push") echo 'selected="selected"';  ?>  ><?php _e('push',''); ?></option> 
		<option value="hvr-pop"  <?php if ($hover_animation=="hvr-pop") echo 'selected="selected"';  ?>  ><?php _e('pop',''); ?></option> 
		<option value="hvr-bounce-in" <?php if ($hover_animation=="hvr-bounce-in") echo 'selected="selected"';  ?>  ><?php _e('bounce-in',''); ?></option> 
		<option value="hvr-bounce-out" <?php if ($hover_animation=="hvr-bounce-out") echo 'selected="selected"';  ?>  ><?php _e('bounce-out',''); ?></option> 
		<option value="hvr-float" <?php if ($hover_animation=="hvr-float") echo 'selected="selected"';  ?>  ><?php _e('float',''); ?></option> 
		<option value="hvr-sink" <?php if ($hover_animation=="hvr-sink") echo 'selected="selected"';  ?>  ><?php _e('sink',''); ?></option> 
		<option value="hvr-bob"  <?php if ($hover_animation=="hvr-bob") echo 'selected="selected"';  ?>  ><?php _e('bob',''); ?></option> 
		<option value="hvr-hang" <?php if ($hover_animation=="hvr-hang") echo 'selected="selected"';  ?>  ><?php _e('hang',''); ?></option> 	
		<option value="hvr-skew" <?php if ($hover_animation=="hvr-skew") echo 'selected="selected"';  ?>  ><?php _e('skew',''); ?></option> 	
		<option value="hvr-skew-forward" <?php if ($hover_animation=="hvr-skew-forward") echo 'selected="selected"';  ?>  ><?php _e('skew-forward',''); ?></option> 
		<option value="hvr-skew-backward" <?php if ($hover_animation=="hvr-skew-backward") echo 'selected="selected"';  ?>  ><?php _e('skew-backward',''); ?></option> 
		<option value="hvr-wobble-horizontal" <?php if ($hover_animation=="hvr-wobble-horizontal") echo 'selected="selected"';  ?>  ><?php _e('wobble-horizontal',''); ?></option> 
		<option value="hvr-wobble-top" <?php if ($hover_animation=="hvr-wobble-top") echo 'selected="selected"';  ?>  ><?php _e('wobble-top',''); ?></option> 
		<option value="hvr-wobble-bottom" <?php if ($hover_animation=="hvr-wobble-bottom") echo 'selected="selected"';  ?>  ><?php _e('wobble-bottom',''); ?></option> 
		<option value="hvr-wobble-skew" <?php if ($hover_animation=="hvr-wobble-skew") echo 'selected="selected"';  ?>  ><?php _e('wobble-skew',''); ?></option> 
		
		</select>
		<label for="size">px</label><p class="description">select the hover animation effect </p></td>
		
		</tr>
		
		<tr valign="top">
        <td><input type="submit" name="submit1" value="save settings" class="button button-primary" /></td>
        </tr>
		</table>
		</form>									
				
    </div>
   </div>
  </div>
 </div>
</div>

<!--Color Setting section -->
   	
<div id="section_color" class = "postbox">
<div class="inside">
  <div id="setting_import_xml_text" class="format-settings">
   <div class="format-setting-wrap">
    <h2>Color Settings >></h2>
    <div class="format-setting-label">
	 <?php   
	 
	   $spoontalk_social_style_settings = get_option ('spoontalk_social_style_settings');
		
	   $icon_style = $spoontalk_social_style_settings['icon_style'];
       $icon_type = $spoontalk_social_style_settings['icon_type'];	   
	   
	   if($icon_style=='default_style') {  $icon_bg_color = $icon_style; 
	   } 
	   else 
	   { //echo $spoontalk_icon_bg_color = $spoontalk_social_style_settings['icon_bg_color']; 
			      $icon_bg_color = $icon_style;
	    }
		
	    // include css php file		
		include 'css/style.php';
		
	    $Facebook =get_option('Facebook');
		$Linkedin = get_option('Linkedin');
		$Twitter = get_option('Twitter');
		$GooglePlus = get_option('GooglePlus');
		
		$rss =get_option('rss');
		$youtube = get_option('youtube');
		$pinterest = get_option('pinterest');
		$flickr = get_option('flickr');
		$instagram =get_option('instagram');
		$dribble = get_option('dribble');
		
		
		$spoontalk_social_style_settings = get_option ('spoontalk_social_style_settings');
		$size = $spoontalk_social_style_settings['size'];
		$alignment = $spoontalk_social_style_settings['align'];
		$spacing=$spoontalk_social_style_settings['spacing'];
		$newtab=$spoontalk_social_style_settings['newtab'];
		$hover_animation=$spoontalk_social_style_settings['hover_animation'];
		
	  ?>
      <div class="facebook-feed-row">
	        <table class="form-table facebook-feed-table">
				    <tr valign="top">
					<th scope="row"><label for="border">Select Social Icon Style :</label></th>
					<td>
					  <select id="color_scheme_func" name="color_scheme_func" onChange="color_scheme_function1();">
						<option value=""><?php _e('-- Choose your color scheme --',''); ?></option>
						<option value="0" <?php if($icon_type == '0'){ echo 'selected'; }?>><?php _e('Select Predfined color scheme',''); ?></option>
						<option value="1" <?php if($icon_type == '1'){ echo 'selected'; }?>><?php _e('Define Custom Color Scheme',''); ?></option>
					  </select>
					</td>
					</tr>
				</table>
				<form method="post" action="">
				<table id="default_colors" class="form-table default_colors facebook-feed-table" <?php if($icon_type == '0'){ echo 'style="display:block;"'; }else{ echo 'style="display:none;"'; } ?>>
				   <tr valign="top">
					<th scope="row"><label for="border">Select Icon style :</label></th>
					<td>
						<select id="icon_style" name="icon_style" onChange="prev_icons();">
						<option  value="default_style" <?php if ($icon_style=="default_style") echo 'selected="selected"';  ?>  ><?php _e('default_style',''); ?></option>
						<option  value="#B995C5" <?php if ($icon_style=="#B995C5") echo 'selected="selected"';  ?>  ><?php _e('African Violet',''); ?></option>
						<option  value="#85C33F" <?php if ($icon_style=="#85C33F") echo 'selected="selected"';  ?>  ><?php _e('Apple',''); ?></option>
						<option  value="#000000" <?php if ($icon_style=="#000000") echo 'selected="selected"';  ?>  ><?php _e('Black',''); ?></option>
						<option  value="#6B2545" <?php if ($icon_style=="#6B2545") echo 'selected="selected"';  ?>  ><?php _e('Boysenberry',''); ?></option>
						<option  value="#FF99B3" <?php if ($icon_style=="#FF99B3") echo 'selected="selected"';  ?>  ><?php _e('Cayenne',''); ?></option>
						
						</select><p class="description">Select Background color for Icons </p>
					</td>
					</tr>
					<tr valign="top">
					<td><input type="submit" name="color_default_setting" value="Save settings" class="button button-primary" /></td>
					</tr>
                  </table>
				  </form>
				  
				  <form method="post" action="#section_design">
                  <table id="new_color_scheme" class="form-table new_color_scheme facebook-feed-table" <?php if($icon_type == '1'){ echo 'style="display:block;"'; }else{ echo 'style="display:none;"'; } ?>>									
					<div class="hide_color_picker">			
					<tr valign="top" class="hide_color_picker">
					<th scope="row">Change Icon Background </th>
					<td>
					<p class="">This feature is only Available in the Advanced Version. </p><p> The advanced version also comes with 30 predefined colors</p>
					</td>
					 
					</tr> 
					</div>			
					<tr valign="top" >
					<td><input type="submit" name="color_setting_submit" value="Save settings" class="button button-primary" disabled /></form></td>
					</tr>
					
                 </table>
                 

               <table id="facebook-feed-table_prev" class="form-table facebook-feed-table" <?php if($icon_type == '1'){ echo 'style="display:none;"'; } ?>>
			      <tr>
					   <td colspan="2" Style="width:98%; display:inline-block;"> 
					       <p style="text-align:center;"><strong>Preview</strong></p>
					    <div class="social-icon-prev-inner">
						<div class="alignment">
							<a href=""  style="margin-left:<?php echo $spacing?>px;"><i id="fb-spoontalk-social" style="background-color:<?php echo $icon_style; ?>;" class="fa fa-facebook fb-spoontalk-social spoontalk-social <?php echo $spoontalk_hover_animation ?>"></i></a>

							<a href="" style="margin-left:<?php echo $spacing?>px"><i id="linkedin-spoontalk-social" style="background-color:<?php echo $icon_style; ?>;"  class="fa fa-linkedin linkedin-spoontalk-social spoontalk-social <?php echo $spoontalk_hover_animation ?> "></i></a>
							
							<a href="" style="margin-left:<?php echo $spacing?>px"><i id="tw-spoontalk-social" style="background-color:<?php echo $icon_style; ?>;"  class="fa fa-twitter tw-spoontalk-social spoontalk-social <?php echo $spoontalk_hover_animation ?> "></i></a>
							
							<a href="" style="margin-left:<?php echo $spacing?>px"><i id="g-plus-spoontalk-social" style="background-color:<?php echo $icon_style; ?>;" class="fa fa-google-plus g-plus-spoontalk-social spoontalk-social <?php echo $spoontalk_hover_animation ?> "></i></a>
		
								<a href="" style="margin-left:<?php echo $spacing?>px"><i id="rss-spoontalk-social" style="background-color:<?php echo $icon_style; ?>;" class="fa fa-rss rss-spoontalk-social spoontalk-social <?php echo $spoontalk_hover_animation ?> "></i></a>

								<a href="" style="margin-left:<?php echo $spacing?>px"><i id="youtube-spoontalk-social" style="background-color:<?php echo $icon_style; ?>;" class="fa fa-youtube youtube-spoontalk-social spoontalk-social <?php echo $spoontalk_hover_animation ?> "></i></a>

								<a href="" style="margin-left:<?php echo $spacing?>px"><i id="pinterest-spoontalk-social" style="background-color:<?php echo $icon_style; ?>;" class="fa fa-pinterest pinterest-spoontalk-social spoontalk-social <?php echo $spoontalk_hover_animation ?> "></i></a>

								<a href="" style="margin-left:<?php echo $spacing?>px"><i id="flickr-spoontalk-social" style="background-color:<?php echo $icon_style; ?>;" class="fa fa-flickr flickr-spoontalk-social spoontalk-social <?php echo $spoontalk_hover_animation ?> "></i></a>

								<a href="" style="margin-left:<?php echo $spacing?>px"><i id="instagram-spoontalk-social" style="background-color:<?php echo $icon_style; ?>;" class="fa fa-instagram instagram-spoontalk-social spoontalk-social <?php echo $spoontalk_hover_animation ?> "></i></a>
								
								<a href="" style="margin-left:<?php echo $spacing?>px"><i id="dribble-spoontalk-social" style="background-color:<?php echo $icon_style; ?>;" class="fa fa-dribbble  dribble-spoontalk-social spoontalk-social <?php echo $spoontalk_hover_animation ?>"></i></a>
							</div>
					      </div>
						  <br/>
						  <p class="sm-preview-pane-load" style="text-align:center;"><img src="<?php echo plugin_dir_url( __FILE__ ).'img/load.gif'; ?>" width="50" height="50" /></p>
					   </td>
					</tr>
               </table>			   
			<div class="clear"></div>
	  </div>
<!-- Use inline css to hide the color picker when the default style is selected -->		 
<?php   
if($icon_style=='default_style') {  
?>
			 <style>
				.hide_color_picker { display:none; }
			 </style>
 
<?php  } ?>					
  </div>
   </div>
  </div>
 </div>
</div>
<!--end of color setting -->

<div id="section_reorder" class = "postbox">



 <p><img src="<?php echo plugin_dir_url( __FILE__ ).'img/reorder-feature-post.png'; ?>" width=100% height="100%" /></p>

<p>1. This feature is available in the advanced version. </p>

<p>2. The advanced version is available for free. Refer to the Get Advanced Version Tab for more information.</p>




	</div>



<div id="section_howto" class = "postbox">

<p>1. Add Social Media Urls by going to Social Media URL Tab. If you plan to hide a particular social icon then simply leave the url empty. </p>

<p>2. Customize the Design to suit your style. We currently Support 5 Design Settings</p>
<p>3. In order to create circular / round icons simply set Icon Border Radius 50%</p>
<p>4. Now go to Appearance ->Widgtes and use the SpiceMailer Social Icons Widget.</p>
<p>4. For any query contact us via the <a href = "https://wordpress.org/support/plugin/spoontalk-social-media-icons-widget" target = "_blank">Wordpress Forums</a></p>
<br>
</p><strong>Features in Advanced Version</strong><p>
	<p>Icon Reorder Feature</p>
	<p>Multiple Color Schemes</p>
<p>FEature to define custom color. </p>


	</div>
	
	
	
	<div id="section_advanced" class = "postbox">

<p><strong><h4>The Advance Version comes with following additional features</strong></h4> </p>

<p>1. 25 additional PreDefined Color Schemes</p>
<p>2. Ability to Define Custom Color Scheme</p>
<p>3. Ability to Reorder the Icons</p>
<p>4. For any query contact us via the <a href = "https://wordpress.org/support/plugin/spoontalk-social-media-icons-widget" target = "_blank">Wordpress Forums</a></p>
<br>
</p><h4><strong>Get the Advanced version - Free</strong></h4><p>
	<p>Get the advance version for free. Simply <a target = "_blank" href = "https://thewphosting.com/wordpress/get-advanced-version-social-media-icons-widget/">subscribe to TheWPHosting Blog </a> and we will send you the download link via Email</p>
	<br>
	<p></p>
	<p><h4><strong>Some Posts on TheWPHosting Blog</strong></h4></p>
	
	
	<p>We regularly share practical wordpress tips on TheWPHosting. Here are some of our best posts </p>
	<p><a target = "_blank" href = "https://thewphosting.com/wordpress/a-simple-guide-to-customizing-wordpress-text-widget/">Guide to customizing Wordpress Text Widget</a>,  </p><p><a target = "_blank" href= "https://thewphosting.com/wordpress/add-google-site-search-wordpress/"> How to Add Google Site Search to Wordpress</a>,</p><p> <a target = "_blank" href = "https://thewphosting.com/wordpress/add-grayscale-hover-effects-images-wordpress/"> How to add Greyscale Hover effect in Wordpress</a><p>

<p><h4><strong>About TheWPHosting</strong></h4> </p>
<p>TheWPHosting is an educational blog which shares wordpress tips and tricks for beginner and advanced users. If you have a question related to wordpress, simply feel free to ask and we will publish a solution for you </p>

<h3> The Team Behind </h3>
<p>TheWPHosting is brought to you by a team of Wordpress Addicts.</p><p> We have been working with Wordpress for past 8 years.  </p><p>Here are <a target = "_blank" href="https://profiles.wordpress.org/aankit/#content-plugins">some of the plugins</a> created by our team.</a> </p>


	</div>
	
	
	
	


                        
        </div>
       </div>
      </div>
    <div class="clear"></div>
    </div>
   </div>
</div>
