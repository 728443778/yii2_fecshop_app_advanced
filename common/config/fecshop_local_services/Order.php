<?php
/**
 * FecShop file.
 * @link http://www.fecshop.com/
 * @copyright Copyright (c) 2016 FecShop Software LLC
 * @license http://www.fecshop.com/license/
 */
return [
	'order' => [
		'increment_id' => '1100000000', # �����ĸ�ʽ��
		'requiredAddressAttr' => [ # ����Ķ����ֶΡ�
			'first_name',
			'last_name',
			'email',
			'telephone',
			'street1',
			'country',
			'city',
			'state',
			'zip'
		],
		#������ٷ��Ӻ�֧��״̬Ϊpending�Ķ������黹��档
		'minuteBeforeThatReturnPendingStock' 	=>  60,
		# �ű�һ���Դ�����ٸ�pending������
		'orderCountThatReturnPendingStock' 		=>  30,
		# ����״̬����
		'payment_status_pending' 				=> 'pending',		# δ����
		'payment_status_processing' 			=> 'processing',	# �Ѹ���
		'payment_status_canceled' 				=> 'canceled',		# ��ȡ��
		'payment_status_complete' 				=> 'complete',		# �����
		'payment_status_holded' 				=> 'holded',		# hold
		'payment_status_suspected_fraud' 		=> 'suspected_fraud',#��թ
		
	],
];
