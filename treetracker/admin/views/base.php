<?php
/**
 * @version	1.5
 * @package	Treetracker
 * @author 	Dioscouri Design
 * @link 	http://www.dioscouri.com
 * @copyright Copyright (C) 2007 Dioscouri Design. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
*/

defined('_JEXEC') or die('Restricted access');

class TreetrackerViewBase extends DSCViewAdmin
{
    public function __construct($config = array())
    {
        parent::__construct($config);
    
        $this->defines = Treetracker::getInstance();
    }
    
	public function display($tpl=null)
	{
		JHTML::_('stylesheet', 'admin.css', 'media/com_treetracker/css/');
		
		parent::display($tpl);
	}
}