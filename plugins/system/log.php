<?php
/**
 * @version		$Id: log.php 10709 2008-08-21 09:58:52Z eddieajau $
 * @package		Joomla
 * @copyright	Copyright (C) 2005 - 2009 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License <http://www.gnu.org/copyleft/gpl.html>
 */

// no direct access
defined('_JEXEC') or die;

jimport('joomla.plugin.plugin');

/**
 * Joomla! System Logging Plugin
 *
 * @package		Joomla
 * @subpackage	System
 */
class  plgSystemLog extends JPlugin
{
	function onLoginFailure($response)
	{
		jimport('joomla.error.log');

		$log = JLog::getInstance();
		$errorlog = array();

		switch($response['status'])
	    {
			case JAUTHENTICATE_STATUS_CANCEL :
			{
				$errorlog['status']  = $response['type'] . " CANCELED: ";
				$errorlog['comment'] = $response['error_message'];
				$log->addEntry($errorlog);
			} break;

			case JAUTHENTICATE_STATUS_FAILURE :
			{
				$errorlog['status']  = $response['type'] . " FAILURE: ";
				$errorlog['comment'] = $response['error_message'];
				$log->addEntry($errorlog);
			}	break;

			default :
			{
				$errorlog['status']  = $response['type'] . " UNKNOWN ERROR: ";
				$errorlog['comment'] = $response['error_message'];
				$log->addEntry($errorlog);
			}	break;
		}
	}
}