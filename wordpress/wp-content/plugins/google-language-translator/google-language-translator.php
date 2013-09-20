<?php
/*
Plugin Name: Google Language Translator
Plugin URI: http://www.studio88design.com/plugins/google-language-translator
Version: 2.6
Description: The MOST SIMPLE Google Translator plugin.  This plugin adds Google Translator to your website by using a single shortcode, [google-translator]. Settings include: layout style, hide/show specific languages, hide/show Google toolbar, and hide/show Google branding. Add the shortcode to pages, posts, and widgets.
Author: Rob Myrick
Author URI: http://www.studio88design.com/
*/
//include_once ( plugins_url() . '/widget.php' );
include( plugin_dir_path( __FILE__ ) . 'widget.php');

function scripts($hook_suffix) {
  global $p;
  if ($p == $hook_suffix) {
    wp_enqueue_script( 'my-admin-script', plugins_url('/admin.js',__FILE__), array('jquery'));
	wp_enqueue_script( 'my-flag-script', plugins_url('/flags.js',__FILE__), array('jquery'));
	wp_register_style( 'style.css', plugins_url('css/style.css', __FILE__) );
    wp_enqueue_style( 'style.css' );	
  }
}

function flags() {
    wp_enqueue_script( 'flags', plugins_url('/flags.js',__FILE__), array('jquery'));
    wp_register_style( 'style.css', plugins_url('css/style.css', __FILE__) );
    wp_enqueue_style( 'style.css' );	
}
add_action('wp_enqueue_scripts', 'flags');

function page (){
    global $p;
    
    add_action( 'admin_enqueue_scripts', 'scripts');
  
    $p = add_options_page('Google Language Translator', 'Google Language Translator', 'manage_options', 'google_language_translator', 'page_cb');
}	
add_action('admin_menu', 'page');

function google_translator_shortcode() {
    if (get_option('googlelanguagetranslator_display')=='Vertical'){
    return googlelanguagetranslator_vertical();
    }

    elseif(get_option('googlelanguagetranslator_display')=='Horizontal'){
    return googlelanguagetranslator_horizontal();
    }
}

    if (get_option('googlelanguagetranslator_toolbar')=='Yes') {
	add_action ('wp_head','googlelanguagetranslator_toolbar_yes');
	add_action ('admin_head','googlelanguagetranslator_toolbar_yes');
    }

    elseif(get_option('googlelanguagetranslator_toolbar')=='No'){
	add_action ('wp_head','googlelanguagetranslator_toolbar_no');
	add_action ('admin_head','googlelanguagetranslator_toolbar_no');
    }
  
    if (get_option('googlelanguagetranslator_showbranding')=='Yes') {
	add_action ('wp_head','googlelanguagetranslator_showbranding_yes');
	add_action ('admin_head','googlelanguagetranslator_showbranding_yes');
    }

    elseif(get_option('googlelanguagetranslator_showbranding')=='No') {
	add_action ('wp_head','googlelanguagetranslator_showbranding_no');
	add_action ('admin_head','googlelanguagetranslator_showbranding_no');
	}
  
    if (get_option('googlelanguagetranslator_translatebox') == 'no') {
    add_action ('wp_head', 'googlelanguagetranslator_translatebox');
	add_action ('admin_head', 'googlelanguagetranslator_translatebox');
    }

    if (get_option('googlelanguagetranslator_flags') == 'hide_flags') {
    add_action ('wp_head','googlelanguagetranslator_flags');
	add_action ('admin_head','googlelanguagetranslator_flags');
    }

    if (get_option('googlelanguagetranslator_flags') == 'show_flags') {
	add_action ('wp_head','googlelanguagetranslator_flags_display');
	add_action ('admin_head','googlelanguagetranslator_flags_display');
	}
add_shortcode( 'google-translator', 'google_translator_shortcode');

add_filter('widget_text', 'do_shortcode');

