<?php
/**
 * @version		$Id$
 * @copyright	Copyright (C) 2005 - 2009 Open Source Matters, Inc. All rights reserved.
 * @copyright	Copyright (C) 2008 - 2009 JXtended, LLC. All rights reserved.
 * @license		GNU General Public License <http://www.gnu.org/copyleft/gpl.html>
 */

defined('_JEXEC') or die;

jimport('joomla.application.component.view');

/**
 * @package		Joomla.Administrator
 * @subpackage	com_users
 */
class UsersViewUser extends JView
{
	public $state;
	public $item;
	public $form;
	public $groups;
	public $grouplist;
	public $group_id;

	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{
		$state		= $this->get('State');
		$item		= $this->get('Item');
		$form		= $this->get('Form');
		$groupList	= $this->get('Groups');
		$groups		= $this->get('AssignedGroups');

		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

		$form->bind($item);
		$form->setValue('password', null);
		$form->setValue('password2', null);

		$this->assignRef('state',		$state);
		$this->assignRef('item',		$item);
		$this->assignRef('form',		$form);
		$this->assignRef('grouplist',	$groupList);
		$this->assignRef('groups',		$groups);

		parent::display($tpl);
		$this->_setToolbar();
		JRequest::setVar('hidemainmenu', 1);
	}

	/**
	 * Build the default toolbar.
	 *
	 * @return	void
	 * @since	1.6
	 */
	protected function _setToolbar()
	{
		$isNew	= ($this->item->id == 0);
		JToolBarHelper::title(JText::_($isNew ? 'Users_Title_Add_User' : 'Users_Title_Edit_User'), 'user');

		JToolBarHelper::save('user.save');
		JToolBarHelper::apply('user.apply');
		JToolBarHelper::cancel('user.cancel');
		//JToolBarHelper::help('index', true);
	}
}
