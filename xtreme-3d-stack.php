<?php
/*
Plugin Name: Xtreme 3D Stack
Plugin URI: 
Description: The most advanced 3D Stack application. No Flash Knowledge required to insert the 3D Stack SWF inside the HTML page(s) of your site.
Version: 1.0
Author: Flashtuning 
Author URI: http://www.flashtuning.net
*/

$xtreme_stack_swf_nr	= 0; 											

function xtremeStackStart($xtreme_obj) {
	
	$txtP = preg_replace_callback('/\[xtreme-3d-stack\s*(width="(\d+)")?\s*(height="(\d+)")?\s*(xml="([^"]+)")?\s*\]/i', 'xtremeStackAddObj', $xtreme_obj); 
	
	return $txtP;
}

function xtremeStackAddObj($xtreme_stack_param) {

    global $xtreme_stack_swf_nr; //number of swfs
	$xtreme_stack_swf_nr++;
	
	$xtreme_stack_rand = substr(rand(),0,3);
	
	$xtreme_stack_dir = WP_CONTENT_URL .'/flashtuning/xtreme-3d-stack/';
	$xtreme_stack_swf = $xtreme_stack_dir.'3DStack.swf';
	$xtreme_stack_config = "swfobj2";
	
	if ($xtreme_stack_param[2] !=""){$xtreme_stack_width = $xtreme_stack_param[2];}
	else {$xtreme_stack_width = 590;}
	
	if ($xtreme_stack_param[4] !=""){$xtreme_stack_height = $xtreme_stack_param[4];}
	else {$xtreme_stack_height = 450;}
	
	if ($xtreme_stack_param[6] !=""){$xtreme_stack_xml  = $xtreme_stack_dir.'assets/xml/'.$xtreme_stack_param[6];}
	else {$xtreme_stack_xml = $xtreme_stack_dir.'assets/xml/stack-settings.xml';}
	
	
	
	
	
	/*
		quality - low | medium | high | autolow | autohigh | best
		bgcolor - hexadecimal RGB value
		wmode - Window | Opaque | Transparent
		allowfullscreen - true | false
		scale - noscale | showall | noborder | exactfit
		salign - L | R | T | B | TL | TR | BL | BR 
		allowscriptaccess - always | never | samedomain
	
	*/
	
	$xtreme_stack_param = array("quality" =>	"high", "bgcolor" => "", "wmode"	=>	"window", "version" =>	"9.0.0", "allowfullscreen"	=>	"true", "scale" => "noscale", "salign" => "TL", "allowscriptaccess" => "samedomain");
	
	if (is_feed()) {$xtreme_stack_config = "xhtml";}

	
	if ($xtreme_stack_config != "xhtml") {
		$xtreme_stack_output = "<div id=\"xtreme-3d-stack".$xtreme_stack_rand."\">Please install flash player.</div>";
	
	}
	
	switch ($xtreme_stack_config) {
	
		case "xhtml":
			$xtreme_stack_output.= "\n<object width=\"".$xtreme_stack_width."\" height=\"".$xtreme_stack_height."\">\n";
			$xtreme_stack_output.= "<param name=\"movie\" value=\"".$xtreme_stack_swf."\"></param>\n";
			$xtreme_stack_output.= "<param name=\"quality\" value=\"".$xtreme_stack_param['quality']."\"></param>\n";
			$xtreme_stack_output.= "<param name=\"bgcolor\" value=\"".$xtreme_stack_param['bgcolor']."\"></param>\n";
			$xtreme_stack_output.= "<param name=\"wmode\" value=\"".$xtreme_stack_param['wmode']."\"></param>\n";
			$xtreme_stack_output.= "<param name=\"allowFullScreen\" value=\"".$xtreme_stack_param['allowfullscreen']."\"></param>\n";
			$xtreme_stack_output.= "<param name=\"scale\" value=\"".$xtreme_stack_param['scale']."\"></param>\n";
			$xtreme_stack_output.= "<param name=\"salign\" value=\"".$xtreme_stack_param['salign']."\"></param>\n";
			$xtreme_stack_output.= "<param name=\"allowscriptaccess\" value=\"".$xtreme_stack_param['allowscriptaccess']."\"></param>\n";
			$xtreme_stack_output.= "<param name=\"base\" value=\"".$xtreme_stack_dir."\"></param>\n";
			$xtreme_stack_output.= "<param name=\"FlashVars\" value=\"setupXML=".$xtreme_stack_xml."\"></param>\n";
			
			
			$xtreme_stack_output.= "<embed type=\"application/x-shockwave-flash\" width=\"".$xtreme_stack_width."\" height=\"".$xtreme_stack_height."\" src=\"".$xtreme_stack_swf."\" ";
			$xtreme_stack_output.= "quality=\"".$xtreme_stack_param['quality']."\" bgcolor=\"".$xtreme_stack_param['bgcolor']."\" wmode=\"".$xtreme_stack_param['wmode']."\" scale=\"".$xtreme_stack_param['scale']."\" salign=\"".$xtreme_stack_param['salign']."\" allowScriptAccess=\"".$xtreme_stack_param['allowscriptaccess']."\" allowFullScreen=\"".$xtreme_stack_param['allowfullscreen']."\" base=\"".$xtreme_stack_dir."\" FlashVars=\"setupXML=".$xtreme_stack_xml."\"  ";
			
			$xtreme_stack_output.= "></embed>\n";
			$xtreme_stack_output.= "</object>\n";
			break;
	
		default:
		
			$xtreme_stack_output.= '<script type="text/javascript">';
			$xtreme_stack_output.= "swfobject.embedSWF('{$xtreme_stack_swf}', 'xtreme-3d-stack{$xtreme_stack_rand}', '{$xtreme_stack_width}', '{$xtreme_stack_height}', '{$xtreme_stack_param['version']}', '' , { setupXML: '{$xtreme_stack_xml}'}, {base: '{$xtreme_stack_dir}', wmode: '{$xtreme_stack_param['wmode']}', scale: '{$xtreme_stack_param['scale']}', salign: '{$xtreme_stack_param['salign']}', bgcolor: '{$xtreme_stack_param['bgcolor']}', allowScriptAccess: '{$xtreme_stack_param['allowscriptaccess']}', allowFullScreen: '{$xtreme_stack_param['allowfullscreen']}'}, {});";
			$xtreme_stack_output.= '</script>';
	
			break;
					
	}
	return $xtreme_stack_output;
}

