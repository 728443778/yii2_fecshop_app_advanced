<?php
/**
 * FecShop file.
 * @link http://www.fecshop.com/
 * @copyright Copyright (c) 2016 FecShop Software LLC
 * @license http://www.fecshop.com/license/
 */
return [
	'shipping' => [
		# Shipping���˷ѣ��Ǳ�����ʽ¼�룬shippingCsvDir�Ǵ���˷ѱ����ļ�·����
		'shippingCsvDir' => '@common/config/shipping', 
		'shippingConfig'=>[
			'free_shipping'=>[  # ���˷�
				'label'=>'Free shipping( 7-20 work days)',
				'name' => 'HKBRAM',
				'cost' => 0,
			],
			'fast_shipping'=>[
				'label'=>'Fast Shipping( 5-10 work days)',
				'name' => 'HKDHL',
				'cost' => 'csv' # �뽫�ļ����ֵ�����д�� fast_shipping.csv
				
			],
		],
		# ��ֵ��������������� $shippingConfig�д��ڣ���������ڣ��򷵻�Ϊ�ա�
		'defaultShippingMethod' => [
			'enable'	=> true, # ���ֵΪtrue����ô�û���cart���ɵ�ʱ�򣬾ͻ���д��Ĭ�ϵĻ��˷�ʽ��
			'shipping' => 'fast_shipping',
		],
	]
];