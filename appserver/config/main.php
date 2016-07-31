<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-server',
    'basePath' => dirname(__DIR__),
    //'bootstrap' => ['log'],
    'controllerNamespace' => 'appserver\controllers',
	'modules'=>$modules,
	//'bootstrap'    => ['assetsAutoCompress'],
	# �Զ������
    'components' => [
       /*
	   'assetsAutoCompress' =>
        [
            'class'             => '\skeeks\yii2\assetsAuto\AssetsAutoCompressComponent',
            'enabled'           => true,
            'jsCompress'        => true,
            'cssFileCompile'    => true,
            'jsFileCompile'     => true,
        ],
		*/
		
		'session' => [
			//'class' => 'yii\mongodb\Session',
			//'db' => 'mongodb',
			//'sessionCollection' => 'session',
			'class' => 'yii\redis\Session',
			'timeout' => 6000,	
		],
		
		'cache' => [
            'class' => 'yii\redis\Cache',
            'keyPrefix' => 'appadmin',
        ],
	],
	# �Զ������
    'params' => $params,
];
