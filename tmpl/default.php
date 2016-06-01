<?php
/**
 * @package Xpert Contact
 * @version 1.1.1
 * @author ThemeXpert http://www.themexpert.com
 * @copyright Copyright (C) 2009 - 2011 ThemeXpert
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 *
 */

// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

// Load jQuery
JHtml::_('jquery.framework');
?>
<div id="xcon-<?php echo $module->id; ?>" class="xpert-contact">
    <form id="xcon-form">
        <?php
            foreach ($fieldSets as $name => $fieldSet) :
                foreach ($form->getFieldset($name) as $field):
        ?>
                    <div>
                        <?php echo $field->label; ?>
                        <?php echo $field->input; ?>
                    </div>
        <?php
                endforeach;
            endforeach;
        ?>
        
        <div id="xcon-msg"></div>
        <div>
                <button id="xcon-submit" type="submit" class="btn btn-primary">
                        <?php echo JText::_('SEND');?>
                </button>
        </div>
        <input type="hidden" name="option" value="com_ajax" />
        <input type="hidden" name="module" value="xpertcontact" />
        <input type="hidden" name="format" value="raw" />
        <?php echo JHtml::_('form.token'); ?>
    </form>
</div>
