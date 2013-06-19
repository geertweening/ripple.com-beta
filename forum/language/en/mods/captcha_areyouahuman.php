<?php

/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'AREYOUAHUMAN_LANG'			=> 'en',
	'CAPTCHA_AREYOUAHUMAN'			=> 'AreYouAHuman',
	'AREYOUAHUMAN_PUBLISHER_KEY'		=> 'AreYouAHuman Publisher Key',
	'AREYOUAHUMAN_PUBLISHER_KEY_EXPLAIN'	=> 'This is your AreYouAHuman publisher key.',
	'AREYOUAHUMAN_SCORING_KEY'		=> 'AreYouAHuman Scoring Key',
	'AREYOUAHUMAN_SCORING_KEY_EXPLAIN'	=> 'This is your AreYouAHuman scoring key.',
	'AREYOUAHUMAN_SERVER'			=> 'AreYouAHuman Server',
	'AREYOUAHUMAN_SERVER_EXPLAIN'		=> 'This is usually ws.areyouahuman.com.',
	'AREYOUAHUMAN_NO_KEY'			=> 'Register at www.areyouahuman.com for a key.',

	# error messages
	'ERROR_BAD_CONFIG'		=> 'AreYouAHuman is not configured properly: creation of client session failed. Please contact the administrator of this site.',
	'ERROR_UNAVAILABLE'		=> 'AreYouAHuman is unavailble.',
	'ERROR_UNEXPECTED'		=> 'Unexpected status.',
	'ERROR_EMPTY_KEY'		=> 'Received a private key that was all whitespace or empty.',
	'ERROR_NO_SOCKET'		=> 'Can not get socket to host.',
	'ERROR_EXCESSIVE_DATA'	=> 'Excessive data returned from webservice call.',
	'ERROR_PREAMBLE'		=> 'ERROR: AreYouAHuman client: ',
	'ERROR_VISITOR_IP'		=> 'invalid visitor_ip',
	'ERROR_SERVER_STATUS'	=> 'Unexpected server status.',
	'ERROR_BAD_RESPONSE'	=> 'Bad HTTP response from server.',
	'ERROR_WRONG_ANSWER'	=> 'Sorry, your response was not correct.',

	// return codes
	'CODE_INVALID_PRIVATE_KEY'		=> 'invalid_private_key',
	'CODE_SERVER_UNREACHABLE'		=> 'server_unreachable',
	'CODE_INVALID_SERVER_RESPONSE'	=> 'invalid_server_response'
));

?>
