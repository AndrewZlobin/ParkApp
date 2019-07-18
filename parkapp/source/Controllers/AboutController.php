<?php
namespace Andrew\ParkApp\Controllers;

use Andrew\ParkApp\Core\Controller;
use Andrew\ParkApp\Models\AboutRepository;

class AboutController extends Controller
{
    private $aboutRepository;

    public function __construct()
    {
        $this->aboutRepository = new AboutRepository();
    }

    public function indexAction()
    {
        $content = 'about.php';
        $template = 'template.php';
        $offices = $this->aboutRepository->getAll();
        $data = [
            'title' => 'О нас',
            'auth' => isset($_SESSION['name']),
            'style_about' => 'about.css',
            'offices' => $offices
        ];

        echo $this->renderPage($content, $template, $data);
    }

    public function officesAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            header('Location: /account');
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {

            session_start();
            // если post запрос, обрабатываем данные
            $post = $_POST;
            $params = [
                'officeAddress' => $post['officeAddress'],
                'officeEmail' => $post['officeEmail'],
                'officePhone' => $post['officePhone'],
                'officeTechSupport' => $post['officeTechSupport']
            ];
            if($this->aboutRepository->save($params) === false){
                $addResult = 'Не удалось добавить офис';
            } else {
                $addResult = 'Офис добавлен успешно!';
            }
            $data = [
                'title'=>'About',
                'addResult'=>$addResult,
                'auth' => isset($_SESSION['name'])
            ];
            echo parent::renderPage('admin_offices.php', 'template_account.php', $data);
        }
    }

    public function updateAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            header('Location: /account');
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {

            session_start();
            // если post запрос, обрабатываем данные
            $post = $_POST;
            $params = [
                'idOffice' => intval($post['idOffice']),
                'officeAddress' => $post['officeAddress'],
                'officeEmail' => $post['officeEmail'],
                'officePhone' => $post['officePhone'],
                'officeTechSupport' => $post['officeTechSupport']
            ];
            if($this->aboutRepository->updateOffice($params) === false){
                echo 'Не удалось обновить офис';
            } else {
                echo 'Офис обновлен успешно!';
            }
        }
    }
}
//if ($this->pictureRepository->save($params) === false) {
//    $addResult = 'Картина не была добавлена';
//} else {
//    $addResult = 'Картина добавлена';
//}
//
//$data = [
//    'title'=>'Добавление картины',
//    'addResult' => $addResult,
//    'auth' => isset($_SESSION['name'])
//];
//echo parent::renderPage('admin_account.php',
//    'template.php', $data);
