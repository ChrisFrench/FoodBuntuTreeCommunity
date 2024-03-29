<?php defined('_JEXEC') or die('Restricted access'); ?>
<?php JHTML::_('script', 'common.js', 'media/com_treetracker/js/'); ?>
<?php $state = @$this->state; ?>
<?php $form = @$this->form; ?>
<?php $items = @$this->items; ?>

<form action="<?php echo JRoute::_( @$form['action'] )?>" method="post" name="adminForm" enctype="multipart/form-data">

    <?php echo DSCGrid::pagetooltip( JRequest::getVar('view') ); ?>
    
    <table>
        <tr>
            <td align="left" width="100%">
            </td>
            <td nowrap="nowrap">
                <input name="filter" value="<?php echo @$state->filter; ?>" />
                <button onclick="this.form.submit();"><?php echo JText::_('COM_TREETRACKER_SEARCH'); ?></button>
                <button onclick="Dsc.resetFormFilters(this.form);"><?php echo JText::_('COM_TREETRACKER_RESET'); ?></button>
            </td>
        </tr>
    </table>

    <table class="adminlist" style="clear: both;">
        <thead>
            <tr>
                <th style="width: 5px;">
                    <?php echo JText::_("COM_TREETRACKER_NUM"); ?>
                </th>
                <th style="width: 50px;">
                    <?php echo DSCGrid::sort( 'COM_TREETRACKER_ID', "tbl.id", @$state->direction, @$state->order ); ?>
                </th>                
                <th style="text-align: left;">
                    <?php echo DSCGrid::sort( 'COM_TREETRACKER_NAME', "tbl.name", @$state->direction, @$state->order ); ?>
                </th>
                <th>
                </th>
            </tr>
            <tr class="filterline">
                <th colspan="2">
                    <?php $attribs = array('class' => 'inputbox', 'size' => '1', 'onchange' => 'document.adminForm.submit();'); ?>
                    <div class="range">
                        <div class="rangeline">
                            <span class="label"><?php echo JText::_("COM_TREETRACKER_FROM"); ?>:</span> <input id="filter_id_from" name="filter_id_from" value="<?php echo @$state->filter_id_from; ?>" size="5" class="input" />
                        </div>
                        <div class="rangeline">
                            <span class="label"><?php echo JText::_("COM_TREETRACKER_TO"); ?>:</span> <input id="filter_id_to" name="filter_id_to" value="<?php echo @$state->filter_id_to; ?>" size="5" class="input" />
                        </div>
                    </div>
                </th>
                <th style="text-align: left;">
                    <input id="filter_name" name="filter_name" value="<?php echo @$state->filter_name; ?>" size="25"/>
                </th>
                <th>
                </th>
            </tr>
            <tr>
                <th colspan="20" style="font-weight: normal;">
                    <div style="float: right; padding: 5px;"><?php echo @$this->pagination->getResultsCounter(); ?></div>
                    <div style="float: left;"><?php echo @$this->pagination->getListFooter(); ?></div>
                </th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td colspan="20">
                    <div style="float: right; padding: 5px;"><?php echo @$this->pagination->getResultsCounter(); ?></div>
                    <?php echo @$this->pagination->getPagesLinks(); ?>
                </td>
            </tr>
        </tfoot>
        <tbody>
        <?php $i=0; $k=0; ?>
        <?php foreach (@$items as $item) : ?>
            <tr class='row<?php echo $k; ?>'>
                <td align="center">
                    <?php echo $i + 1; ?>
                </td>
                <td style="text-align: center;">
                    <a href="<?php echo $item->link; ?>">
                        <?php echo $item->id; ?>
                    </a>
                </td>   
                <td style="text-align: left;">
                    <a href="<?php echo $item->link; ?>">
                        <?php echo $item->name; ?>
                    </a>
                </td>   
                <td style="text-align: center;">
                    [
                    <a href="<?php echo $item->link; ?>">
                        <?php echo JText::_( "COM_TREETRACKER_LOAD_TOOL" ); ?>
                    </a>
                    ]
                </td>
            </tr>
            <?php $i=$i+1; $k = (1 - $k); ?>
            <?php endforeach; ?>
            
            <?php if (!count(@$items)) : ?>
            <tr>
                <td colspan="10" align="center">
                    <?php echo JText::_('COM_TREETRACKER_NO_ITEMS_FOUND'); ?>
                </td>
            </tr>
            <?php endif; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="20">
                    <?php echo @$this->pagination->getListFooter(); ?>
                </td>
            </tr>
        </tfoot>
    </table>

    <input type="hidden" name="order_change" value="0" />
    <input type="hidden" name="id" value="" />
    <input type="hidden" name="task" id="task" value="" />
    <input type="hidden" name="boxchecked" value="" />
    <input type="hidden" name="filter_order" value="<?php echo @$state->order; ?>" />
    <input type="hidden" name="filter_direction" value="<?php echo @$state->direction; ?>" />
    
    <?php echo $this->form['validate']; ?>
</form>