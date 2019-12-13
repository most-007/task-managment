<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 2.0.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

/**
 * This is email configuration file.
 *
 * Use it to configure email transports of CakePHP.
 *
 * Email configuration class.
 * You can specify multiple configurations for production, development and testing.
 *
 * transport => The name of a supported transport; valid options are as follows:
 *  Mail - Send using PHP mail function
 *  Smtp - Send using SMTP
 *  Debug - Do not send the email, just return the result
 *
 * You can add custom transports (or override existing transports) by adding the
 * appropriate file to app/Network/Email. Transports should be named 'YourTransport.php',
 * where 'Your' is the name of the transport.
 *
 * from =>
 * The origin email. See CakeEmail::from() about the valid values
 */
class EmailConfig
{

	// public $default = array(
	// 	'transport' => 'Mail',
	// 	'from' => 'you@localhost',
	// 	//'charset' => 'utf-8',
	// 	//'headerCharset' => 'utf-8',
	// );
	public $default = array(
		'transport' => 'mail',
		// 'from' => array('max.0016@hotmail.com' => 'max.0016@hotmail.com'),
		'host' => 'mail.youbuy4u.com', // for using gmail smtp
		'port' => 587,
		'timeout' => 30,
		'username' => 'test@youbuy4u.com',
		'password' => '123456',
		// 'tls' => true,
		// 'SMTPSecure' => 'STARTTLS',
		'client' => null,
		'charset' => 'utf-8',
		'headerCharset' => 'utf-8',
		// 'auth' => true,
		// 'context' => array('ssl' => array(
		// 	"allow_self_signed" => true,
		// 	"verify_peer" => false,
		// 	"verify_peer_name" => false,
		// ))
		// 'ssl' => true,
	);

	public $gmail = array(
		'host' => 'smtp.gmail.com',
		'port' => 587,
		'username' => 'max.badran33@gmail.com',
		'password' => 'must-9-3',
		'transport' => 'Mail',
		// 'tls'=>true,
		'timeout' => 30,
		'log' => true,
		'auth' => true,
		'charset' => 'utf-8',
		'headerCharset' => 'utf-8',

		// 'context' => array('ssl' => array(
		// 	"allow_self_signed" => true,
		// 	"verify_peer" => false,
		// 	"verify_peer_name" => false,
		// ))
	);
	public $smtp = array(
		'transport' => 'Smtp',
		'from' => array('max.badran33@gmail.com' => 'My Site'),
		'host' => 'ssl://smtp.gmail.com',	
		'port' => 465,
		'timeout' => 30,
		'username' => 'max.badran33@gmail.com',
		'password' => 'must-9-3',
		'client' => null,
		'log' => false,
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);


	public $fast = array(
		'from' => 'you@localhost',
		'sender' => null,
		'to' => null,
		'cc' => null,
		'bcc' => null,
		'replyTo' => null,
		'readReceipt' => null,
		'returnPath' => null,
		'messageId' => true,
		'subject' => null,
		'message' => null,
		'headers' => null,
		'viewRender' => null,
		'template' => false,
		'layout' => false,
		'viewVars' => null,
		'attachments' => null,
		'emailFormat' => null,
		'transport' => 'Smtp',
		'host' => 'localhost',
		'port' => 25,
		'timeout' => 30,
		'username' => 'user',
		'password' => 'secret',
		'client' => null,
		'log' => true,
		//'charset' => 'utf-8',
		//'headerCharset' => 'utf-8',
	);
}
