<?php
/**
*
* @package VC
* @version 1.0.2
* @copyright (c) AreYouAHuman based on the code from PeopleSign
* @license http://opensource.org/licenses/gpl-license.php GNU Public License, v2
*/

/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (!class_exists('phpbb_default_captcha'))
{
	// We need the classic captcha code for tracking solutions and attempts
	include($phpbb_root_path . 'includes/captcha/plugins/captcha_abstract.' . $phpEx);
}

// We need the areyouahuman client plugin
include($phpbb_root_path . 'includes/captcha/plugins/areyouahuman_client.' . $phpEx);

/**
* @package VC
*/
class phpbb_areyouahuman extends phpbb_default_captcha
{
	var $solved						= false;
	var $ayahIntegration;

	function phpbb_areyouahuman()
	{
		global $user, $config;
		$user->add_lang('mods/captcha_areyouahuman');
		$this->make_init();
	}

	function make_init() {
		global $config;
		$this->ayahIntegration = new AyahIntegration(array(
			"ayah_web_service_host" => $config['areyouahuman_server'],
			"ayah_publisher_key" => $config['areyouahuman_publisher_key'],
			"ayah_scoring_key" => $config['areyouahuman_scoring_key'],
		));
		
	}
	
	function init($type) {
	}

	function get_template()
	{
		global $template;

		$this->load_code();

		$template->assign_vars( array(
			'CODE'				=> $this->code,
			'S_CONFIRM_CODE'	=> true, // required for max login attempts
		));

		return 'captcha_areyouahuman.html';
	}

	function get_demo_template($id)
	{
		global $template;

		$this->load_code();

		$template->assign_vars( array(
			'CODE'  => $this->code,
		));

		return 'captcha_areyouahuman_acp_demo.html';
	}

	/**
	* Check the captcha to determine if the user can pass
	* returns:
	*	false - success, user passes
	*	true  - failure, user does not pass
	**/
	function validate()
	{
		if ($this->solved)
		{
			return false;
		}
		
		if ($this->ayahIntegration->scoreResult()) {
			$this->solved = true;
			return false;		
		} else {
			return "Sorry, please complete the PlayThru game.";	
		}
	}

	/**
	* Restore the captcha to its starting state.
	**/
	function reset()
	{
		$this->make_init();
		$this->solved = false;
	}

	/**
	* Determines weather or not the captcha is available and ready.
	**/
        function is_available()
        {
                global $config;

                $required_fields = array(
                        'areyouahuman_server',
			'areyouahuman_publisher_key',
                        'areyouahuman_scoring_key'
                );

                foreach ($required_fields as $field) {
                        error_log($config[$field]);
                        if (empty($config[$field])) {
                                return false;
                        }
                }
                return true;
        }


	
	/**
	* Handle the Administration Control Panel configuration
	**/
	function acp_page($id, &$module)
	{
		global $template, $config, $user;

		$captcha_vars = array(
			'areyouahuman_publisher_key' => 'AREYOUAHUMAN_PUBLISHER_KEY',
			'areyouahuman_scoring_key' => 'AREYOUAHUMAN_SCORING_KEY',
			'areyouahuman_server' => 'AREYOUAHUMAN_SERVER'
		);

		$module->tpl_name = 'captcha_areyouahuman_acp';
		$module->page_title = 'ACP_VC_SETTINGS';

		$form_key = 'acp_captcha';
		add_form_key($form_key);

		// button options on the configure page
		$submit = request_var('submit', '');
		$preview = request_var('preview', '');

		// On preview or submit, then set the values
		if(($preview || $submit) && check_form_key($form_key))
		{
			$captcha_vars = array_keys($captcha_vars);
			foreach ($captcha_vars as $captcha_var)
			{
				$value = request_var($captcha_var, '');
				set_config($captcha_var, $value);
			}
			if($submit)
			{
				add_log('admin', 'LOG_CONFIG_VISUAL');
				trigger_error($user->lang['CONFIG_UPDATED'] .
					adm_back_link($module->u_action));
			}
		}
		else if ($submit || $preview)
		{
			trigger_error($user->lang['FORM_INVALID'] . adm_back_link($module->u_action));
		}
		else
		{
			foreach ($captcha_vars as $captcha_var => $template_var)
			{
				$var = request_var($captcha_var, '');
				if (!$var)
				{
					$var = ((isset($config[$captcha_var])) ? $config[$captcha_var] : '');
				}
				$template->assign_var($template_var, $var);
			}
		}

		$this->reset();

		$template->assign_vars( array(
			'AREYOUAHUMAN_PUBLISHER_KEY' 	=> $config["areyouahuman_publisher_key"],
			'AREYOUAHUMAN_SCORING_KEY' 	=> $config["areyouahuman_scoring_key"],
			'AREYOUAHUMAN_SERVER'  		=> $config["areyouahuman_server"],
			'CAPTCHA_PREVIEW' 		=> $this->get_demo_template($id),
			'CAPTCHA_NAME'			=> $this->get_class_name(),
			'U_ACTION'			=> $module->u_action,
			'CAPTCHA_PREVIEW' 		=> $this->get_demo_template($id),
			'CAPTCHA_NAME'			=> $this->get_class_name(),
			'U_ACTION'			=> $module->u_action,
		));
	}

	
	function load_code()
	{
		global $user;

		if ($this->solved)
		{
			$this->reset();
		}
		$this->code = $this->ayahIntegration->generateHTML();
		return $this->code;
	}

	/**
	* Determines whether or not to display the acp config page. AreYouAHuman requires it.
	**/
	function has_config()
	{
		return true;
	}

	function is_solved()
	{
		return (bool) $this->solved;
	}

	function get_name()
	{
		global $user;
		$user->add_lang('mods/captcha_areyouahuman');
		return 'CAPTCHA_AREYOUAHUMAN';
	}

	function get_class_name()
	{
		return 'phpbb_areyouahuman';
	}

	function &get_instance()
	{
		$instance =& new phpbb_areyouahuman();
		return $instance;
	}

	// Not needed
	function new_attempt() {}
	function execute_demo() {}
	function execute() {}
	function generate_code() {}
	function regenerate_code() {}
	function check_code() {}
	function delete_code() {}
	function garbage_collect($type) {}
}
?>
