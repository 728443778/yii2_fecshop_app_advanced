<?php
/**
 * FecShop file.
 * @link http://www.fecshop.com/
 * @copyright Copyright (c) 2016 FecShop Software LLC
 * @license http://www.fecshop.com/license/
 */
return [
	'search' => [
		'filterAttr' => [
			'color','size', # ������ҳ��������������������ֶ�
		],
		'childService' => [
			'mongoSearch' => [
				'searchIndexConfig'  => [
					'name' => 10,  
					'description' => 5,  
				], 
				# more: https://docs.mongodb.com/manual/reference/text-search-languages/#text-search-languages
				'searchLang'  => [
					'en' => 'english',
					'fr' => 'french',
					'de' => 'german',
					'es' => 'spanish',
					'ru' => 'russian',
					'pt' => 'portuguese',
				],
			],
			'xunSearch'  => [
				'fuzzy' => true,  # �Ƿ���ģ����ѯ
				'synonyms' => true, #�Ƿ���ͬ��ʷ���
				'searchLang'    => ['zh'],
			],
		],
	]
];