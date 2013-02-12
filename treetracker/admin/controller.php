<?php
/**
 * @version	0.1
 * @package	Treetracker
 * @author 	Dioscouri Design
 * @link 	http://www.dioscouri.com
 * @copyright Copyright (C) 2007 Dioscouri Design. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 */

/** ensure this file is being included by a parent file */
defined('_JEXEC') or die('Restricted access');

class TreetrackerController extends DSCControllerAdmin
{
    public $default_view = 'dashboard';
    public $message = "";
    public $messagetype = "";
    public $defines = null;
    
    function __construct( $config=array() )
    {
        parent::__construct( $config );
    
        $this->defines = Treetracker::getInstance();
        $this->user = JFactory::getUser();
    }
}

?>