<?php
/**
 * @version	1.5
 * @package	Treetracker
 * @author 	Dioscouri Design
 * @link 	http://www.dioscouri.com
 * @copyright Copyright (C) 2007 Dioscouri Design. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
*/
defined('_JEXEC') or die('Restricted access'); ?>

	<?php
	    $defines = Treetracker::getInstance();

		$img_file = "dioscouri_logo_transparent.png";
		$img_path = "../media/com_treetracker/images";

		$url = "http://www.dioscouri.com/";
		if ($amigosid = $defines->get( 'amigosid', '' ))
		{
			$url .= "?amigosid=".$amigosid;
		}
	?>

	<table style="margin-bottom: 5px; width: 100%; border-top: thin solid #e5e5e5;">
	<tbody>
	<tr>
		<td style="text-align: left; width: 33%;">
			<a href="<?php echo $url; ?>" target="_blank"><?php echo JText::_( 'COM_TREETRACKER_DIOSCOURI_SUPPORT_CENTER' ); ?></a>
			<br/>
			<a href="http://twitter.com/dioscouri" target="_blank"><?php echo JText::_( "COM_TREETRACKER_FOLLOW_US_ON_TWITTER" ); ?></a>
			<br/>
			<a href="http://extensions.joomla.org/extensions/owner/dioscouri" target="_blank"><?php echo JText::_( "COM_TREETRACKER_LEAVE_JED_FEEDBACK" ); ?></a>
		</td>
		<td style="text-align: center; width: 33%;">
			<?php echo JText::_( "Treetracker" ); ?>: <?php echo JText::_( "COM_TREETRACKER_DESC" ); ?>
			<br/>
			<?php echo JText::_( "COM_TREETRACKER_COPYRIGHT" ); ?>: <?php echo $defines->getCopyrightYear(); ?> &copy; <a href="<?php echo $url; ?>" target="_blank">Dioscouri Design</a>
			<br/>
			<?php echo JText::_( "COM_TREETRACKER_VERSION" ); ?>: <?php echo $defines->getVersion(); ?>
		</td>
		<td style="text-align: right; width: 33%;">
			<a href="<?php echo $url; ?>" target="_blank"><img src="<?php echo $img_path."/".$img_file;?>"></img></a>
		</td>
	</tr>
	</tbody>
	</table>
