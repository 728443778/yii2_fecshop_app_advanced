<?php

error_reporting(E_ALL || ~E_NOTICE); //��ȥ E_NOTICE ֮������д�����Ϣ
//ini_set('session.cookie_domain', '.fancyecommerce.com'); //��ʼ��������
$http = ($_SERVER['SERVER_PORT'] == 443) ? 'https' : 'http';
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__.'/../../vendor/autoload.php';
require __DIR__.'/../../vendor/fancyecommerce/fecshop/yii/Yii.php';

require __DIR__.'/../../common/config/bootstrap.php';

require __DIR__.'/../config/bootstrap.php';

$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__.'/../../common/config/main.php'),
    require(__DIR__.'/../../common/config/main-local.php'),
    require(__DIR__.'/../config/main.php'),
    require(__DIR__.'/../config/main-local.php'),
    // fecshop services config
    require(__DIR__.'/../../vendor/fancyecommerce/fecshop/config/fecshop.php'),
    // fecshop module config
    require(__DIR__.'/../../vendor/fancyecommerce/fecshop/app/appserver/config/appserver.php'),

    // thrid part confing

    // common modules and services.
    require(__DIR__.'/../../common/config/fecshop_local.php'),

    // appadmin local modules and services.
    require(__DIR__.'/../config/fecshop_local.php')

);

$str = '<?php '.PHP_EOL;
$str .= 'return '.PHP_EOL;

//�����Ʊ���ü����ո�����ʾ
const TAB_DEFAULT_SPACES = 4;
/**
 * ��ȡĳά�������ո��ַ���
 * @param $dimensional ά��������ǰ������ĵڼ��㡣
 * @return string ���ص�ǰ��������ո���ַ���
 */
function obtainSpaces($dimensional)
{
    $spaceNumber = $dimensional * TAB_DEFAULT_SPACES;
    $spaceStr = '';
    for ($index = 0; $index < $spaceNumber; $index++) {
        $spaceStr .= ' ';
    }
    return $spaceStr;
}

/**
 * @param $val ����ļ�ֵ�����ֵ��������������ʱ���)
 * @return string ������Ӧ��������Ӧ���ַ���
 */
function formatNotArray($val)
{
    if (is_string($val)) {
        return "'".$val."'";
    }
    if (is_bool($val)) {
        return $val? 'true' : 'false';
    }
    if (is_object($val)) {
        $post_log = '';
        ob_start();
        ob_implicit_flush(false);
        $func = new ReflectionFunction($val);
        $filename = $func->getFileName();
        $start_line = $func->getStartLine() - 1; // it's actually - 1, otherwise you wont get the function() block
        $end_line = $func->getEndLine();
        $length = $end_line - $start_line;
        $source = file($filename);
        $body = implode("", array_slice($source, $start_line, $length));
        echo $body;
        $post_log = ob_get_clean();
        return $post_log;
    }
    //if()
    return is_null($val)? "''" : $val;
}



/**
 * ��ʽ�����飨��ʽ�����ַ���)
 * @param $arr Ҫ��ʽ��������
 * @param $dimensional ά�ȣ�����ǰ���鴦�ڱ�Ƕ���ڵڼ�����
 * @param $pre_sapces_str ��һά�ȵ�����ո��ַ���
 * @param $curr_spaces_str ��ǰά�ȵ�����ո��ַ���
 * @return string �����ʽ���������ַ���
 */
function formatArray($arr,$dimensional,$pre_sapces_str,$curr_spaces_str)
{
    $str = PHP_EOL.$pre_sapces_str.'['.PHP_EOL;
    $index = 1;
    foreach ($arr as $k => $v) {
        1 != $index && $str .= PHP_EOL;
        $index = -1;
        $key = is_string($k)? "'".$k."'" : $k;
        $value = '';
        if (is_array($v)) {
            $value = toPhpCode($v, $dimensional);
            $str .= $curr_spaces_str.$key.'=>'.$value.',';
        }else if(is_object($v)) {
            $value = formatNotArray($v);
            $str .= $curr_spaces_str.$value;
        }else {
            $value = formatNotArray($v);
            $str .= $curr_spaces_str.$key.'=>'.$value.',';
        }
        //$str .= $curr_spaces_str.$key.'=>'.$value.',';
    }
    $str .= PHP_EOL.$pre_sapces_str.']';
    return $str;

}

/**
 * ת��php����
 * @param $arr Ҫת������
 * @param int $dimensional ά�ȣ�����ǰ���鴦�ڱ�Ƕ���ڵڼ�����
 * @return string ��ʽ���������ַ���
 */
function toPhpCode($arr, $dimensional = 0)
{
    if (!is_array($arr)) {
        return formatNotArray($arr);
    }
    $pre_sapces_str = obtainSpaces($dimensional);
    $dimensional++;
    $curr_spaces_str = obtainSpaces($dimensional);
    return formatArray($arr,$dimensional,$pre_sapces_str,$curr_spaces_str);
}

$str .= toPhpCode($config);
$str .= ';';
file_put_contents('../merge_config.php', $str);
echo 'generate merge config file success';
