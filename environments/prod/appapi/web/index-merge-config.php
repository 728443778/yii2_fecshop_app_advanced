<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_COMPILE_WARNING ); //��ȥ E_NOTICE E_COMPILE_WARNING ֮������д�����Ϣ
//ini_set('session.cookie_domain', '.fancyecommerce.com'); //��ʼ��������
$http = ($_SERVER['SERVER_PORT'] == 443) ? 'https' : 'http';
defined('YII_DEBUG') or define('YII_DEBUG', false);
defined('YII_ENV') or define('YII_ENV', 'prod');

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
    require(__DIR__.'/../../vendor/fancyecommerce/fecshop/app/appapi/config/appapi.php'),

    // thrid part confing

    // common modules and services.
    require(__DIR__.'/../../common/config/fecshop_local.php'),

    // appadmin local modules and services.
    require(__DIR__.'/../config/fecshop_local.php')

);

$str = '<?php '.PHP_EOL;
$str .= 'return '.PHP_EOL;

/**
 * ������fecshop�����û���phoenix���Ż���Ĵ��룺  http://www.fecshop.com/member/phoenix
 * �����濪ʼ�� `$str .= toPhpCode($config);` ����������֡�
 */
/**
 * �����Ʊ���ü����ո�����ʾ
 */
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
 * ��ʽ���ַ�������������������
 * @param $val ����ļ�ֵ�����ֵ
 * @return string ������Ӧ��������Ӧ���ַ���
 */
function formatStringAndOther($val)
{
    if (is_string($val)) {
        return "'".$val."'";
    }
    if (is_bool($val)) {
        return $val? 'true' : 'false';
    }
    return is_null($val)? "''" : $val;
}

/**
 * ��ReflectionFunction����ȡ�ջ���������Դ�ļ���һЩ��Ϣ
 * �ٸ�����Ϣ�õ���Ӧ���벢��ӡ�������У��ٴӻ����з����ַ���
 * @param $val �����м�ֵ�����ֵ����Ҫ�����ԭ����ıջ�����
 * @return string ���رջ������Ӧ�Ĵ���
 */
function formatClosureObject($val)
{
    $code_str = '';
    ob_start();
    ob_implicit_flush(false);
    $func = new ReflectionFunction($val);
    $filename = $func->getFileName();
    $start_line = $func->getStartLine(); //����ԭ�������-1�������ɡ���Ϊ�ɶ��Ժ�һ��ĵ������"+1"��"-1"�ˡ�
    $end_line = $func->getEndLine();
    $length = $end_line - $start_line + 1;
    $source = file($filename);
    $code = implode("", array_slice($source, $start_line - 1, $length));//fileת��������������㿪ʼ�ʼ�һ
    echo $code;
    $code_str = ob_get_clean();
    return $code_str;
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
    $eol_flag = 1;
    foreach ($arr as $k => $v) {
        1 != $eol_flag && $str .= PHP_EOL;
        $eol_flag = -1;
        $key = is_string($k) ? "'" . $k . "'" : $k;
        $value = '';
        if (is_object($v)) {
            $value = formatClosureObject($v);
            $str .= $value;
            $eol_flag = 1;
            continue;
        }
        if (is_array($v)) {
            $value = toPhpCode($v, $dimensional);
        }else{
            $value = formatStringAndOther($v);
        }
        $str .= $curr_spaces_str . $key . '=>' . $value . ',';
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
        return formatStringAndOther($arr);
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