function page_cb() { ?>
        <div class="wrap" style="width:89%">
	      <div id="icon-options-general" class="icon32"></div>
	        <h2><span class="notranslate">Google Language Translator</span></h2>
	          <div class="metabox-holder has-right-sidebar" style="float:left; width:65%">
                <div class="postbox" style="width: 100%">
                  <h3 class="notranslate">Settings</h3>
                  <form action="<?php echo admin_url('options.php'); ?>" method="post">
			      <?php settings_fields('google_language_translator'); ?>
                    <table style="border-collapse:separate" width="100%" border="0" cellspacing="8" cellpadding="0" class="form-table">
                      <tr>
				        <td class="notranslate">Plugin Status:</td>
				        <td class="notranslate"><?php googlelanguagetranslator_active_cb(); ?></td>
                      </tr>
					  
					  <tr class="notranslate">
				        <td>Choose the original language of your website</td>
						<td><?php googlelanguagetranslator_language_cb(); ?></td>
					  </tr>
					  
					  <tr class="notranslate">
				        <td>What translation languages will you display to website visitors?<br/>(Note: To show flags you must choose "All Languages")</td>
						<td><?php googlelanguagetranslator_language_option_cb(); ?></td>
					  </tr>
					  
					  <tr class="notranslate">
						<td colspan="2"><?php language_display_settings_cb(); ?></td>
					  </tr>
					  
					  <tr class="notranslate">
				        <td class="choose_flags_intro">Show flag images?<br/>(Display up to 70 flags above the translator)</td>
						<td class="choose_flags_intro"><?php googlelanguagetranslator_flags_cb(); ?></td>
					  </tr>
					  
					  <tr class="notranslate">
				        <td class="choose_flags">Choose the flags you want to display:</td>
				        <td></td>
			          </tr>
					  
					  <tr class="notranslate">
						<td colspan="2" class="choose_flags"><?php flag_display_settings_cb(); ?></td>
					  </tr>
					  
					  <tr class="notranslate">
				        <td>Show translate box?</td>
						<td><?php googlelanguagetranslator_translatebox_cb(); ?></td>
					  </tr>
					  
					  <tr class="notranslate">
                        <td>Layout options:</td>
						<td><?php googlelanguagetranslator_display_cb(); ?></td>
					  </tr>
					  
					  <tr class="notranslate">
                        <td>Show Google Toolbar?</td>
						<td><?php googlelanguagetranslator_toolbar_cb(); ?></td>
					  </tr>
					  
					  <tr class="notranslate">
				        <td>Show Google Branding?<br/>
				          <span>(<a href="https://developers.google.com/translate/v2/attribution" target="_blank">Learn more</a> about Google's Attribution Requirements.)</span>
                        </td>
						<td><?php googlelanguagetranslator_showbranding_cb(); ?></td>
					  </tr>
					  
					  <tr class="alignment notranslate">
				        <td class="flagdisplay">Align the translator left or right?</td>
						<td class="flagdisplay"><?php googlelanguagetranslator_flags_alignment_cb(); ?></td>
					  </tr>
					  
					  <tr class="notranslate">
						<td>Copy/Paste this shortcode if adding to pages/posts:</td>
                        <td>[google-translator]</td>
                      </tr>
					  
					  <tr class="notranslate">
						<td>Copy/Paste this code if adding to header/footer:</td>
						<td>&lt?php echo do_shortcode('[google-translator]'); ?&gt</td>
					  </tr>
					  
					  <tr class="notranslate">
						<td><?php submit_button(); ?></td>
						<td></td>
					  </tr>
			        </table>	  
            </form>
		  </div> <!-- .postbox -->
		  </div> <!-- .metbox-holder -->
		  
		  <div class="metabox-holder" style="float:right; clear:right; width:33%; min-width:350px; ">
		    <div class="postbox">
		      <h3 class="notranslate">Preview</h3>
	            <table style="width:100%">
		          <tr>
					<td style="height:80px; box-sizing:border-box; -webkit-box-sizing:border-box; -moz-box-sizing:border-box; padding:15px 15px; margin:0px"><?php echo do_shortcode('[google-translator]'); ?><p class="hello"><span class="notranslate">Translated text:</span> &nbsp; <span>Hello</span></p></td>
		          </tr>
		        </table>
		    </div> <!-- .postbox -->
	      </div> <!-- .metabox-holder -->
        

        <div class="metabox-holder notranslate" style="float: right; width: 33%;">
          <div class="postbox">
            <h3>Please Consider A Donation</h3>
              <div class="inside">If you like this plugin and find it useful, help keep this plugin actively developed by clicking the donate button <br /><br />
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                  <input type="hidden" name="cmd" value="_donations">
                  <input type="hidden" name="business" value="robertmyrick@hotmail.com">
                  <input type="hidden" name="lc" value="US">
                  <input type="hidden" name="item_name" value="Support Studio 88 Design and help us bring you more Wordpress goodies!  Any donation is kindly appreciated.  Thank you!">
                  <input type="hidden" name="no_note" value="0">
                  <input type="hidden" name="currency_code" value="USD">
                  <input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHostedGuest">
                  <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                  <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                </form>

                <br />
               <br />
             </div>
          </div>
	   </div>
</div> <!-- .wrap -->
        <?php
}


/* ------------------------------------------------------------------------ * 
 * Setting Registration 
 * ------------------------------------------------------------------------ */   

 
function initialize_settings() {  
  
    // First, we register a section. This is necessary since all future options must belong to one.  
    add_settings_section(  
        'glt_settings',         // ID used to identify this section and with which to register options  
        'Settings',                  // Title to be displayed on the administration page  
        '', // Callback used to render the description of the section  
        'google_language_translator'                           // Page on which to add this section of options  
    ); 
  
    
  
    

    //Fieldset 1
    add_settings_field( 'googlelanguagetranslator_active','Plugin status:','googlelanguagetranslator_active_cb','google_language_translator','glt_settings');
    add_settings_field( 'googlelanguagetranslator_language','Choose the original language of your website','','googlelanguagetranslator_language_cb','glt_settings');
    add_settings_field( 'googlelanguagetranslator_language_option','What translation languages will you display to website visitors?','googlelanguagetranslator_language_option_cb','google_language_translator','glt_settings');	
	add_settings_field( 'language_display_settings','Your language choices','language_display_settings_cb','google_language_translator','glt_settings');
    add_settings_field( 'googlelanguagetranslator_flags','Show Flag Images?','googlelanguagetranslator_flags_cb','google_language_translator','glt_settings');
    add_settings_field( 'flag_display_settings','Flag Options','flag_display_settings_cb','google_language_translator','glt_settings');
    add_settings_field( 'googlelanguagetranslator_translatebox','Show Translate Box?','googlelanguagetranslator_translatebox_cb','google_language_translator','glt_settings');
    add_settings_field( 'googlelanguagetranslator_display', 'Layout Options','googlelanguagetranslator_display_cb','google_language_translator','glt_settings');
    add_settings_field( 'googlelanguagetranslator_toolbar', 'Show Toolbar','googlelanguagetranslator_toolbar_cb','google_language_translator','glt_settings');
    add_settings_field( 'googlelanguagetranslator_showbranding', 'Show Google Branding','googlelanguagetranslator_showbranding_cb','google_language_translator','glt_settings');
    add_settings_field( 'googlelanguagetranslator_flags_alignment', 'Align Flags Right or Left', 'googlelanguagetranslator_flags_alignment_cb','google_language_translator','glt_settings');
    
  
  
    //Register Fieldset 1
    register_setting( 'google_language_translator','googlelanguagetranslator_active'); 
    register_setting( 'google_language_translator','googlelanguagetranslator_language');
    register_setting( 'google_language_translator','googlelanguagetranslator_language_option');
    register_setting( 'google_language_translator','language_display_settings');
    register_setting( 'google_language_translator','googlelanguagetranslator_flags');
    register_setting( 'google_language_translator','flag_display_settings');
    register_setting( 'google_language_translator','googlelanguagetranslator_translatebox');
    register_setting( 'google_language_translator','googlelanguagetranslator_display');
    register_setting( 'google_language_translator','googlelanguagetranslator_toolbar');
    register_setting( 'google_language_translator','googlelanguagetranslator_showbranding');
    register_setting( 'google_language_translator','googlelanguagetranslator_flags_alignment');
  
    function googlelanguagetranslator_active_cb() {
	   add_option ('googlelanguagetranslator_active',1);

      if ( get_option( 'googlelanguagetranslator_active' ) !== false ) {
        // The option already exists, so we just update it.
        update_option( 'googlelanguagetranslator_active', 1);
	  }
	   
	   $options = get_option( 'googlelanguagetranslator_active');
	  
	   $html = '<input type="checkbox" name="googlelanguagetranslator_active" id="googlelanguagetranslator_active" value="1" '.checked(1,$options,false).'/> &nbsp; Activate Google Language Translator?';
      echo $html;
	}
  
    function googlelanguagetranslator_language_cb() {
	   add_option ('googlelanguagetranslator_language','en');

       if ( get_option( 'googlelanguagetranslator_language' ) == false ) {
        // The option already exists, so we just update it.
        update_option( 'googlelanguagetranslator_language','en');
	  }
       $options = get_option( 'googlelanguagetranslator_language' ); ?>
       	<select name="googlelanguagetranslator_language" id="googlelanguagetranslator_language">
				  <option value="af" <?php if($options=='af'){echo "selected";}?>>Afrikaans</option>
				  <option value="sq" <?php if($options=='sq'){echo "selected";}?>>Albanian</option>
				  <option value="ar" <?php if($options=='ar'){echo "selected";}?>>Arabic</option>
				  <option value="hy" <?php if($options=='hy'){echo "selected";}?>>Armenian</option>
				  <option value="az" <?php if($options=='az'){echo "selected";}?>>Azerbaijani</option>
				  <option value="eu" <?php if($options=='eu'){echo "selected";}?>>Basque</option>
				  <option value="be" <?php if($options=='be'){echo "selected";}?>>Belarusian</option>
				  <option value="bn" <?php if($options=='bn'){echo "selected";}?>>Bengali</option>
				  <option value="bs" <?php if($options=='bs'){echo "selected";}?>>Bosnian</option>
				  <option value="bg" <?php if($options=='bg'){echo "selected";}?>>Bulgarian</option>
				  <option value="ca" <?php if($options=='ca'){echo "selected";}?>>Catalan</option>
				  <option value="ceb" <?php if($options=='ceb'){echo "selected";}?>>Cebuano</option>
				  <option value="zh-CN" <?php if($options=='zh-CN'){echo "selected";}?>>Chinese</option>
				  <option value="zh-TW" <?php if($options=='zh-TW'){echo "selected";}?>>Chinese (Han)</option>
				  <option value="hr" <?php if($options=='hr'){echo "selected";}?>>Croatian</option>
				  <option value="cs" <?php if($options=='cs'){echo "selected";}?>>Czech</option>
				  <option value="da" <?php if($options=='da'){echo "selected";}?>>Danish</option>
				  <option value="nl" <?php if($options=='nl'){echo "selected";}?>>Dutch</option>
				  <option value="en" <?php if($options=='en'){echo "selected";}?>>English</option>
				  <option value="eo" <?php if($options=='eo'){echo "selected";}?>>Esperanto</option>
				  <option value="et" <?php if($options=='et'){echo "selected";}?>>Estonian</option>
				  <option value="tl" <?php if($options=='tl'){echo "selected";}?>>Filipino</option>
				  <option value="fi" <?php if($options=='fi'){echo "selected";}?>>Finnish</option>
				  <option value="fr" <?php if($options=='fr'){echo "selected";}?>>French</option>
				  <option value="gl" <?php if($options=='gl'){echo "selected";}?>>Galician</option>
				  <option value="ka" <?php if($options=='ka'){echo "selected";}?>>Georgian</option>
				  <option value="de" <?php if($options=='de'){echo "selected";}?>>German</option>
				  <option value="el" <?php if($options=='el'){echo "selected";}?>>Greek</option>
				  <option value="gu" <?php if($options=='gu'){echo "selected";}?>>Gujarati</option>
				  <option value="ht" <?php if($options=='ht'){echo "selected";}?>>Haitian</option>
				  <option value="iw" <?php if($options=='iw'){echo "selected";}?>>Hebrew</option>
				  <option value="hi" <?php if($options=='hi'){echo "selected";}?>>Hindi</option>
				  <option value="hmn" <?php if($options=='hmn'){echo "selected";}?>>Hmong</option>
				  <option value="hu" <?php if($options=='hu'){echo "selected";}?>>Hungarian</option>
				  <option value="is" <?php if($options=='is'){echo "selected";}?>>Icelandic</option>
				  <option value="id" <?php if($options=='id'){echo "selected";}?>>Indonesian</option>
				  <option value="ga" <?php if($options=='ga'){echo "selected";}?>>Irish</option>
				  <option value="it" <?php if($options=='it'){echo "selected";}?>>Italian</option>
				  <option value="ja" <?php if($options=='ja'){echo "selected";}?>>Japanese</option>
				  <option value="jw" <?php if($options=='jw'){echo "selected";}?>>Javanese</option>
				  <option value="kn" <?php if($options=='kn'){echo "selected";}?>>Kannada</option>
				  <option value="km" <?php if($options=='km'){echo "selected";}?>>Khmer</option>
				  <option value="ko" <?php if($options=='ko'){echo "selected";}?>>Korean</option>
				  <option value="lo" <?php if($options=='lo'){echo "selected";}?>>Lao</option>
				  <option value="la" <?php if($options=='la'){echo "selected";}?>>Latin</option>
				  <option value="lv" <?php if($options=='lv'){echo "selected";}?>>Latvian</option>
				  <option value="lt" <?php if($options=='lt'){echo "selected";}?>>Lithuanian</option>
				  <option value="mk" <?php if($options=='mk'){echo "selected";}?>>Macedonian</option>
				  <option value="ms" <?php if($options=='ms'){echo "selected";}?>>Malay</option>
				  <option value="mt" <?php if($options=='mt'){echo "selected";}?>>Maltese</option>
				  <option value="mr" <?php if($options=='mr'){echo "selected";}?>>Marathi</option>
				  <option value="no" <?php if($options=='no'){echo "selected";}?>>Norwegian</option>
				  <option value="fa" <?php if($options=='fa'){echo "selected";}?>>Persian</option>
				  <option value="pl" <?php if($options=='pl'){echo "selected";}?>>Polish</option>
				  <option value="pt" <?php if($options=='pt'){echo "selected";}?>>Portuguese</option>
				  <option value="ro" <?php if($options=='ro'){echo "selected";}?>>Romanian</option>
				  <option value="ru" <?php if($options=='ru'){echo "selected";}?>>Russian</option>
				  <option value="sr" <?php if($options=='sr'){echo "selected";}?>>Serbian</option>
				  <option value="sk" <?php if($options=='sk'){echo "selected";}?>>Slovak</option>
				  <option value="sl" <?php if($options=='sl'){echo "selected";}?>>Slovenian</option>
				  <option value="es" <?php if($options=='es'){echo "selected";}?>>Spanish</option>
				  <option value="sw" <?php if($options=='sw'){echo "selected";}?>>Swahili</option>
				  <option value="sv" <?php if($options=='sv'){echo "selected";}?>>Swedish</option>
				  <option value="ta" <?php if($options=='ta'){echo "selected";}?>>Tamil</option>
				  <option value="te" <?php if($options=='te'){echo "selected";}?>>Telugu</option>
				  <option value="th" <?php if($options=='th'){echo "selected";}?>>Thai</option>
				  <option value="tr" <?php if($options=='tr'){echo "selected";}?>>Turkish</option>
				  <option value="uk" <?php if($options=='uk'){echo "selected";}?>>Ukranian</option>
				  <option value="ur" <?php if($options=='ur'){echo "selected";}?>>Urdu</option>
				  <option value="vi" <?php if($options=='vi'){echo "selected";}?>>Vietnamese</option>
				  <option value="cy" <?php if($options=='cy'){echo "selected";}?>>Welsh</option>
				  <option value="yi" <?php if($options=='yi'){echo "selected";}?>>Yiddish</option>		
         </select>
    <?php     
    } 
  
  function googlelanguagetranslator_language_option_cb() {
	add_option ('googlelanguagetranslator_language_option','all');

    if ( get_option( 'googlelanguagetranslator_language_option' ) == false ) {
        // The option already exists, so we just update it.
        update_option( 'googlelanguagetranslator_flags', 'all' );
	  }
	$options = get_option('googlelanguagetranslator_language_option'); ?>

    <input type="radio" name="googlelanguagetranslator_language_option" id="googlelanguagetranslator_language_option" value="all" <?php if($options=='all'){echo "checked";}?>/> All Languages<br/>
	<input type="radio" name="googlelanguagetranslator_language_option" id="googlelanguagetranslator_language_option" value="specific" <?php if($options=='specific'){echo "checked";}?>/> Specific Languages
  <?php }
  
  
  
  function language_display_settings_cb() {
	$defaults = array (
	  'en' => 1
	  );
	add_option ('language_display_settings',$defaults);

    if ( get_option( 'language_display_settings' ) == false ) {
        // The option already exists, so we just update it.
        update_option( 'language_display_settings', $defaults );
	  }
	
	$get_language_choices = get_option ('language_display_settings'); ?>
	            <div class="languages" style="width:25%; float:left">
					<div><input type="checkbox" name="language_display_settings[af]" value="1"<?php if ( 1 == $get_language_choices['af'] ) echo 'checked="checked"'; ?> /> Afrikaans</div>
				    <div><input type="checkbox" name="language_display_settings[sq]" value="1"<?php if ( 1 == $get_language_choices['sq'] ) echo 'checked="checked"'; ?> /> Albanian</div>
					<div><input type="checkbox" name="language_display_settings[ar]" value="1"<?php if ( 1 == $get_language_choices['ar'] ) echo 'checked="checked"'; ?> /> Arabic</div>
                    <div><input type="checkbox" name="language_display_settings[hy]" value="1"<?php if ( 1 == $get_language_choices['hy'] ) echo 'checked="checked"'; ?> /> Armenian</div>
                    <div><input type="checkbox" name="language_display_settings[az]" value="1"<?php if ( 1 == $get_language_choices['az'] ) echo 'checked="checked"'; ?> /> Azerbaijani</div>                  
                    <div><input type="checkbox" name="language_display_settings[eu]" value="1"<?php if ( 1 == $get_language_choices['eu'] ) echo 'checked="checked"'; ?> /> Basque</div>                    
                    <div><input type="checkbox" name="language_display_settings[be]" value="1"<?php if ( 1 == $get_language_choices['be'] ) echo 'checked="checked"'; ?> /> Belarusian</div>                    
                    <div><input type="checkbox" name="language_display_settings[bn]" value="1"<?php if ( 1 == $get_language_choices['bn'] ) echo 'checked="checked"'; ?> /> Bengali</div> 
					<div><input type="checkbox" name="language_display_settings[bs]" value="1"<?php if ( 1 == $get_language_choices['bs'] ) echo 'checked="checked"'; ?> /> Bosnian</div> 
                    <div><input type="checkbox" name="language_display_settings[bg]" value="1"<?php if ( 1 == $get_language_choices['bg'] ) echo 'checked="checked"'; ?> /> Bulgarian</div>                    
                    <div><input type="checkbox" name="language_display_settings[ca]" value="1"<?php if ( 1 == $get_language_choices['ca'] ) echo 'checked="checked"'; ?> /> Catalan</div> 
					<div><input type="checkbox" name="language_display_settings[ceb]" value="1"<?php if ( 1 == $get_language_choices['ceb'] ) echo 'checked="checked"'; ?> /> Cebuano</div>
                    <div><input type="checkbox" name="language_display_settings[zh-CN]" value="1"<?php if ( 1 == $get_language_choices['zh-CN'] ) echo 'checked="checked"'; ?> /> Chinese</div>                    
                    <div><input type="checkbox" name="language_display_settings[zh-TW]" value="1"<?php if ( 1 == $get_language_choices['zh-TW'] ) echo 'checked="checked"'; ?> /> Chinese (Han)</div>                    
                    <div><input type="checkbox" name="language_display_settings[hr]" value="1"<?php if ( 1 == $get_language_choices['hr'] ) echo 'checked="checked"'; ?> /> Croatian</div>                    
                    <div><input type="checkbox" name="language_display_settings[cs]" value="1"<?php if ( 1 == $get_language_choices['cs'] ) echo 'checked="checked"'; ?> /> Czech</div>                    			
                    <div><input type="checkbox" name="language_display_settings[da]" value="1"<?php if ( 1 == $get_language_choices['da'] ) echo 'checked="checked"'; ?> /> Danish</div>                    
                    <div><input type="checkbox" name="language_display_settings[nl]" value="1"<?php if ( 1 == $get_language_choices['nl'] ) echo 'checked="checked"'; ?> /> Dutch</div>                    				
                    <div><input type="checkbox" name="language_display_settings[en]" value="1"<?php if ( 1 == $get_language_choices['en'] ) echo 'checked="checked"'; ?> /> English</div>   
				</div>
				  
				  <div class="languages" style="width:25%; float:left">
                    <div><input type="checkbox" name="language_display_settings[eo]" value="1"<?php if ( 1 == $get_language_choices['eo'] ) echo 'checked="checked"'; ?> /> Esperanto</div>                      
                    <div><input type="checkbox" name="language_display_settings[et]" value="1"<?php if ( 1 == $get_language_choices['et'] ) echo 'checked="checked"'; ?> /> Estonian</div>                   
                    <div><input type="checkbox" name="language_display_settings[tl]" value="1"<?php if ( 1 == $get_language_choices['tl'] ) echo 'checked="checked"'; ?> /> Filipino</div>                     
                    <div><input type="checkbox" name="language_display_settings[fi]" value="1"<?php if ( 1 == $get_language_choices['fi'] ) echo 'checked="checked"'; ?> /> Finnish</div>                    
                    <div><input type="checkbox" name="language_display_settings[fr]" value="1"<?php if ( 1 == $get_language_choices['fr'] ) echo 'checked="checked"'; ?> /> French</div>                     
                    <div><input type="checkbox" name="language_display_settings[gl]" value="1"<?php if ( 1 == $get_language_choices['gl'] ) echo 'checked="checked"'; ?> /> Galician</div>                    
                    <div><input type="checkbox" name="language_display_settings[ka]" value="1"<?php if ( 1 == $get_language_choices['ka'] ) echo 'checked="checked"'; ?> /> Georgian</div>                    
                    <div><input type="checkbox" name="language_display_settings[de]" value="1"<?php if ( 1 == $get_language_choices['de'] ) echo 'checked="checked"'; ?> /> German</div>                  
                    <div><input type="checkbox" name="language_display_settings[el]" value="1"<?php if ( 1 == $get_language_choices['el'] ) echo 'checked="checked"'; ?> /> Greek</div>                    
                    <div><input type="checkbox" name="language_display_settings[gu]" value="1"<?php if ( 1 == $get_language_choices['gu'] ) echo 'checked="checked"'; ?> /> Gujarati</div>       
                    <div><input type="checkbox" name="language_display_settings[ht]" value="1"<?php if ( 1 == $get_language_choices['ht'] ) echo 'checked="checked"'; ?> /> Haitian</div>                     			
                    <div><input type="checkbox" name="language_display_settings[iw]" value="1"<?php if ( 1 == $get_language_choices['iw'] ) echo 'checked="checked"'; ?> /> Hebrew</div>                  
                    <div><input type="checkbox" name="language_display_settings[hi]" value="1"<?php if ( 1 == $get_language_choices['hi'] ) echo 'checked="checked"'; ?> /> Hindi</div>    
					<div><input type="checkbox" name="language_display_settings[hmn]" value="1"<?php if ( 1 == $get_language_choices['hmn'] ) echo 'checked="checked"'; ?> /> Hmong</div>
                    <div><input type="checkbox" name="language_display_settings[hu]" value="1"<?php if ( 1 == $get_language_choices['hu'] ) echo 'checked="checked"'; ?> /> Hungarian</div>               
                    <div><input type="checkbox" name="language_display_settings[is]" value="1"<?php if ( 1 == $get_language_choices['is'] ) echo 'checked="checked"'; ?> /> Icelandic</div>                 
                    <div><input type="checkbox" name="language_display_settings[id]" value="1"<?php if ( 1 == $get_language_choices['id'] ) echo 'checked="checked"'; ?> /> Indonesian</div>                   
                    <div><input type="checkbox" name="language_display_settings[ga]" value="1"<?php if ( 1 == $get_language_choices['ga'] ) echo 'checked="checked"'; ?> /> Irish</div>  
					<div><input type="checkbox" name="language_display_settings[it]" value="1"<?php if ( 1 == $get_language_choices['it'] ) echo 'checked="checked"'; ?> /> Italian</div>
				</div>
				  
				  <div class="languages" style="width:25%; float:left">   
                    <div><input type="checkbox" name="language_display_settings[ja]" value="1"<?php if ( 1 == $get_language_choices['ja'] ) echo 'checked="checked"'; ?> /> Japanese</div>   
					<div><input type="checkbox" name="language_display_settings[jw]" value="1"<?php if ( 1 == $get_language_choices['jw'] ) echo 'checked="checked"'; ?> /> Javanese</div>
                    <div><input type="checkbox" name="language_display_settings[kn]" value="1"<?php if ( 1 == $get_language_choices['kn'] ) echo 'checked="checked"'; ?> /> Kannada</div> 
					<div><input type="checkbox" name="language_display_settings[km]" value="1"<?php if ( 1 == $get_language_choices['km'] ) echo 'checked="checked"'; ?> /> Khmer</div>
                    <div><input type="checkbox" name="language_display_settings[ko]" value="1"<?php if ( 1 == $get_language_choices['ko'] ) echo 'checked="checked"'; ?> /> Korean</div>                    
                    <div><input type="checkbox" name="language_display_settings[lo]" value="1"<?php if ( 1 == $get_language_choices['lo'] ) echo 'checked="checked"'; ?> /> Lao</div>                     
                    <div><input type="checkbox" name="language_display_settings[la]" value="1"<?php if ( 1 == $get_language_choices['la'] ) echo 'checked="checked"'; ?> /> Latin</div>                    
                    <div><input type="checkbox" name="language_display_settings[lv]" value="1"<?php if ( 1 == $get_language_choices['lv'] ) echo 'checked="checked"'; ?> /> Latvian</div>                    
                    <div><input type="checkbox" name="language_display_settings[lt]" value="1"<?php if ( 1 == $get_language_choices['lt'] ) echo 'checked="checked"'; ?> /> Lithuanian</div>                  
                    <div><input type="checkbox" name="language_display_settings[mk]" value="1"<?php if ( 1 == $get_language_choices['mk'] ) echo 'checked="checked"'; ?> /> Macedonian</div>                    
                    <div><input type="checkbox" name="language_display_settings[ms]" value="1"<?php if ( 1 == $get_language_choices['ms'] ) echo 'checked="checked"'; ?> /> Malay</div>       
                    <div><input type="checkbox" name="language_display_settings[mt]" value="1"<?php if ( 1 == $get_language_choices['mt'] ) echo 'checked="checked"'; ?> /> Maltese</div>
					<div><input type="checkbox" name="language_display_settings[mr]" value="1"<?php if ( 1 == $get_language_choices['mr'] ) echo 'checked="checked"'; ?> /> Marathi</div>   
                    <div><input type="checkbox" name="language_display_settings[no]" value="1"<?php if ( 1 == $get_language_choices['no'] ) echo 'checked="checked"'; ?> /> Norwegian</div>                  
                    <div><input type="checkbox" name="language_display_settings[fa]" value="1"<?php if ( 1 == $get_language_choices['fa'] ) echo 'checked="checked"'; ?> /> Persian</div>          
                    <div><input type="checkbox" name="language_display_settings[pl]" value="1"<?php if ( 1 == $get_language_choices['pl'] ) echo 'checked="checked"'; ?> /> Polish</div>               
                    <div><input type="checkbox" name="language_display_settings[pt]" value="1"<?php if ( 1 == $get_language_choices['pt'] ) echo 'checked="checked"'; ?> /> Portuguese</div> 
                    <div><input type="checkbox" name="language_display_settings[ro]" value="1"<?php if ( 1 == $get_language_choices['ro'] ) echo 'checked="checked"'; ?> /> Romanian</div>                   
                    <div><input type="checkbox" name="language_display_settings[ru]" value="1"<?php if ( 1 == $get_language_choices['ru'] ) echo 'checked="checked"'; ?> /> Russian</div>  
				</div>
				  
				  <div class="languages" style="width:25%; float:left">
 					<div><input type="checkbox" name="language_display_settings[sr]" value="1"<?php if ( 1 == $get_language_choices['sr'] ) echo 'checked="checked"'; ?> /> Serbian</div>                      
                    <div><input type="checkbox" name="language_display_settings[sk]" value="1"<?php if ( 1 == $get_language_choices['sk'] ) echo 'checked="checked"'; ?> /> Slovak</div>                   
                    <div><input type="checkbox" name="language_display_settings[sl]" value="1"<?php if ( 1 == $get_language_choices['sl'] ) echo 'checked="checked"'; ?> /> Slovenian</div>                     
                    <div><input type="checkbox" name="language_display_settings[es]" value="1"<?php if ( 1 == $get_language_choices['es'] ) echo 'checked="checked"'; ?> /> Spanish</div>                    
                    <div><input type="checkbox" name="language_display_settings[sw]" value="1"<?php if ( 1 == $get_language_choices['sw'] ) echo 'checked="checked"'; ?> /> Swahili</div>                     
                    <div><input type="checkbox" name="language_display_settings[sv]" value="1"<?php if ( 1 == $get_language_choices['sv'] ) echo 'checked="checked"'; ?> /> Swedish</div>                    
                    <div><input type="checkbox" name="language_display_settings[ta]" value="1"<?php if ( 1 == $get_language_choices['ta'] ) echo 'checked="checked"'; ?> /> Tamil</div>                    
                    <div><input type="checkbox" name="language_display_settings[te]" value="1"<?php if ( 1 == $get_language_choices['te'] ) echo 'checked="checked"'; ?> /> Telugu</div>                  
                    <div><input type="checkbox" name="language_display_settings[th]" value="1"<?php if ( 1 == $get_language_choices['th'] ) echo 'checked="checked"'; ?> /> Thai</div>                    
                    <div><input type="checkbox" name="language_display_settings[tr]" value="1"<?php if ( 1 == $get_language_choices['tr'] ) echo 'checked="checked"'; ?> /> Turkish</div>       
                    <div><input type="checkbox" name="language_display_settings[uk]" value="1"<?php if ( 1 == $get_language_choices['uk'] ) echo 'checked="checked"'; ?> /> Ukranian</div>                     			
                    <div><input type="checkbox" name="language_display_settings[ur]" value="1"<?php if ( 1 == $get_language_choices['ur'] ) echo 'checked="checked"'; ?> /> Urdu</div>                  
                    <div><input type="checkbox" name="language_display_settings[vi]" value="1"<?php if ( 1 == $get_language_choices['vi'] ) echo 'checked="checked"'; ?> /> Vietnamese</div>          
                    <div><input type="checkbox" name="language_display_settings[cy]" value="1"<?php if ( 1 == $get_language_choices['cy'] ) echo 'checked="checked"'; ?> /> Welsh</div>               
                    <div><input type="checkbox" name="language_display_settings[yi]" value="1"<?php if ( 1 == $get_language_choices['yi'] ) echo 'checked="checked"'; ?> /> Yiddish</div>                 
				  </div>
			
			<div style="clear:both"></div>
<?php } 
  
  function googlelanguagetranslator_flags_cb() { 
	
	  add_option ('googlelanguagetranslator_flags','hide_flags');

      if ( get_option( 'googlelanguagetranslator_flags' ) == false ) {
        // The option already exists, so we just update it.
        update_option( 'googlelanguagetranslator_flags', 'hide_flags' );
	  }
	  
      $options = get_option('googlelanguagetranslator_flags','hide_flags'); ?>

      <input type="radio" name="googlelanguagetranslator_flags" id="googlelanguagetranslator_flags" value="show_flags" <?php if($options=='show_flags'){echo "checked";}?>/> Yes, show flag images<br/>
	  <input type="radio" name="googlelanguagetranslator_flags" id="googlelanguagetranslator_flags" value="hide_flags" <?php if($options=='hide_flags'){echo "checked";}?>/> No, hide flag images
<?php }	
  

    function flag_display_settings_cb() {
	  $defaults = array(
        'flag-en' => 1
      );
	  add_option ('flag_display_settings', $defaults);
	  

      if ( get_option( 'flag_display_settings' ) == false ) {
        // The option already exists, so we just update it.
        update_option( 'flag_display_settings', $defaults );
	  }
	  
	  $get_flag_choices = get_option('flag_display_settings');
	  
	  if (!isset ( $get_flag_choices ['flag-af'] ) ) {
	    $get_flag_choices['flag-af'] = 0;
	  }
	  
	   if (!isset ( $get_flag_choices ['flag-sq'] ) ) {
	    $get_flag_choices['flag-sq'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-ar'] ) ) {
	    $get_flag_choices['flag-ar'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-hy'] ) ) {
	    $get_flag_choices['flag-hy'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-az'] ) ) {
	    $get_flag_choices['flag-az'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-eu'] ) ) {	
	    $get_flag_choices['flag-eu'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-be'] ) ) {
	    $get_flag_choices['flag-be'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-bn'] ) ) {
		$get_flag_choices['flag-bn'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-bs'] ) ) {
		 $get_flag_choices['flag-bs'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-bg'] ) ) { 
		 $get_flag_choices['flag-bg'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-ca'] ) ) { 
	     $get_flag_choices['flag-ca'] = 0;	 
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-ceb'] ) ) {
		 $get_flag_choices['flag-ceb'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-zh-CN'] ) ) {
		 $get_flag_choices['flag-zh-CN'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-zh-TW'] ) ) {
	     $get_flag_choices['flag-zh-TW'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-hr'] ) ) {
	     $get_flag_choices['flag-hr'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-cs'] ) ) {
	     $get_flag_choices['flag-cs'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-da'] ) ) {
	     $get_flag_choices['flag-da'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-nl'] ) ) {
	     $get_flag_choices['flag-nl'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-en'] ) ) {
	   $get_flag_choices['flag-en'] = 0; 
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-eo'] ) ) {
	     $get_flag_choices['flag-eo'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-et'] ) ) {
	     $get_flag_choices['flag-et'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-tl'] ) ) {
	     $get_flag_choices['flag-tl'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-fi'] ) ) {
	     $get_flag_choices['flag-fi'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-fr'] ) ) {
	     $get_flag_choices['flag-fr'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-gl'] ) ) {
	     $get_flag_choices['flag-gl'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-ka'] ) ) {
	     $get_flag_choices['flag-ka'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-de'] ) ) {
	     $get_flag_choices['flag-de'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-el'] ) ) {
	     $get_flag_choices['flag-el'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-gu'] ) ) {
	     $get_flag_choices['flag-gu'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-ht'] ) ) {
	     $get_flag_choices['flag-ht'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-iw'] ) ) {
	     $get_flag_choices['flag-iw'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-hi'] ) ) {
	     $get_flag_choices['flag-hi'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-hmn'] ) ) {
	     $get_flag_choices['flag-hmn'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-hu'] ) ) {
	     $get_flag_choices['flag-hu'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-is'] ) ) {
	     $get_flag_choices['flag-is'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-id'] ) ) {
	     $get_flag_choices['flag-id'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-ga'] ) ) {
	     $get_flag_choices['flag-ga'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-it'] ) ) {
	     $get_flag_choices['flag-it'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-ja'] ) ) {
	     $get_flag_choices['flag-ja'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-jw'] ) ) {
	     $get_flag_choices['flag-jw'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-kn'] ) ) {
	     $get_flag_choices['flag-kn'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-km'] ) ) {
	     $get_flag_choices['flag-km'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-ko'] ) ) {
	     $get_flag_choices['flag-ko'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-lo'] ) ) {
	     $get_flag_choices['flag-lo'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-la'] ) ) {
	     $get_flag_choices['flag-la'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-lv'] ) ) {
	     $get_flag_choices['flag-lv'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-lt'] ) ) {
	     $get_flag_choices['flag-lt'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-mk'] ) ) {
	     $get_flag_choices['flag-mk'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-ms'] ) ) {
	     $get_flag_choices['flag-ms'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-mt'] ) ) {
	     $get_flag_choices['flag-mt'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-mr'] ) ) {
	     $get_flag_choices['flag-mr'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-no'] ) ) {
	     $get_flag_choices['flag-no'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-fa'] ) ) {
	     $get_flag_choices['flag-fa'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-pl'] ) ) {
	     $get_flag_choices['flag-pl'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-pt'] ) ) {
	     $get_flag_choices['flag-pt'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-ro'] ) ) {
	     $get_flag_choices['flag-ro'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-ru'] ) ) {
	     $get_flag_choices['flag-ru'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-sr'] ) ) {
	     $get_flag_choices['flag-sr'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-sk'] ) ) {
	     $get_flag_choices['flag-sk'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-sl'] ) ) {
	     $get_flag_choices['flag-sl'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-sw'] ) ) {
	     $get_flag_choices['flag-es'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-sw'] ) ) {
	     $get_flag_choices['flag-sw'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-sv'] ) ) {
	     $get_flag_choices['flag-sv'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-ta'] ) ) {
	     $get_flag_choices['flag-ta'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-te'] ) ) {
	     $get_flag_choices['flag-te'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-th'] ) ) {
	     $get_flag_choices['flag-th'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-tr'] ) ) {
	     $get_flag_choices['flag-tr'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-uk'] ) ) {
	     $get_flag_choices['flag-uk'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-ur'] ) ) {
	     $get_flag_choices['flag-ur'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-vi'] ) ) {
	     $get_flag_choices['flag-vi'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-cy'] ) ) {
	     $get_flag_choices['flag-cy'] = 0;
	   }
	  
	   if (!isset ( $get_flag_choices ['flag-yi'] ) ) {
	     $get_flag_choices['flag-yi'] = 0;
	   }
	  
	 ?>
                  <div class="flagdisplay" style="width:25%; float:left">
					
					<div><input type="checkbox" name="flag_display_settings[flag-af]" value="1" <?php checked( 1,$get_flag_choices['flag-af']); ?> /> Afrikaans</div>
					
					
					<div><input type="checkbox" name="flag_display_settings[flag-sq]" value="1" <?php checked( 1,$get_flag_choices['flag-sq']); ?> /> Albanian</div>
					<div><input type="checkbox" name="flag_display_settings[flag-ar]" value="1" <?php checked( 1,$get_flag_choices['flag-ar']); ?> /> Arabic</div>
                    <div><input type="checkbox" name="flag_display_settings[flag-hy]" value="1" <?php checked( 1,$get_flag_choices['flag-hy']); ?> /> Armenian</div>
                    <div><input type="checkbox" name="flag_display_settings[flag-az]" value="1" <?php checked( 1,$get_flag_choices['flag-az']); ?> /> Azerbaijani</div>                  
                    <div><input type="checkbox" name="flag_display_settings[flag-eu]" value="1" <?php checked( 1,$get_flag_choices['flag-eu']); ?> /> Basque</div>                    
                    <div><input type="checkbox" name="flag_display_settings[flag-be]" value="1" <?php checked( 1,$get_flag_choices['flag-be']); ?> /> Belarusian</div>                    
                    <div><input type="checkbox" name="flag_display_settings[flag-bn]" value="1" <?php checked( 1,$get_flag_choices['flag-bn']); ?> /> Bengali</div> 
					<div><input type="checkbox" name="flag_display_settings[flag-bs]" value="1" <?php checked( 1,$get_flag_choices['flag-bs']); ?> /> Bosnian</div> 
                    <div><input type="checkbox" name="flag_display_settings[flag-bg]" value="1" <?php checked( 1,$get_flag_choices['flag-bg']); ?> /> Bulgarian</div>                    
                    <div><input type="checkbox" name="flag_display_settings[flag-ca]" value="1" <?php checked( 1,$get_flag_choices['flag-ca']); ?> /> Catalan</div> 
					<div><input type="checkbox" name="flag_display_settings[flag-ceb]" value="1" <?php checked( 1,$get_flag_choices['flag-ceb']); ?> /> Cebuano</div>
                    <div><input type="checkbox" name="flag_display_settings[flag-zh-CN]" value="1" <?php checked( 1,$get_flag_choices['flag-zh-CN']); ?> /> Chinese</div>                    
                    <div><input type="checkbox" name="flag_display_settings[flag-zh-TW]" value="1" <?php checked( 1,$get_flag_choices['flag-zh-TW']); ?> /> Chinese (Han)</div>                    
                    <div><input type="checkbox" name="flag_display_settings[flag-hr]" value="1" <?php checked( 1,$get_flag_choices['flag-hr']); ?> /> Croatian</div>                    
                    <div><input type="checkbox" name="flag_display_settings[flag-cs]" value="1" <?php checked( 1,$get_flag_choices['flag-cs']); ?> /> Czech</div>                    			
                    <div><input type="checkbox" name="flag_display_settings[flag-da]" value="1" <?php checked( 1,$get_flag_choices['flag-da']); ?> /> Danish</div>                    
                    <div><input type="checkbox" name="flag_display_settings[flag-nl]" value="1" <?php checked( 1,$get_flag_choices['flag-nl']); ?> /> Dutch</div>                    				
                    <div><input type="checkbox" name="flag_display_settings[flag-en]" value="1" <?php checked(1,$get_flag_choices['flag-en']); ?> /> English</div>   
				</div>
				  
				  <div class="flagdisplay" style="width:25%; float:left">
                    <div><input type="checkbox" name="flag_display_settings[flag-eo]" value="1"<?php checked( 1,$get_flag_choices['flag-eo']); ?> /> Esperanto</div>                      
                    <div><input type="checkbox" name="flag_display_settings[flag-et]" value="1"<?php checked( 1,$get_flag_choices['flag-et']); ?> /> Estonian</div>                   
                    <div><input type="checkbox" name="flag_display_settings[flag-tl]" value="1"<?php checked( 1,$get_flag_choices['flag-tl']); ?> /> Filipino</div>                     
                    <div><input type="checkbox" name="flag_display_settings[flag-fi]" value="1"<?php checked( 1,$get_flag_choices['flag-fi']); ?> /> Finnish</div>                    
                    <div><input type="checkbox" name="flag_display_settings[flag-fr]" value="1"<?php checked( 1,$get_flag_choices['flag-fr']); ?> /> French</div>                     
                    <div><input type="checkbox" name="flag_display_settings[flag-gl]" value="1"<?php checked( 1,$get_flag_choices['flag-gl']); ?> /> Galician</div>                    
                    <div><input type="checkbox" name="flag_display_settings[flag-ka]" value="1"<?php checked( 1,$get_flag_choices['flag-ka']); ?> /> Georgian</div>                    
                    <div><input type="checkbox" name="flag_display_settings[flag-de]" value="1"<?php checked( 1,$get_flag_choices['flag-de']); ?> /> German</div>                  
                    <div><input type="checkbox" name="flag_display_settings[flag-el]" value="1"<?php checked( 1,$get_flag_choices['flag-el']); ?> /> Greek</div>                    
                    <div><input type="checkbox" name="flag_display_settings[flag-gu]" value="1"<?php checked( 1,$get_flag_choices['flag-gu']); ?> /> Gujarati</div>       
                    <div><input type="checkbox" name="flag_display_settings[flag-ht]" value="1"<?php checked( 1,$get_flag_choices['flag-ht']); ?> /> Haitian</div>                     			
                    <div><input type="checkbox" name="flag_display_settings[flag-iw]" value="1"<?php checked( 1,$get_flag_choices['flag-iw']); ?> /> Hebrew</div>                  
                    <div><input type="checkbox" name="flag_display_settings[flag-hi]" value="1"<?php checked( 1,$get_flag_choices['flag-hi']); ?> /> Hindi</div>    
					<div><input type="checkbox" name="flag_display_settings[flag-hmn]" value="1"<?php checked( 1,$get_flag_choices['flag-hmn']); ?> /> Hmong</div>
                    <div><input type="checkbox" name="flag_display_settings[flag-hu]" value="1"<?php checked( 1,$get_flag_choices['flag-hu']); ?> /> Hungarian</div>               
                    <div><input type="checkbox" name="flag_display_settings[flag-is]" value="1"<?php checked( 1,$get_flag_choices['flag-is']); ?> /> Icelandic</div>                 
                    <div><input type="checkbox" name="flag_display_settings[flag-id]" value="1"<?php checked( 1,$get_flag_choices['flag-id']); ?> /> Indonesian</div>                   
                    <div><input type="checkbox" name="flag_display_settings[flag-ga]" value="1"<?php checked( 1,$get_flag_choices['flag-ga']); ?> /> Irish</div>  
					<div><input type="checkbox" name="flag_display_settings[flag-it]" value="1"<?php checked( 1,$get_flag_choices['flag-it']); ?> /> Italian</div>
				</div>
				  
				  <div class="flagdisplay" style="width:25%; float:left">   
                    <div><input type="checkbox" name="flag_display_settings[flag-ja]" value="1"<?php checked( 1,$get_flag_choices['flag-ja']); ?> /> Japanese</div>   
					<div><input type="checkbox" name="flag_display_settings[flag-jw]" value="1"<?php checked( 1,$get_flag_choices['flag-jw']); ?> /> Javanese</div>
                    <div><input type="checkbox" name="flag_display_settings[flag-kn]" value="1"<?php checked( 1,$get_flag_choices['flag-kn']); ?> /> Kannada</div> 
					<div><input type="checkbox" name="flag_display_settings[flag-km]" value="1"<?php checked( 1,$get_flag_choices['flag-km']); ?> /> Khmer</div>
                    <div><input type="checkbox" name="flag_display_settings[flag-ko]" value="1"<?php checked( 1,$get_flag_choices['flag-ko']); ?> /> Korean</div>                    
                    <div><input type="checkbox" name="flag_display_settings[flag-lo]" value="1"<?php checked( 1,$get_flag_choices['flag-lo']); ?> /> Lao</div>                     
                    <div><input type="checkbox" name="flag_display_settings[flag-la]" value="1"<?php checked( 1,$get_flag_choices['flag-la']); ?> /> Latin</div>                    
                    <div><input type="checkbox" name="flag_display_settings[flag-lv]" value="1"<?php checked( 1,$get_flag_choices['flag-lv']); ?> /> Latvian</div>                    
                    <div><input type="checkbox" name="flag_display_settings[flag-lt]" value="1"<?php checked( 1,$get_flag_choices['flag-lt']); ?> /> Lithuanian</div>                  
                    <div><input type="checkbox" name="flag_display_settings[flag-mk]" value="1"<?php checked( 1,$get_flag_choices['flag-mk']); ?> /> Macedonian</div>                    
                    <div><input type="checkbox" name="flag_display_settings[flag-ms]" value="1"<?php checked( 1,$get_flag_choices['flag-ms']); ?> /> Malay</div>       
                    <div><input type="checkbox" name="flag_display_settings[flag-mt]" value="1"<?php checked( 1,$get_flag_choices['flag-mt']); ?> /> Maltese</div>
					<div><input type="checkbox" name="flag_display_settings[flag-mr]" value="1"<?php checked( 1,$get_flag_choices['flag-mr']); ?> /> Marathi</div>   
                    <div><input type="checkbox" name="flag_display_settings[flag-no]" value="1"<?php checked( 1,$get_flag_choices['flag-no']); ?> /> Norwegian</div>                  
                    <div><input type="checkbox" name="flag_display_settings[flag-fa]" value="1"<?php checked( 1,$get_flag_choices['flag-fa']); ?> /> Persian</div>          
                    <div><input type="checkbox" name="flag_display_settings[flag-pl]" value="1"<?php checked( 1,$get_flag_choices['flag-pl']); ?> /> Polish</div>               
                    <div><input type="checkbox" name="flag_display_settings[flag-pt]" value="1"<?php checked( 1,$get_flag_choices['flag-pt']); ?> /> Portuguese</div> 
                    <div><input type="checkbox" name="flag_display_settings[flag-ro]" value="1"<?php checked( 1,$get_flag_choices['flag-ro']); ?> /> Romanian</div>                   
                    <div><input type="checkbox" name="flag_display_settings[flag-ru]" value="1"<?php checked( 1,$get_flag_choices['flag-ru']); ?> /> Russian</div>  
				</div>
				  
				  <div class="flagdisplay" style="width:25%; float:left">
 					<div><input type="checkbox" name="flag_display_settings[flag-sr]" value="1"<?php checked( 1,$get_flag_choices['flag-sr']); ?> /> Serbian</div>                      
                    <div><input type="checkbox" name="flag_display_settings[flag-sk]" value="1"<?php checked( 1,$get_flag_choices['flag-sk']); ?> /> Slovak</div>                   
                    <div><input type="checkbox" name="flag_display_settings[flag-sl]" value="1"<?php checked( 1,$get_flag_choices['flag-sl']); ?> /> Slovenian</div>                     
                    <div><input type="checkbox" name="flag_display_settings[flag-es]" value="1"<?php checked( 1,$get_flag_choices['flag-es']); ?> /> Spanish</div>                    
                    <div><input type="checkbox" name="flag_display_settings[flag-sw]" value="1"<?php checked( 1,$get_flag_choices['flag-sw']); ?> /> Swahili</div>                     
                    <div><input type="checkbox" name="flag_display_settings[flag-sv]" value="1"<?php checked( 1,$get_flag_choices['flag-sv']); ?> /> Swedish</div>                    
                    <div><input type="checkbox" name="flag_display_settings[flag-ta]" value="1"<?php checked( 1,$get_flag_choices['flag-ta']); ?> /> Tamil</div>                    
                    <div><input type="checkbox" name="flag_display_settings[flag-te]" value="1"<?php checked( 1,$get_flag_choices['flag-te']); ?> /> Telugu</div>                  
                    <div><input type="checkbox" name="flag_display_settings[flag-th]" value="1"<?php checked( 1,$get_flag_choices['flag-th']); ?> /> Thai</div>                    
                    <div><input type="checkbox" name="flag_display_settings[flag-tr]" value="1"<?php checked( 1,$get_flag_choices['flag-tr']); ?> /> Turkish</div>       
                    <div><input type="checkbox" name="flag_display_settings[flag-uk]" value="1"<?php checked( 1,$get_flag_choices['flag-uk']); ?> /> Ukranian</div>                     			
                    <div><input type="checkbox" name="flag_display_settings[flag-ur]" value="1"<?php checked( 1,$get_flag_choices['flag-ur']); ?> /> Urdu</div>                  
                    <div><input type="checkbox" name="flag_display_settings[flag-vi]" value="1"<?php checked( 1,$get_flag_choices['flag-vi']); ?> /> Vietnamese</div>          
                    <div><input type="checkbox" name="flag_display_settings[flag-cy]" value="1"<?php checked( 1,$get_flag_choices['flag-cy']); ?> /> Welsh</div>               
                    <div><input type="checkbox" name="flag_display_settings[flag-yi]" value="1"<?php checked( 1,$get_flag_choices['flag-yi']); ?> /> Yiddish</div>                 
				

</div>
			<div style="clear:both"></div>
<?php }
  
  function googlelanguagetranslator_translatebox_cb() {
	add_option ('googlelanguagetranslator_translatebox','yes');

       if ( get_option( 'googlelanguagetranslator_translatebox' ) == false ) {
        // The option already exists, so we just update it.
        update_option( 'googlelanguagetranslator_translatebox', 'yes' );
	  }
	  $options = get_option('googlelanguagetranslator_translatebox'); ?>

          <select name="googlelanguagetranslator_translatebox" id="googlelanguagetranslator_translatebox" style="width:170px">
		      <option value="yes" <?php if($options=='yes'){echo "selected";}?>>Yes, show language box</option>
			  <option value="no" <?php if($options=='no'){echo "selected";}?>>No, hide language box</option>
		  </select>
<?php }
  
  function googlelanguagetranslator_display_cb() {
	add_option ('googlelanguagetranslator_display','Vertical');

       if ( get_option( 'googlelanguagetranslator_display' ) == false ) {
        // The option already exists, so we just update it.
        update_option( 'googlelanguagetranslator_display', 'Vertical' );
	  }
      $options = get_option('googlelanguagetranslator_display'); ?>
          <select name="googlelanguagetranslator_display" id="googlelanguagetranslator_display" style="width:170px;">
             <option value="Vertical" <?php if(get_option('googlelanguagetranslator_display')=='Vertical'){echo "selected";}?>>Vertical</option>
             <option value="Horizontal" <?php if(get_option('googlelanguagetranslator_display')=='Horizontal'){echo "selected";}?>>Horizontal</option>
          </select>  
<?php }
  
  function googlelanguagetranslator_toolbar_cb() {
	add_option ('googlelanguagetranslator_toolbar','Yes');

       if ( get_option( 'googlelanguagetranslator_toolbar' ) == false ) {
        // The option already exists, so we just update it.
        update_option( 'googlelanguagetranslator_toolbar', 'Yes' );
	  }
	  $options = get_option('googlelanguagetranslator_toolbar'); ?>
          <select name="googlelanguagetranslator_toolbar" id="googlelanguagetranslator_toolbar" style="width:170px;">
             <option value="Yes" <?php if(get_option('googlelanguagetranslator_toolbar')=='Yes'){echo "selected";}?>>Yes</option>
             <option value="No" <?php if(get_option('googlelanguagetranslator_toolbar')=='No'){echo "selected";}?>>No</option>
          </select>
<?php }
  
  function googlelanguagetranslator_showbranding_cb() {
	add_option ('googlelanguagetranslator_showbranding','Yes');

       if ( get_option( 'googlelanguagetranslator_showbranding' ) == false ) {
        // The option already exists, so we just update it.
        update_option( 'googlelanguagetranslator_showbranding', 'Yes' );
	  }
	  $options = get_option('googlelanguagetranslator_showbranding'); ?>
          <select name="googlelanguagetranslator_showbranding" id="googlelanguagetranslator_showbranding" style="width:170px;">
             <option value="Yes" <?php if(get_option('googlelanguagetranslator_showbranding')=='Yes'){echo "selected";}?>>Yes</option>
             <option value="No" <?php if(get_option('googlelanguagetranslator_showbranding')=='No'){echo "selected";}?>>No</option>
          </select> 
<?php }
  
  function googlelanguagetranslator_flags_alignment_cb() {
	add_option ('googlelanguagetranslator_flags_alignment','flags_left');

       if ( get_option( 'googlelanguagetranslator_flags_alignment' ) == false ) {
        // The option already exists, so we just update it.
        update_option( 'googlelanguagetranslator_flags_alignment', 'flags_left' );
	  }
	  
	
	$options = get_option('googlelanguagetranslator_flags_alignment','flags_left');
	
	
	
	   ?>
          <input type="radio" name="googlelanguagetranslator_flags_alignment" id="googlelanguagetranslator_flags_alignment" value="flags_left" <?php if($options=='flags_left'){echo "checked";}?>/> Align Left<br/>
		  <input type="radio" name="googlelanguagetranslator_flags_alignment" id="googlelanguagetranslator_flags_alignment" value="flags_right" <?php if($options=='flags_right'){echo "checked";}?>/> Align Right
<?php }
				
  
  
 
} //End initialize_settings()
add_action('admin_init', 'initialize_settings'); 


// Functions for frontend display

function googlelanguagetranslator_included_languages() {
  if ( get_option('googlelanguagetranslator_language_option')=='specific') { 
	   $get_language_choices = get_option ('language_display_settings');
	     //print_r($get_language_choices);
	      
	     foreach ($get_language_choices as $key=>$value) {
	           if($value == 1) {
				  $items[] = $key;
	            }
			}
	     $comma_separated = implode(",",array_values($items));
	
	if ( get_option('googlelanguagetranslator_display') == 'Vertical') {
	     $lang .= 'includedLanguages:\''.$comma_separated.'\',';
	     return $lang;
	} elseif ( get_option('googlelanguagetranslator_display') == 'Horizontal') {
	     $lang .= 'includedLanguages:\''.$comma_separated.'\',';
	     return $lang;
	}
  } 
}
  
function googlelanguagetranslator_vertical(){ 
    $language_choices = googlelanguagetranslator_included_languages();
	if(get_option('googlelanguagetranslator_active')==1){
	  $get_flag_choices = get_option ('flag_display_settings');
	  foreach ($get_flag_choices as $key) {
		//print_r($key);
	  }
	  
	  
	  
      $str='<div id="flags">';
			 
	  
		if ($key == '1') {
		  if ( isset ( $get_flag_choices['flag-af'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|af\'); return false;" title="Afrikaans" class="flag af"></a>';
	    }
		  
		
		  if ( isset ( $get_flag_choices['flag-sq'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|sq\'); return false;" title="Albanian" class="flag sq"></a>';
	    }
		  
		   if ( isset ( $get_flag_choices['flag-ar'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|ar\'); return false;" title="Arabic" class="flag ar"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-hy'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|hy\'); return false;" title="Armenian" class="flag hy"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-az'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|az\'); return false;" title="Azerbaijani" class="flag az"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-eu'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|eu\'); return false;" title="Basque" class="flag eu"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-be'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|be\'); return false;" title="Belarusian" class="flag be"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-bn'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|bn\'); return false;" title="Bengali" class="flag bn"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-bs'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|bs\'); return false;" title="Bosnian" class="flag bs"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-bg'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|bg\'); return false;" title="Bulgarian" class="flag bg"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-ca'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|ca\'); return false;" title="Catalan" class="flag ca"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-ceb'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|ceb\'); return false;" title="Cebuano" class="flag ceb"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-zh-CN'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|zh-CN\'); return false;" title="Chinese (Simplified)" class="flag zh-CN"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-zh-TW'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|zh-TW\'); return false;" title="Chinese (Traditional)" class="flag zh-TW"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-cs'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|cs\'); return false;" title="Czech Republic" class="flag cs"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-hr'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|hr\'); return false;" title="Croatian" class="flag hr"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-da'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|da\'); return false;" title="Danish" class="flag da"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-nl'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|nl\'); return false;" title="Netherlands" class="flag nl"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-en'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|en\'); return false;" title="English" class="flag en"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-eo'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|eo\'); return false;" title="Esperanto" class="flag eo"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-et'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|et\'); return false;" title="Estonian" class="flag et"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-tl'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|tl\'); return false;" title="Filipino" class="flag tl"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-fi'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|fi\'); return false;" title="Finnish" class="flag fi"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-fr'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|fr\'); return false;" title="French" class="flag fr"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-gl'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|gl\'); return false;" title="Galician" class="flag gl"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-ka'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|ka\'); return false;" title="Georgian" class="flag ka"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-de'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|de\'); return false;" title="German" class="flag de"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-el'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|el\'); return false;" title="Greek" class="flag el"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-gu'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|gu\'); return false;" title="Gujarati" class="flag gu"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-ht'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|ht\'); return false;" title="Haitian" class="flag ht"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-iw'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|iw\'); return false;" title="Hebrew" class="flag iw"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-hi'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|hi\'); return false;" title="Hindi" class="flag hi"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-hmn'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|hmn\'); return false;" title="Hmong" class="flag hmn"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-hu'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|hu\'); return false;" title="Hungarian" class="flag hu"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-is'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|is\'); return false;" title="Iceland" class="flag is"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-id'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|id\'); return false;" title="Indonesian" class="flag id"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-ga'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|ga\'); return false;" title="Irish" class="flag ga"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-it'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|it\'); return false;" title="Italian" class="flag it"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-ja'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|ja\'); return false;" title="Japanese" class="flag ja"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-jw'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|jw\'); return false;" title="Javanese" class="flag jw"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-kn'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|kn\'); return false;" title="Kannada" class="flag kn"></a>';
		}
		  
		  if ( isset ( $get_flag_choices['flag-km'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|km\'); return false;" title="Khmer" class="flag km"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-ko'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|ko\'); return false;" title="Korean" class="flag ko"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-lo'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|lo\'); return false;" title="Lao" class="flag lo"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-la'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|la\'); return false;" title="Latin" class="flag la"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-lv'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|lv\'); return false;" title="Latvian" class="flag lv"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-lt'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|lt\'); return false;" title="Lithuanian" class="flag lt"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-mk'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|mk\'); return false;" title="Macedonian" class="flag mk"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-ms'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|ms\'); return false;" title="Malay" class="flag ms"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-mt'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|mt\'); return false;" title="Maltese" class="flag mt"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-mr'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|mr\'); return false;" title="Marathi" class="flag mr"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-no'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|no\'); return false;" title="Norwegian" class="flag no"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-fa'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|fa\'); return false;" title="Persian" class="flag fa"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-pl'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|pl\'); return false;" title="Polish" class="flag pl"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-pt'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|pt\'); return false;" title="Portuguese" class="flag pt"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-ro'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|ro\'); return false;" title="Romanian" class="flag ro"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-ru'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|ru\'); return false;" title="Russian" class="flag ru"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-sr'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|sr\'); return false;" title="Serbian" class="flag sr"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-sk'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|sk\'); return false;" title="Slovak" class="flag sk"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-sl'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|sl\'); return false;" title="Slovenian" class="flag sl"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-es'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|es\'); return false;" title="Spanish" class="flag es"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-sw'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|sw\'); return false;" title="Swahili" class="flag sw"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-sv'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|sv\'); return false;" title="Swedish" class="flag sv"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-ta'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|ta\'); return false;" title="Tamil" class="flag ta"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-te'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|te\'); return false;" title="Telugu" class="flag te"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-th'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|th\'); return false;" title="haiT" class="flag th"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-tr'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|tr\'); return false;" title="Turkish" class="flag tr"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-uk'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|uk\'); return false;" title="Ukranian" class="flag uk"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-ur'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|ur\'); return false;" title="Urdu" class="flag ur"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-vi'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|vi\'); return false;" title="Vietnamese" class="flag vi"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-hy'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|hy\'); return false;" title="Armenian" class="flag hy"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-cy'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|cy\'); return false;" title="Welsh" class="flag cy"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-yi'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|yi\'); return false;" title="Yiddish (Jewish)" class="flag yi"></a>';
	    }
		  
		  
	  // }
	  
      $str.='<div class="glt-clear"></div>';
		  
	  $str.='</div>';
		
      $str.='<script type="text/javascript">     
         function GoogleLanguageTranslatorInit() { 
         new google.translate.TranslateElement({pageLanguage: \''.get_option('googlelanguagetranslator_language').'\', '.$language_choices.'autoDisplay: false }, \'google_language_translator\');}
              </script><script type="text/javascript" src="http://translate.google.com/translate_a/element.js?cb=GoogleLanguageTranslatorInit"></script>
<div id="google_language_translator"></div>';
		return $str;
	}
}
}

function googlelanguagetranslator_horizontal(){
  $language_choices = googlelanguagetranslator_included_languages();
	if(get_option('googlelanguagetranslator_active')==1){
	  $get_flag_choices = get_option ('flag_display_settings');
	  
      $str = '<div id="flags">';
			  
	  foreach ($get_flag_choices as $key) {
		//print_r($key);
	  }
		if ($key == '1') {
		  if ( isset ( $get_flag_choices['flag-af'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|af\'); return false;" title="Afrikaans" class="flag af"></a>';
	    }
		  
		
		  if ( isset ( $get_flag_choices['flag-sq'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|sq\'); return false;" title="Albanian" class="flag sq"></a>';
	    }
		  
		   if ( isset ( $get_flag_choices['flag-ar'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|ar\'); return false;" title="Arabic" class="flag ar"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-hy'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|hy\'); return false;" title="Armenian" class="flag hy"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-az'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|az\'); return false;" title="Azerbaijani" class="flag az"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-eu'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|eu\'); return false;" title="Basque" class="flag eu"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-be'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|be\'); return false;" title="Belarusian" class="flag be"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-bn'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|bn\'); return false;" title="Bengali" class="flag bn"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-bs'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|bs\'); return false;" title="Bosnian" class="flag bs"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-bg'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|bg\'); return false;" title="Bulgarian" class="flag bg"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-ca'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|ca\'); return false;" title="Catalan" class="flag ca"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-ceb'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|ceb\'); return false;" title="Cebuano" class="flag ceb"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-zh-CN'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|zh-CN\'); return false;" title="Chinese (Simplified)" class="flag zh-CN"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-zh-TW'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|zh-TW\'); return false;" title="Chinese (Traditional)" class="flag zh-TW"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-cs'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|cs\'); return false;" title="Czech Republic" class="flag cs"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-hr'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|hr\'); return false;" title="Croatian" class="flag hr"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-da'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|da\'); return false;" title="Danish" class="flag da"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-nl'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|nl\'); return false;" title="Netherlands" class="flag nl"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-en'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|en\'); return false;" title="English" class="flag en"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-eo'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|eo\'); return false;" title="Esperanto" class="flag eo"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-et'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|et\'); return false;" title="Estonian" class="flag et"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-tl'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|tl\'); return false;" title="Filipino" class="flag tl"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-fi'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|fi\'); return false;" title="Finnish" class="flag fi"></a>';
		  }
		  
		  if ( isset ( $get_flag_choices['flag-fr'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|fr\'); return false;" title="French" class="flag fr"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-gl'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|gl\'); return false;" title="Galician" class="flag gl"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-ka'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|ka\'); return false;" title="Georgian" class="flag ka"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-de'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|de\'); return false;" title="German" class="flag de"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-el'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|el\'); return false;" title="Greek" class="flag el"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-gu'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|gu\'); return false;" title="Gujarati" class="flag gu"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-ht'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|ht\'); return false;" title="Haitian" class="flag ht"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-iw'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|iw\'); return false;" title="Hebrew" class="flag iw"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-hi'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|hi\'); return false;" title="Hindi" class="flag hi"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-hmn'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|hmn\'); return false;" title="Hmong" class="flag hmn"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-hu'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|hu\'); return false;" title="Hungarian" class="flag hu"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-is'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|is\'); return false;" title="Iceland" class="flag is"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-id'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|id\'); return false;" title="Indonesian" class="flag id"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-ga'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|ga\'); return false;" title="Irish" class="flag ga"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-it'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|it\'); return false;" title="Italian" class="flag it"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-ja'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|ja\'); return false;" title="Japanese" class="flag ja"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-jw'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|jw\'); return false;" title="Javanese" class="flag jw"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-kn'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|kn\'); return false;" title="Kannada" class="flag kn"></a>';
		}
		  
		  if ( isset ( $get_flag_choices['flag-km'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|km\'); return false;" title="Khmer" class="flag km"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-ko'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|ko\'); return false;" title="Korean" class="flag ko"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-lo'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|lo\'); return false;" title="Lao" class="flag lo"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-la'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|la\'); return false;" title="Latin" class="flag la"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-lv'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|lv\'); return false;" title="Latvian" class="flag lv"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-lt'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|lt\'); return false;" title="Lithuanian" class="flag lt"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-mk'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|mk\'); return false;" title="Macedonian" class="flag mk"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-ms'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|ms\'); return false;" title="Malay" class="flag ms"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-mt'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|mt\'); return false;" title="Maltese" class="flag mt"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-mr'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|mr\'); return false;" title="Marathi" class="flag mr"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-no'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|no\'); return false;" title="Norwegian" class="flag no"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-fa'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|fa\'); return false;" title="Persian" class="flag fa"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-pl'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|pl\'); return false;" title="Polish" class="flag pl"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-pt'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|pt\'); return false;" title="Portuguese" class="flag pt"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-ro'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|ro\'); return false;" title="Romanian" class="flag ro"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-ru'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|ru\'); return false;" title="Russian" class="flag ru"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-sr'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|sr\'); return false;" title="Serbian" class="flag sr"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-sk'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|sk\'); return false;" title="Slovak" class="flag sk"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-sl'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|sl\'); return false;" title="Slovenian" class="flag sl"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-es'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|es\'); return false;" title="Spanish" class="flag es"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-sw'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|sw\'); return false;" title="Swahili" class="flag sw"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-sv'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|sv\'); return false;" title="Swedish" class="flag sv"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-ta'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|ta\'); return false;" title="Tamil" class="flag ta"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-te'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|te\'); return false;" title="Telugu" class="flag te"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-th'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|th\'); return false;" title="haiT" class="flag th"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-tr'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|tr\'); return false;" title="Turkish" class="flag tr"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-uk'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|uk\'); return false;" title="Ukranian" class="flag uk"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-ur'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|ur\'); return false;" title="Urdu" class="flag ur"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-vi'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|vi\'); return false;" title="Vietnamese" class="flag vi"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-hy'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|hy\'); return false;" title="Armenian" class="flag hy"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-cy'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|cy\'); return false;" title="Welsh" class="flag cy"></a>';
	    }
		  
		  if ( isset ( $get_flag_choices['flag-yi'] ) ) {
		  $str.='<a href="#" onclick="doGoogleLanguageTranslator(\''.get_option('googlelanguagetranslator_language').'|yi\'); return false;" title="Yiddish (Jewish)" class="flag yi"></a>';
	    }
		  
		  
	  
      
	  
	  $str.='</div>';
      $str.='<script type="text/javascript">
         function GoogleLanguageTranslatorInit() { 
         new google.translate.TranslateElement({pageLanguage: \''.get_option('googlelanguagetranslator_language').'\', '.$language_choices.' layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL,autoDisplay: false }, \'google_language_translator\'); }
              </script><script type="text/javascript" src="http://translate.google.com/translate_a/element.js?cb=GoogleLanguageTranslatorInit"></script>
<div id="google_language_translator"></div>';
		return $str;
	}
	}
}


function googlelanguagetranslator_toolbar_yes(){
  if(get_option('googlelanguagetranslator_active')==1) { 
	$str='<style type="text/css">';
    $str.='#google_language_translator {color: transparent;}';
    $str.='.goog-te-gadget .goog-te-combo {margin: 2px 0px !important;}';
    $str.='.goog-tooltip {display: none !important;}';
    $str.='.goog-tooltip:hover {display: none !important;}';
    $str.='.goog-text-highlight {background-color: transparent !important; border: none !important;box-shadow: none !important;}';
    $str.='</style>';
return $str;
  }
}

function googlelanguagetranslator_toolbar_no(){
  if(get_option('googlelanguagetranslator_active')==1) { ?>
<style type="text/css">
.goog-te-banner-frame{visibility:hidden !important;}
body {top:0px !important;}
</style>
<?php
  }
}


function googlelanguagetranslator_showbranding_yes() {
  if(get_option('googlelanguagetranslator_active')==1) { ?>
<style type="text/css">
  #google_language_translator { width:auto !important; }
.goog-te-gadget .goog-te-combo {margin: 4px 0px !important;}
.goog-tooltip {display: none !important;}
.goog-tooltip:hover {display: none !important;}
.goog-text-highlight {background-color: transparent !important; border: none !important; box-shadow: none !important;}
</style>
<?php
  }
}

function googlelanguagetranslator_flags() {
  if(get_option('googlelanguagetranslator_active') ==1) { ?>
<style type="text/css">
  #flags { display:none; }
</style>
<?php 
  }
}

function googlelanguagetranslator_translatebox() {
  if(get_option('googlelanguagetranslator_active') ==1) { ?>
<style type="text/css">
  #google_language_translator { display:none; }
</style>
<?php 
  }
}

function googlelanguagetranslator_showbranding_no() {
  if(get_option('googlelanguagetranslator_active')==1) { ?>
<style type="text/css">
#google_language_translator a {display: none !important; }
.goog-te-gadget {color:transparent !important;}
.goog-te-gadget { font-size:0px !important; }
.goog-te-gadget .goog-te-combo {margin: 2px 0px !important;}
.goog-tooltip {display: none !important;}
.goog-tooltip:hover {display: none !important;}
.goog-text-highlight {background-color: transparent !important; border: none !important; box-shadow: none !important;}

</style>
<?php
  }
}

function googlelanguagetranslator_flags_display() { ?>
  <style type="text/css">
	<?php if(get_option('googlelanguagetranslator_display')=='Vertical') { ?>
	  <?php if (get_option('googlelanguagetranslator_language_option')=='specific') { ?>
		#flags {display:none !important; }
		<?php } ?>
	  p.hello { font-size:12px; color:darkgray; }
	  <?php } elseif (get_option('googlelanguagetranslator_display')=='Horizontal') { ?>
	  <?php if (get_option('googlelanguagetranslator_language_option')=='specific') { ?>
		#flags {display:none !important; }
		<?php } ?>
	  <?php if (get_option('googlelanguagetranslator_flags_alignment')=='flags_right') { ?>
	    #google_language_translator { text-align:left !important; }
	    select.goog-te-combo { float:right; }
	    .goog-te-gadget { padding-top:13px; }
	    .goog-te-gadget .goog-te-combo { margin-top:-7px !important; }
	  <?php } ?>
	    .goog-te-gadget { margin-top:2px !important; }
	    p.hello { font-size:12px; color:#666; }
	  <?php } ?>
	<?php if ( get_option ('googlelanguagetranslator_flags_alignment') == 'flags_right') { ?>
	  #google_language_translator { clear:both; width:auto !important; text-align:right; }
	  #flags { text-align:right; width:150px; float:right; clear:right; }
	  p.hello { text-align:right; float:right; clear:both; color:#666; }
	  .glt-clear { height:0px; clear:both; margin:0px; padding:0px; }
	<?php } ?>
	<?php if ( get_option ('googlelanguagetranslator_flags_alignment') == 'flags_left') { ?>
	  #google_language_translator { clear:both; }
	  #flags { width:150px; }
	  #flags a { display:inline-block; width:16px; height:12px; margin-right:2px; }
		p.hello { font-size:12px; color:#666; }
	  <?php } elseif ( get_option ('googlelanguagetranslator_flags_alignment') == 'flags_right') { ?>
	  #flags { width:150px; }
	  #flags a { display:inline-block; width:16px; height:12px; margin-left:2px; } ?>
		<?php } ?>
  </style>
	<?php 
       $get_flag_choices = get_option ('flag_display_settings');
         
         if ( isset ( $get_flag_choices['flag-zh-CN'] ) ) { ?>
          <style type="text/css">
	        #flags a.zh-CN { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/china.png") 0px 0px no-repeat; }
          </style>
<?php } else { ?>
          <style type="text/css">
			#flags a.zh-CN { display:none; }
          </style>
	     <?php } 
	   
	     if ( isset ( $get_flag_choices['flag-de'] ) ) { ?>
		  <style type="text/css">
	        #flags a.de { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/germany.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
			#flags a.de { display:none; }
          </style>
	     <?php } 
  
         if ( isset ( $get_flag_choices['flag-da'] ) ) { ?>
		  <style type="text/css">
	        #flags a.da { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/denmark.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
			#flags a.da { display:none; }
          </style>
	     <?php } 
												   
	     if ( isset ( $get_flag_choices['flag-fr'] ) ) { ?>     
          <style type="text/css">
	        #flags a.fr { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/france.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
			#flags a.fr { display:none; }
          </style>
	     <?php } 
												   
	     if ( isset ( $get_flag_choices['flag-en'] ) ) { ?>    
          <style type="text/css">
	        #flags a.en { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/united-kingdom.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
			#flags a.en { display:none; }
          </style>
	     <?php } 
												   
	     if ( isset ( $get_flag_choices['flag-it'] ) ) { ?> 
          <style type="text/css">
	        #flags a.it { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/italy.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
			#flags a.it { display:none; }
          </style>
	     <?php } 
												   
	     if ( isset ( $get_flag_choices['flag-es'] ) ) { ?>
          <style type="text/css">
		    #flags a.es { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/spain.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
			#flags a.es { display:none; }
          </style>
	     <?php } 
												   
	     
  
          if ( isset ( $get_flag_choices['flag-af'] ) ) { ?>
		  <style type="text/css">
	        #flags a.af { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/southafrica.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
			#flags a.af { display:none; }
          </style>
	     <?php } 
  
          if ( isset ( $get_flag_choices['flag-sq'] ) ) { ?>
		  <style type="text/css">
	        #flags a.sq { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/albania.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
			#flags a.sq { display:none; }
          </style>
	     <?php } 
  
          if ( isset ( $get_flag_choices['flag-ar'] ) ) { ?>
		  <style type="text/css">
	        #flags a.ar { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/saudiarabia.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
			#flags a.ar { display:none; }
          </style>
	     <?php } 
  
          if ( isset ( $get_flag_choices['flag-hy'] ) ) { ?>
		  <style type="text/css">
	        #flags a.hy { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/armenia.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
			#flags a.hy { display:none; }
          </style>
	     <?php } 
  
          if ( isset ( $get_flag_choices['flag-az'] ) ) { ?>
		  <style type="text/css">
	        #flags a.az { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/azerbaijan.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
			#flags a.az { display:none; }
          </style>
	     <?php } 
  
         if ( isset ( $get_flag_choices['flag-eu'] ) ) { ?>
		  <style type="text/css">
	        #flags a.eu { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/basque.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
			#flags a.eu { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-be'] ) ) { ?>
		  <style type="text/css">
	        #flags a.be { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/belarus.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
			#flags a.be { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-bn'] ) ) { ?>
		  <style type="text/css">
	        #flags a.bn { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/bangladesh.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
			#flags a.bn { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-bs'] ) ) { ?>
		  <style type="text/css">
	       #flags a.bs { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/bosnia.png") 0px 0px no-repeat; }
          </style>
         <?php } else { ?>
          <style type="text/css">
	       #flags a.bs { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-bg'] ) ) { ?>
		  <style type="text/css">
	       #flags a.bg { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/bulgaria.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.bg { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-ca'] ) ) { ?>
		  <style type="text/css">
	       #flags a.ca { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/spain.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.ca { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-ceb'] ) ) { ?>
		  <style type="text/css">
	       #flags a.ceb { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/philippines.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.ceb { display:none; }
          </style>
	     <?php }
  
         
  
         if ( isset ( $get_flag_choices['flag-zh-TW'] ) ) { ?>
		  <style type="text/css">
	       #flags a.zh-TW { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/china.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.zh-TW { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-cs'] ) ) { ?>
		  <style type="text/css">
	       #flags a.cs { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/croatia.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.cs { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-hr'] ) ) { ?>
		  <style type="text/css">
	       #flags a.hr { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/czechrepublic.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.hr { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-nl'] ) ) { ?>
		  <style type="text/css">
	       #flags a.nl { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/netherlands.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.nl { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-eo'] ) ) { ?>
		  <style type="text/css">
	       #flags a.eo { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/esperanto.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.eo { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-et'] ) ) { ?>
		  <style type="text/css">
	       #flags a.et { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/estonia.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.et { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-tl'] ) ) { ?>
		  <style type="text/css">
	       #flags a.tl { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/philippines.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.tl { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-fi'] ) ) { ?>
		  <style type="text/css">
	       #flags a.fi { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/finland.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.fi { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-gl'] ) ) { ?>
		  <style type="text/css">
	       #flags a.gl { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/galicia.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.gl { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-ka'] ) ) { ?>
		  <style type="text/css">
	       #flags a.ka { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/georgia.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.ka { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-el'] ) ) { ?>
		  <style type="text/css">
	       #flags a.el { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/greece.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.el { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-gu'] ) ) { ?>
		  <style type="text/css">
	       #flags a.gu { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/india.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.gu { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-ht'] ) ) { ?>
		  <style type="text/css">
	       #flags a.ht { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/haiti.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.ht { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-iw'] ) ) { ?>
		  <style type="text/css">
	       #flags a.iw { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/israel.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.iw { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-hi'] ) ) { ?>
		  <style type="text/css">
	       #flags a.hi { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/india.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.hi { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-hmn'] ) ) { ?>
		  <style type="text/css">
	       #flags a.hmn { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/hmong.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.hmn { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-hu'] ) ) { ?>
		  <style type="text/css">
	       #flags a.hu { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/hungary.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.hu { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-is'] ) ) { ?>
		  <style type="text/css">
	       #flags a.is { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/iceland.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.is { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-id'] ) ) { ?>
		  <style type="text/css">
	       #flags a.id { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/indonesia.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.id { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-ga'] ) ) { ?>
		  <style type="text/css">
	       #flags a.ga { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/ireland.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.ga { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-ja'] ) ) { ?>
		  <style type="text/css">
	       #flags a.ja { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/japan.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.ja { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-jw'] ) ) { ?>
		  <style type="text/css">
	       #flags a.jw { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/indonesia.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.jw { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-kn'] ) ) { ?>
		  <style type="text/css">
	       #flags a.kn { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/kannada.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.kn { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-km'] ) ) { ?>
		  <style type="text/css">
	       #flags a.km { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/cambodia.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.km { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-ko'] ) ) { ?>
		  <style type="text/css">
	       #flags a.ko { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/korea.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.ko { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-lo'] ) ) { ?>
		  <style type="text/css">
			#flags a.lo { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/laos.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.lo { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-la'] ) ) { ?>
		  <style type="text/css">
			#flags a.la { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/latin.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.la { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-lv'] ) ) { ?>
		  <style type="text/css">
			#flags a.lv { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/latvia.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.lv { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-lt'] ) ) { ?>
		  <style type="text/css">
			#flags a.lt { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/lithuania.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.lt { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-mk'] ) ) { ?>
		  <style type="text/css">
			#flags a.mk { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/macedonia.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.mk { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-ms'] ) ) { ?>
		  <style type="text/css">
			#flags a.ms { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/malaysia.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.ms { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-mt'] ) ) { ?>
		  <style type="text/css">
			#flags a.mt { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/malta.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.mt { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-mr'] ) ) { ?>
		  <style type="text/css">
			#flags a.mr { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/marathi.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.mr { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-no'] ) ) { ?>
		  <style type="text/css">
			#flags a.no { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/norway.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.no { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-fa'] ) ) { ?>
		  <style type="text/css">
			#flags a.fa { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/iran.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.fa { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-pl'] ) ) { ?>
		  <style type="text/css">
			#flags a.pl { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/poland.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.pl { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-pt'] ) ) { ?>
		  <style type="text/css">
			#flags a.pt { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/portugal.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.pt { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-ro'] ) ) { ?>
		  <style type="text/css">
			#flags a.ro { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/romania.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.ro { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-ru'] ) ) { ?>
		  <style type="text/css">
			#flags a.ru { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/russia.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.ru { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-sr'] ) ) { ?>
		  <style type="text/css">
			#flags a.sr { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/serbia.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.sr { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-sk'] ) ) { ?>
		  <style type="text/css">
			#flags a.sk { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/slovakia.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.sk { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-sv'] ) ) { ?>
		  <style type="text/css">
			#flags a.sv { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/sweden.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.sv { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-sw'] ) ) { ?>
		  <style type="text/css">
			#flags a.sw { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/kenya.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.sw { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-sl'] ) ) { ?>
		  <style type="text/css">
			#flags a.sl { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/slovenia.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.sl { display:none; }
          </style>
	     <?php }
  
  
        if ( isset ( $get_flag_choices['flag-ta'] ) ) { ?>
		  <style type="text/css">
			#flags a.ta { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/tamil.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.ta { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-te'] ) ) { ?>
		  <style type="text/css">
			#flags a.te { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/telugu.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.te { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-th'] ) ) { ?>
		  <style type="text/css">
			#flags a.th { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/thailand.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.th { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-tr'] ) ) { ?>
		  <style type="text/css">
			#flags a.tr { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/turkey.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.tr { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-uk'] ) ) { ?>
		  <style type="text/css">
			#flags a.uk { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/ukraine.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.uk { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-ur'] ) ) { ?>
		  <style type="text/css">
			#flags a.ur { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/pakistan.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.ur { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-vi'] ) ) { ?>
		  <style type="text/css">
			#flags a.vi { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/vietnam.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.vi { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-cy'] ) ) { ?>
		  <style type="text/css">
			#flags a.cy { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/wales.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.cy { display:none; }
          </style>
	     <?php }
  
         if ( isset ( $get_flag_choices['flag-yi'] ) ) { ?>
		  <style type="text/css">
			#flags a.yi { background:url("<?php echo plugins_url(); ?>/google-language-translator/images/yiddish.png") 0px 0px no-repeat; }
          </style>
	     <?php } else { ?>
          <style type="text/css">
	       #flags a.yi { display:none; }
          </style>
	     <?php }
     } 
add_action('wp_head','googlelanguagetranslator_flags_display');

?>