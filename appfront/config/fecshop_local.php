<?php
# ���ļ���app/web/index.php �����롣

# fecshop�ĺ���ģ��
$modules = [];
foreach (glob(__DIR__ . '/fecshop_local_modules/*.php') as $filename){
	$modules = array_merge($modules,require($filename));
}
# ���������
$services = [];
foreach (glob(__DIR__ . '/fecshop_local_services/*.php') as $filename){
	$services = array_merge($services,require($filename));
}

    
return [
	'modules'=>$modules,
    'services' => $services,
	/* only config in front web */
	'bootstrap' => ['store'],
];
