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
}