<?php
/**
 * @package Treetracker
 * @author  Dioscouri Design
 * @link    http://www.dioscouri.com
 * @copyright Copyright (C) 2007 Dioscouri Design. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
*/

/** ensure this file is being included by a parent file */
defined('_JEXEC') or die('Restricted access');

// Check the registry to see if our Treetracker class has been overridden
if ( !class_exists('Treetracker') ) 
    JLoader::register( "Treetracker", JPATH_ADMINISTRATOR . "/components/com_treetracker/defines.php" );

// before executing any tasks, check the integrity of the installation
Treetracker::getClass( 'TreetrackerHelperDiagnostics', 'helpers.diagnostics' )->checkInstallation();

// Require the base controller
Treetracker::load( 'TreetrackerController', 'controller' );

// Require specific controller if requested
$controller = JRequest::getWord('controller', JRequest::getVar( 'view' ) );
if (!Treetracker::load( 'TreetrackerController'.$controller, "controllers.$controller" ))
    $controller = '';

if (empty($controller))
{
    // redirect to default
	$default_controller = new TreetrackerController();
	$redirect = "index.php?option=com_treetracker&view=" . $default_controller->default_view;
    $redirect = JRoute::_( $redirect, false );
    JFactory::getApplication()->redirect( $redirect );
}

DSC::loadBootstrap();

JHTML::_('stylesheet', 'common.css', 'media/dioscouri/css/');
JHTML::_('stylesheet', 'admin.css', 'media/com_treetracker/css/');

$doc = JFactory::getDocument();
$uri = JURI::getInstance();
$js = "var com_treetracker = {};\n";
$js.= "com_treetracker.jbase = '".$uri->root()."';\n";
$doc->addScriptDeclaration($js);

$parentPath = JPATH_ADMINISTRATOR . '/components/com_treetracker/helpers';
DSCLoader::discover('TreetrackerHelper', $parentPath, true);

$parentPath = JPATH_ADMINISTRATOR . '/components/com_treetracker/library';
DSCLoader::discover('Treetracker', $parentPath, true);

// load the plugins
JPluginHelper::importPlugin( 'treetracker' );

// Create the controller
$classname = 'TreetrackerController'.$controller;
$controller = Treetracker::getClass( $classname );
    
// ensure a valid task exists
$task = JRequest::getVar('task');
if (empty($task))
{
    $task = 'display';
    JRequest::setVar( 'layout', 'default' );
}
JRequest::setVar( 'task', $task );

// Perform the requested task
$controller->execute( $task );

// Redirect if set by the controller
$controller->redirect();
?>