<?php
/**
 * FecShop file.
 *
 * @link http://www.fecshop.com/
 * @copyright Copyright (c) 2016 FecShop Software LLC
 * @license http://www.fecshop.com/license/
 */
return [
	'catalog' => [
		'params'=> [
			###############################
			## 		category��������	 ##
			###############################
			'category_breadcrumbs' => false, # �Ƿ���ʾ��������м������
			/**
			 * ע�⣺�����������Ʒ���˵����ԣ�������select���͵ģ������������벻Ҫ�ã�
			 * ����select���ͣ�Ŀǰ��֧�ֶ��������ݿ�洢��select���͵ĸ���ֵ��ͨ��ǰ�˷����ļ���ʵ�ַ���ġ�
			 * ����color  size ��Ӧ�ı���ֵ��ֻ����ʹ�� '����','�ַ�','�ո�','&','-','_' ��6���ַ�
			 */
			'category_filter_attr' =>[
				'color','size',
			], 
			
			'category_filter_category' 	=> true,
			'category_filter_price' 	=> true,
			'category_query' =>[
				# �ŵ���һ���ľ���Ĭ��ֵ��Ʃ�������30
				'numPerPage' => [30,60,90],		# ��Ʒ��ʾ�������о�
				# �ŵ���һ���ľ���Ĭ��ֵ��Ʃ�������hot
				'sort' => [						# ��������ʽ
					# �����Ʃ��hot  new  low-to-high ֻ���� ��ĸ�����飬-��_ ��4���ַ��� 
					'hot' => [
						'label'   	=> 'Hot',   # ��ʾ���ַ�
						'db_columns'=> 'score', # ��Ӧ���ݿ���ֶ�
						'direction'	=> 'desc',  # ����ʽ
					],
					'review_count' => [
						'label'   	=> 'Review',   # ��ʾ���ַ�
						'db_columns'=> 'review_count', # ��Ӧ���ݿ���ֶ�
						'direction'	=> 'desc',  # ����ʽ
					],
					'favorite_count' => [
						'label'   	=> 'Favorite',   # ��ʾ���ַ�
						'db_columns'=> 'favorite_count', # ��Ӧ���ݿ���ֶ�
						'direction'	=> 'desc',  # ����ʽ
					],
					'new' => [
						'label'   	=> 'New',
						'db_columns'=> 'created_at',
						'direction'	=> 'desc',
					],
					'low-to-high' => [
						'label'   	=> '$ Low to High',
						'db_columns'=> 'final_price',
						'direction'	=> 'asc',
					],
					'high-to-low' => [
						'label'   	=> '$ High to Low',
						'db_columns'=> 'final_price',
						'direction'	=> 'desc',
					],
				],
				'price_range' => [
					'0-10',
					'10-20',
					'20-30',
					'30-50',
					'50-100',
					'100-150',
					'150-300',
					'300-500',
					'500-1000',
					'1000-',
				],
			],
			###############################
			## 		Product��������		 ##
			###############################
			# ��Ʒҳ��ͼƬ������
			'productImgSize' => [
				'small_img_width'  => 80,  # �ײ�Сͼ�Ŀ��
				'small_img_height' => 110,  # �ײ�Сͼ�ĸ߶�
				'middle_img_width' => 400,  # ��ͼ�Ŀ��
			],
			'productImgMagnifier' => false, # �Ƿ��ѷŴ󾵵ķ�ʽ��ʾ������������ڿ��ķ�ʽ�鿴
			
			###############################
			##     Review��������		 ##
			###############################
			'review' => [
				'add_captcha' 			 => true ,  # ����reviewҳ���Ƿ�����֤����֤��
				'productPageReviewCount' => 20, 	# �ڲ�Ʒҳ����ʾ��review�ĸ�����
				'reviewPageReviewCount'	 => 40, 	# ��review�б�ҳ�棬��ʾ��review�ĸ���
				'addReviewOnlyLogin'	 => true,   # ֻ�е�¼�û������ʸ�������ۡ�
				'ifShowCurrentUserNoAuditReview' => true, # ��ǰ�û���ӵ����ۣ���̨δ��˵����ۣ��Ƿ���ʾ�������ͨ��ip���жϡ�
				'filterByLang'			=> true,	# �Ƿ�ͨ�����Խ������۹��ˣ�Ĭ��ֻ��ʾ��ǰ�������µ����ۣ�Ҳ���ǿͻ���������۵�store�����ԡ�
			],
			
			'favorite' => [
				'addSuccessRedirectFavoriteList' => false , # ��Ʒ�ղسɹ����Ƿ���ת���˻����ĵ��ղ��б�
			]
		],
	],
];