function xtreme3DStackEcho($xtreme_stack_width, $xtreme_stack_height, $xtreme_stack_output) {
    echo xtremeStackAddObj( array( null, null, $xtreme_stack_width, null, $xtreme_stack_height, null, $xtreme_stack_output) );
}




function xtremeStackAdmin() {

if (!current_user_can('manage_options'))  {
    wp_die( __('You do not have sufficient permissions to access this page.') );
  }


?>
		<div class="wrap">
			<h2>Xtreme 3D Stack 1.0</h2>
					<table>
					<tr>
						<th valign="top" style="padding-top: 10px;color:#FF0000;">
							!IMPORTANT: Copy the flashtuning folder(located in Wordpress folder) in the wp-content folder on your server. (eg.: http://www.yoursite.com/wp-content/flashtuning/xtreme-3d-stack/)
						</th>

					</tr>
                   <tr>
						<td>
					      <ul>
					        <li>1. Insert the swf into post or page using this tag: <strong>[xtreme-3d-stack]</strong>.</li>
                            <li>2. If you want to modify the width and height of the 3d stack insert this attributes into the tag: <strong>[xtreme-3d-stack width="yourvalue" height="yourvalue"]</strong></li>
   					        <li>3. If you want to use multiple instances of Xtreme 3D Stack on different pages. Follow this steps:
                            	<ul>
	                           <li>a. There are 2 xml files in <strong>wp-content/flashtuning/xtreme-3d-stack/assets/xml</strong> folder: stack-settings.xml, used for general settings, and media.xml, used for individual items.</li>
                                <li>b. Modify the 2 xml files according to your needs and rename them (eg.: stack-settings2.xml, media2.xml) </li>
                                <li>c. Open the stack-settings2.xml, search for this tag <strong> <imageUrl>
    <url value="assets/xml/media.xml"/> </imageUrl></strong> and change the attribute value to <em>media2.xml</em> </li>
                                <li>d. Copy the 2 modified xml files to <strong>wp-content/flashtuning/xtreme-3d-stack/assets/xml</strong> folder</li>
                                <li>e. Use the <strong>xml</strong> attribute [xtreme-3d-stack xml="stack-settings2.xml"] when you insert the media wall on a page. </li>
                                </ul>
                            <li>4. Optionally for custom pages use this php function: <strong>xtreme3DStackEcho(width,height,xmlFile)</strong> (e.g: xtreme3DStackEcho(590,450,'stack-settings.xml') )</li>                  
                            </ul>
						</td>
				  </tr>
                    
					<tr>
						<td>
						  <p>Check out other useful links. If you have any questions / suggestions, please leave a comment on the component page. </p>
					      <ul>
					        <li><a href="http://www.flashtuning.net">Author Home Page</a></li>
			                <li><a href="http://www.flashtuning.net/flash-xml-menus-navigation/x-treme-3d-stack.html">Xtreme 3D Stack Page</a> </li>
			           </ul>
						</td>
				  </tr>
				</table>
			
		</div>
		
<?php
}
function xtremeStackAdminAdd() {
	
	add_options_page('Xtreme 3D Stack Options', 'Xtreme 3D Stack', 'manage_options','xtreme3dstack', 'xtremeStackAdmin');
}

function xtremeStackSwfObj() {
		wp_enqueue_script('swfobject');
	}


add_filter('the_content', 'xtremeStackStart');
add_action('admin_menu', 'xtremeStackAdminAdd');
add_action('init', 'xtremeStackSwfObj');
?>