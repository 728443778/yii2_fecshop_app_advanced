<?php
/**
 * FecShop file.
 * @link http://www.fecshop.com/
 * @copyright Copyright (c) 2016 FecShop Software LLC
 * @license http://www.fecshop.com/license/
 */
return [
	'email' => [
		'mailerConfig' => [
			# Ĭ��ͨ������
			'default' => [
				'class' => 'yii\swiftmailer\Mailer',
				'transport' => [
					'class' => 'Swift_SmtpTransport',
					'host' => 'smtp.qq.com',			#SMTP Host
					'username' => '372716335@qq.com',   #SMTP �˺�
					'password' => 'wffmbummgnhhcbbj',	#SMTP ����
					'port' => '587',					#SMTP �˿�
					'encryption' => 'tls',
				],
				'messageConfig'=>[  
				   'charset'=>'UTF-8',  
				], 
			],
        ],
	],
];