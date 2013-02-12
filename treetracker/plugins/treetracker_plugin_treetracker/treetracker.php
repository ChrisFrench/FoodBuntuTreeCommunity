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
defined('_JEXEC') or die('Restricted access');

/** Import library dependencies */
jimport('joomla.plugin.plugin');

class plgTreetrackerTreetracker extends JPlugin 
{   
    var $params = null;

    function __construct(& $subject, $config)
    { 
        parent::__construct($subject, $config);
        $this->_isInstalled();
 
    }
    
    /**
     * Check if is installed
     * 
     * @return unknown_type
     */
    function _isInstalled()
    {
        $success = false;

        jimport( 'joomla.filesystem.file' );
        $filePath = JPATH_ADMINISTRATOR."/components/com_treetracker/defines.php";
        if (JFile::exists($filePath))
        {
            $success = true;
            if ( !class_exists('Treetracker') )
            { 
                JLoader::register('Treetracker', JPATH_ADMINISTRATOR.'/components/com_treetracker/defines.php');
                $this->params = Treetracker::getInstance();
            }
        }           
        return $success;
    }
        
    function onInstanceSiteComponentTreetracker() {
        $app = JFactory::getApplication();
        $doc = JFactory::getDocument();    
       
           // Add related CSS to the <head>
        if ($doc->getType() == 'html')
        {

            jimport('joomla.filesystem.file');
            if( $this->params->get('enable_css', '1')) {
                if (JFile::exists(JPATH_SITE.'/templates/'.$app->getTemplate().'/css'.'/treetracker.css')) {
                    $doc->addStyleSheet(JURI::root(true).'/templates/'.$app->getTemplate().'/css/treetracker.css');
                } else {
                   $doc->addStyleSheet(JURI::root(true).'media/com_treetracker/css/treetracker.css'); 
                }
            }

            if( $this->params->get('enable_js', '1')) {
                if (JFile::exists(JPATH_SITE.'/templates/'.$app->getTemplate().'/js/treetracker.js')) {
                    $doc->addScript(JURI::root(true).'/templates/'.$app->getTemplate().'/js/treetracker.js');
                } else {
                    $doc->addScript(JURI::root(true).'media/com_treetracker/js/treetracker.js'); 
                }
            }    
        }

    }
}
