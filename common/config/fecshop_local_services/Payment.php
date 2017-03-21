<?php
/**
 * FecShop file.
 * @link http://www.fecshop.com/
 * @copyright Copyright (c) 2016 FecShop Software LLC
 * @license http://www.fecshop.com/license/
 */
return [
	'payment' => [
		
		'noRelasePaymentMethod' => 'check_money',  	# ����Ҫ�ͷſ���֧����ʽ��Ʃ����������ϵͳ��
													# pending���������һ��ʱ��δ������ͷŲ�Ʒ��棬���ǻ����������͵Ķ��������ͷţ�
													# �����Ҫ�ͷŲ�Ʒ��棬�ͷ��ں�̨ȡ�����������ͷŲ�Ʒ��档
		'paymentConfig' => [		# ֧����ʽ����
			'standard' => [			# ��׼֧�����ͣ��ڹ��ﳵҳ������µ�ҳ�棬��д֧����Ϣ��Ȼ����ת��������֧����վ��֧�����͡�
				'check_money' => [	# �����������͡�
					'label' 				=> 'Check / Money Order',
					//'image' => ['images/mastercard.png','common'] ,# ֧��ҳ����ʾ��ͼƬ��
					'supplement' 			=> 'Off-line Money Payments', # ������Ϣ
					'style'					=> '<style></style>',  # ����css����������������дһЩcss
					'start_url' 			=> '@homeUrl/payment/checkmoney/start',	# �����ť����ת��url�������url����д֧����תǰ���ύ��Ϣ��
					'success_redirect_url' 	=> '@homeUrl/payment/success',			# ��֧��ƽ̨֧���ɹ��󣬷��ص�ҳ��
				],
				'paypal_standard' => [	# paypal��׼֧������
					'label' 				=> 'PayPal Website Payments Standard',
					'image' 				=> ['images/paypal_standard.png','common'], # ֧��ҳ����ʾ��ͼƬ��
					'supplement' 			=> 'You will be redirected to the PayPal website when you place an order. ', # ����,j������ʾ��ǰ��ҳ��֧���б�ײ���
					# ѡ��֧���󣬽��뵽��Ӧ֧��ҳ���startҳ�档
					'start_url' 			=> '@homeUrl/payment/paypal/standard/start',
					# ����IPN��Ϣ��ҳ�档
					'IPN_url' 				=> '@homeUrl/payment/paypal/standard/ipn',
					# �ڵ�����֧���ɹ�����ת����վ��ҳ��
					'success_redirect_url' 	=> '@homeUrl/payment/success',
					# ����paypal֧��ҳ�棬���ȡ��������վ��ҳ�档
					'cancel_url'			=> '@homeUrl/payment/paypal/standard/cancel',
					
					# ������֧����վ��url
					'payment_url'=>'https://www.sandbox.paypal.com/cgi-bin/webscr',
					# IPN URL���Ժ������ payment_url ��ֵ����˲���Ҫ������һ��url�����ˡ�
					//'ipn_url'	 => 'https://ipnpb.sandbox.paypal.com/cgi-bin/webscr'
					//# �û���
					//'user' => 'zqy234api1-facilitator@126.com',
					# �˺�
					'account'=> 'zqy234api1-facilitator@126.com',
					# ����
					'password'=>'HF4TNTTXUD6YQREH',
					# ǩ��
					'signature'=>'An5ns1Kso7MWUdW4ErQKJJJ4qi4-ANB-xrkMmTHpTszFaUx2v4EHqknV',
					
				],
			],
			
			'express' => [	# �ڹ��ﳵҳ��ֱ����ת��֧��ƽ̨��Ʃ��paypal���֧����ʽ��
				'paypal_express' =>[
					'nvp_url' => 'https://api-3t.sandbox.paypal.com/nvp',
					'api_url' => 'https://www.sandbox.paypal.com/cgi-bin/webscr',
					'account'=> 'zqy234api1-facilitator_api1.126.com',
					'password'=>'HF4TNTTXUD6YQREH',
					'signature'=>'An5ns1Kso7MWUdW4ErQKJJJ4qi4-ANB-xrkMmTHpTszFaUx2v4EHqknV',
					
					'enable'=> 1,
					'label'=>'PayPal Express Payments',
				],
			],
			
		],
		
	]
];
