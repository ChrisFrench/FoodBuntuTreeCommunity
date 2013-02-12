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

if ( !class_exists('Treetracker') ) {
    JLoader::register( "Treetracker", JPATH_ADMINISTRATOR . "/components/com_treetracker/defines.php" );
}

Treetracker::load( "TreetrackerHelperRoute", 'helpers.route' );

/**
 * Build the route
 * Is just a wrapper for TreetrackerHelperRoute::build()
 * 
 * @param unknown_type $query
 * @return unknown_type
 */
function TreetrackerBuildRoute(&$query)
{
    return TreetrackerHelperRoute::build($query);
}

/**
 * Parse the url segments
 * Is just a wrapper for TreetrackerHelperRoute::parse()
 * 
 * @param unknown_type $segments
 * @return unknown_type
 */
function TreetrackerParseRoute($segments)
{
    return TreetrackerHelperRoute::parse($segments);
}