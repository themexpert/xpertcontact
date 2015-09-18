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

// Include the syndicate functions only once
require_once (dirname(__FILE__). '/helper.php');

// Load style and script
JFactory::getDocument()->addScript(JURI::base(true) . '/modules/mod_xpertcontact/assets/script.js');
JFactory::getDocument()->addStylesheet(JURI::base(true) . '/modules/mod_xpertcontact/assets/style.css');

$form = JForm::getInstance('customForm',dirname(__FILE__).'/form/form.xml',array('control' => 'jform'));
$loadcaptcha = $params->get('captcha_enabled',0);
if($loadcaptcha){
  $form->loadFile(dirname(__FILE__).'/form/form_captcha.xml', false);
}
$fieldSets = $form->getFieldsets();

// Include layout
require JModuleHelper::getLayoutPath( $module->module, $params->get('layout', 'default') );
