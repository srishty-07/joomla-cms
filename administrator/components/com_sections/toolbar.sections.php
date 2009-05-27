<?php
/**
 * @version		$Id: toolbar.sections.php 10381 2008-06-01 03:35:53Z pasamio $
 * @package		Joomla.Administrator
 * @subpackage	Sections
 * @copyright	Copyright (C) 2005 - 2009 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License <http://www.gnu.org/copyleft/gpl.html>
 */

// no direct access
defined('_JEXEC') or die;

require_once(JApplicationHelper::getPath('toolbar_html'));

switch ($task)
{
	case 'add'  :
		TOOLBAR_sections::_EDIT(false);
		break;
	case 'edit' :
	case 'editA':
		TOOLBAR_sections::_EDIT(true);
		break;

	case 'copyselect':
	case 'copysave':
		TOOLBAR_sections::_COPY();
		break;

	default:
		TOOLBAR_sections::_DEFAULT();
		break;
}