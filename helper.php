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

abstract class modXpertContactHelper{

    public static function getAjax()
    {

        // Get module parameters
        jimport('joomla.application.module.helper');
        $input  = JFactory::getApplication()->input;
        $module = JModuleHelper::getModule('xpertcontact');
        $params = new JRegistry();
        $params->loadString($module->params);

        // Get the data
        $data   = $input->get('jform', array(), 'array');
        $form = JForm::getInstance('customForm',dirname(__FILE__).'/form/form.xml',array('control' => 'jform'));
        $loadcaptcha = $params->get('captcha_enabled',0);
        if($loadcaptcha)
        {
            $form->loadFile(dirname(__FILE__).'/form/form_captcha.xml', false);
        }
        $result = $form->validate($data);

        // Check for validation errors.
        if ($result === false)
        {
        $return = '';
        // Get the validation messages from the form.
        foreach ($form->getErrors() as $message)
        {
            $return .= $message->getMessage();
        }
        return '<p class="xcon-failed"><i class="icon-remove-circle"></i> ' . $return . '</p>';
        }

        // Get the input value from data array
        $name = $data['name'];
        $email = JStringPunycode::emailToPunycode($data['email']);
        $subject = $data['subject'];
        $body = $data['body'];

        // Cache module params
        $recipient = $params->get('email_to');
        $success_msg = $params->get('success_msg');
        $failed_msg = $params->get('failed_msg');

        // Now send email
        $mail = JFactory::getMailer();
        $mail->addRecipient($recipient);
        $mail->addReplyTo($email, $name);
        $mail->setSender(array($email, $name));
        $mail->setSubject($subject);
        $mail->setBody($body);
        $send = $mail->Send();

        if ( $send !== true ) 
        {
               $enable_debug = $params->get('enable_debug', 0);
               //TODO:: SHow error
               return '<p class="xcon-failed"><i class="icon-remove-circle"></i> ' . $failed_msg . '</p>';
        }
        else
        {
                return '<p class="xcon-success"><i class="icon-ok-circle"></i> ' . $success_msg . '</p>';
        }
    }
}
