<?php
/**
 * @package JMS Support Online module
 * @version 2.0
 * @author JoomMasterS team
 * @Copyright (C) 2009 - 2013 JoomMasterS.
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @Website: http://www.joommasters.com
*/	

// no direct access
defined('_JEXEC') or die;

require_once (dirname(__FILE__).'/helper.php');

$supportername = $params->get( 'supportername', 1 ) ;
$display = $params->get( 'display', 1 ) ;
$yahoo = $params->get( 'cf_yahoo', 1 ) ;
$skype = $params->get( 'cf_skype', 1 ) ;
$aim = $params->get( 'cf_aim', 1 ) ;
$icq = $params->get( 'cf_icq', 1 ) ;
$msn = $params->get( 'cf_msn', 1 ) ;
$email = $params->get( 'cf_email', 1 ) ;
$tel = $params->get( 'cf_tel', 1 ) ;
for ($i=1;$i<=5;$i++) {
	$support[$i]->name = $params->get( "support$i", "" ) ;
	if ($support[$i]->name <> "") {
		$support[$i]->yahoo = $params->get( "yahoo$i", "" ) ;
		$support[$i]->skype = $params->get( "skype$i", "" ) ;
		$support[$i]->aim = $params->get( "aim$i", "" ) ;
		$support[$i]->msn = $params->get( "msn$i", "" ) ;
		$support[$i]->icq = $params->get( "icq$i", "" ) ;
		$support[$i]->tel = $params->get( "tel$i", "" ) ;
		$support[$i]->email = $params->get( "email$i", "" ) ;
		$support[$i] = modJms_JmsSupportHelper::parseSupport($support[$i],$display);
	}
}
$moduleclass_sfx = $params->get('moduleclass_sfx', '');

$path = JModuleHelper::getLayoutPath('mod_jms_support', 'default');

if (file_exists($path)) {
	require($path);
}