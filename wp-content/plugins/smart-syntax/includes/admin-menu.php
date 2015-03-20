<?php
function smart_syntax_menu()
{
    
    add_menu_page(__("Smart Syntax", "smart_syntax"), __("Smart Syntax", "smart_syntax"), 'manage_options', 'smart-tabs', 'smart_syntax_settings_page');
    
}


function smart_syntax_settings_page()
{
    global $smart_syntax;
    $smart_syntax_get = get_option('_smart_syntax_options');
    if (!empty($smart_syntax_get)) {
        
        $smart_syntax = $smart_syntax_get;
        update_option('_smart_syntax_options', $smart_syntax);
    } else {
        $smart_syntax = array(
            'cdn_prettify' => 'true',
            'custom_skin' => 'true'
        );
        add_option('_smart_syntax_options', $smart_syntax);
    }
?>
			<div class="icon32" id="icon-themes"><br></div>
			<div id="smart-syntax-settings-page" class="wrap">
			<h2>Smart Synax Plugin Settings</h2>
	    <?php
    // $_POST needs to be sanitized by version 1.0
    if (isset($_POST['submit']) && check_admin_referer('smart_syntax_action', 'smart_syntax_ref')) {
        $smart_syntax_wp_message = '';
        $smart_syntax            = array(
            'cdn_prettify' => '' . $_POST['cdn_prettify'] . '',
            'custom_skin' => '' . $_POST['custom_skin'] . ''
        );
        update_option('_smart_syntax_options', $smart_syntax);
        echo '<div id="message" class="updated below-h2"><p>Smart Synax settings is updated. ', $smart_syntax_wp_message, '</p></div>';
    }
?>
			<form method="post" action="<?php
    echo esc_attr($_SERVER["REQUEST_URI"]);
?>">
		  <?php
    wp_nonce_field('smart_syntax_action', 'smart_syntax_ref');
    $checked = '';
    if ($smart_syntax[cdn_prettify] == 'true') {
        $cdn = 'checked="checked"';
    }
    if ($smart_syntax[custom_skin] == 'true') {
        $skin = 'checked="checked"';
    }
?>
				<table class="form-table">
					<tbody>
						<tr>
							<td>
							<h3 style="font-weight: bold;">Skin</h3>
								<p>Use smart syntax custom prettify skin. If unchecked default prettify skin will be used</p>
							  <label><input 	id="custom_skin"
									  value="true"
									  name="custom_skin"
									  type="checkbox"
									  <?php
    if (isset($checked))
        echo $cdn;
?>
								  </label>
							</td>
						</tr>
						<tr>
							<td>
							<h3 style="font-weight: bold;">CDN</h3>
								<p>Load prettify.js from Google code repository</p>
							  <label><input 	id="cdn_prettify"
									  value="true"
									  name="cdn_prettify"
									  type="checkbox"
									  <?php
    if (isset($checked))
        echo $skin;
?>
								  </label>
							</td>
						</tr>
	
						<tr>
							<td>
								<p class="submit"><input type="submit" name="submit" class="button-primary" value="Save Changes" /></p>
							</td>
						</tr>
					</tbody>
			  </table>
	    </form>
	    </div>
	<?php
    
}