<?php

namespace Andrew\ParkApp\Controllers;

use Andrew\ParkApp\Core\Controller;

class PaymentController extends Controller
{
    public function indexAction()
    {
        session_start();
        $content = 'payment.php';
        $template = 'template.php';
        $data = [
            'title' => 'Оплата',
            'style_payment' => 'payment.css',
            'auth' => isset($_SESSION['name'])
        ];


        echo $this->renderPage($content, $template, $data);
    }

    public function chooseAction($id)
    {
        $post = $_POST;
//        var_dump($post);
        $url = 'http://217.15.16.102:13135/api_ext.php';
//        $url = 'http://192.168.3.17/api_ext.php';
        $login = $post['Login'];
        $pwd = $post['Pwd'];
        $operation = 'info';
        $barcode = $post['BarCode'];
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

        echo "Ответ сервера: ".$json_result["@attributes"]["Result"]."<br>";
        echo "К оплате: ".$json_result["Rate"]["Total"]["Amount"]." ".$json_result["Rate"]["Total"]["Currency"];
        var_dump($json_result);
    }
}