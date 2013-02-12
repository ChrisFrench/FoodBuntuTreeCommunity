
<?php
/**
 * @version	1.5
 * @package	Treetracker
 * @author 	Dioscouri Design
 * @link 	http://www.dioscouri.com
 * @copyright Copyright (C) 2007 Dioscouri Design. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
*/

/** ensure this file is being included by a parent file */
defined('_JEXEC') or die('Restricted access');

class TreetrackerViewBase extends DSCViewSite
{
    public function __construct($config = array())
    {
        parent::__construct($config);
    
        $this->defines = Treetracker::getInstance();
    }
    
    public function display($tpl=null)
    {
        if ($this->defines->get('include_site_css')) 
        {
            JHTML::_('stylesheet', 'site.css', 'media/com_treetracker/css/');
        }
        JHTML::_('script', 'common.js', 'media/com_treetracker/js/');
    
        parent::display($tpl);
    }
}