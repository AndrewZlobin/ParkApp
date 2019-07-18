<?php
namespace Andrew\ParkApp\Controllers;

use Andrew\ParkApp\Core\Controller;

class WebController extends Controller
{
    public function indexAction()
    {
        $content = 'test.php';
        $template = 'template.php';
        $data = [
            'title' => 'Тест Curl',
//            'style_main' => 'main.css',
            'auth' => isset($_SESSION['name'])
        ];


        echo $this->renderPage($content, $template, $data);
    }
}