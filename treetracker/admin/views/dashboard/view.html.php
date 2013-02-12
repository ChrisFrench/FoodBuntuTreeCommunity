<?php
/**
 * @package    Treetracker
 * @author     Dioscouri Design
 * @link     http://www.dioscouri.com
 * @copyright Copyright (C) 2007 Dioscouri Design. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
*/

/** ensure this file is being included by a parent file */
defined('_JEXEC') or die('Restricted access');

Treetracker::load('TreetrackerViewBase','views.base');

class TreetrackerViewDashboard extends TreetrackerViewBase
{
    /**
     * The default toolbar for a list
     * @return unknown_type
     */
    function _defaultToolbar()
    {
    }
}