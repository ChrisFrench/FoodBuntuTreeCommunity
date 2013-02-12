<?php
/**
 * @version 1.5
 * @package Treetracker
 * @author  Dioscouri Design
 * @link    http://www.dioscouri.com
 * @copyright Copyright (C) 2007 Dioscouri Design. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
 */

/** ensure this file is being included by a parent file */
defined( '_JEXEC' ) or die( 'Restricted access' );

class TreetrackerControllerTrees extends TreetrackerController
{
	/**
	 * constructor
	 */
	function __construct()
	{
		parent::__construct();

		$this->set('suffix', 'trees');
	}

	/**
	 * Sets the model's state
	 *
	 * @return array()
	 */
	function _setModelState( $model_name='' )
	{
		$state = parent::_setModelState();
		$app = JFactory::getApplication();
		if (empty($model_name)) { $model_name = $this->get('suffix'); } 
		$model = $this->getModel( $model_name );
		$ns = $this->getNamespace();

		$state['filter_enabled']  = 1;      
        
		foreach (@$state as $key=>$value)
		{
			$model->setState( $key, $value );
		}

		return $state;
	}
	
	


}

?>