<?php
/**
 * @package Xpert Contact
 * @version ##VERSION##
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

    <div id="xcon-msg"></div>

    <form id="xcon-form">
        <div>
            <label><?php echo JText::_('NAME'); ?></label>
            <input type="text" name="name" placeholder="<?php echo JText::_('NAME_PLACEHOLDER'); ?>" required />
        </div>

        <div>
            <label><?php echo JText::_('EMAIL'); ?></label>
            <input type="email" name="email" placeholder="<?php echo JText::_('EMAIL_PLACEHOLDER'); ?>" required />
        </div>

        <div>
            <label><?php echo JText::_('SUBJECT'); ?></label>
            <input type="text" name="subject" placeholder="<?php echo JText::_('SUBJECT_PLACEHOLDER'); ?>" required />
        </div>

        <div>
            <label><?php echo JText::_('MESSAGE'); ?></label>
            <textarea name="body" rows="10" placeholder="<?php echo JText::_('MESSAGE_PLACEHOLDER'); ?>" required></textarea>
        </div>

        <div>
            <button id="xcon-submit" type="submit" class="btn btn-primary"><?php echo JText::_('SEND');?></button>
        </div>

        <?php echo JHtml::_('form.token'); ?>

    </form>

</div>
