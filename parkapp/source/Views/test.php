<?php
$url = 'http://192.168.3.17/api_ext.php';
$url = 'http:/http://217.15.16.102:13135/api_ext.php';
$login = 'api';
$pwd = 'api';
$operation = 'info';
$barcode = '1000E4525D037C';
$array = array (
    "Login" => $login,
    "Pwd" => $pwd,
    "Operation" => $operation,
    "BarCode" => $barcode,
);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $array);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, false);

$result = curl_exec($ch);


$xml = simplexml_load_string($result);
$json = json_encode($xml);
$json_result = json_decode($json,TRUE);

var_dump($json_result);
?>

<?php
//$url = 'http:/http://217.15.16.102:13135/api_ext.php';
//if (isDomainAvailible($url))
//{
//    var_dump($json_result);
//}
//else
//{
//    echo "К сожалению, сервер парковки сейчас недоступен. Обратитесь к сотрудникам парковки или в техническую поддержку АП-ПРО";
//}
//
////Возвращает true, если домен доступен
//function isDomainAvailible($domain)
//{
//    //Проверка на правильность URL
//    if(!filter_var($domain, FILTER_VALIDATE_URL))
//    {
//        return false;
//    }
//
//    $login = 'api';
//    $pwd = 'api';
//    $operation = 'info';
//    $barcode = '1000E4525D037C';
//    $array = array (
//        "Login" => $login,
//        "Pwd" => $pwd,
//        "Operation" => $operation,
//        "BarCode" => $barcode,
//    );
//
//    $ch = curl_init($domain);
//    curl_setopt($ch, CURLOPT_POST, 1);
//    curl_setopt($ch, CURLOPT_POSTFIELDS, $array);
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//    curl_setopt($ch, CURLOPT_HEADER, false);
//
//    $result = curl_exec($ch);
//
//
//    $xml = simplexml_load_string($result);
//    $json = json_encode($xml);
//    $json_result = json_decode($json,TRUE);
//
//    var_dump($json_result);
//
////    //Инициализация curl
////    $curlInit = curl_init($domain);
////    curl_setopt($curlInit,CURLOPT_CONNECTTIMEOUT,10);
////    curl_setopt($curlInit,CURLOPT_HEADER,true);
////    curl_setopt($curlInit,CURLOPT_NOBODY,true);
////    curl_setopt($curlInit,CURLOPT_RETURNTRANSFER,true);
////
////    //Получаем ответ
////    $response = curl_exec($curlInit);
////
////    curl_close($curlInit);
////
//    if ($result) return true;
//
//    return $json_result;
//}
//?>
