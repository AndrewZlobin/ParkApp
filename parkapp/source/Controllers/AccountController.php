<?php
namespace Andrew\ParkApp\Controllers;

use Andrew\ParkApp\Core\Controller;
use Andrew\ParkApp\Models\ParkingsRepository;
use Andrew\ParkApp\Models\UsersRepository;

class AccountController extends Controller
{
    private $usersRepository;
    private $parkingsRepository;


    public function __construct()
    {
        $this->usersRepository = new UsersRepository();
        $this->parkingsRepository = new ParkingsRepository();
    }

    public function signAction()
    {
        $content = 'sign.php';
        $template = 'template.php';
        $data = [
            'title' => 'ParkApp-Sign',
            'style_general' => 'general.css',
            'style_page' => 'sign.css',
            'js_script' => 'validation.js'
        ];
        echo parent::renderPage($content, $template, $data);
    }

    public function signupAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET'){
            $data = [
                'title'=>'ParkApp-SignUp'
            ];
            echo $this->renderPage('sign.php', 'template.php', $data);
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $post = $_POST;
            $params = [
                'username' => $post['login'],
                'email' => $post['email'],
                'phone' => $post['phone'],
                'role'=>'USER',
                'hash'=>password_hash($post['password'], PASSWORD_DEFAULT)
            ];

            if($this->usersRepository->save($params) === false) {
                $data = [
                    'title'=>'Регистрация'
                ];
                echo $this->renderPage('sign.php', 'template.php', $data);
            } else {
                header('Location: /account');
            };
        }
    }

    public function signinAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $post = $_POST;
            if (!$this->usersRepository->isAuth($post)){
                header('Location: /');
            }
            header('Location: /account');
        }
    }

    public function indexAction()
    {
        session_start();
        if (!isset($_SESSION['name'])) header('Location: /');
        if($_SESSION['role'])
            $accountPage = strtolower($_SESSION['role'])."_account.php";
//        switch ($_SESSION['role']) {
//            case 'ADMIN':
//                $accountPage = 'admin_account.php';
//                break;
//            case 'USER':
//                $accountPage = 'user_account.php';
//                break;
//            case 'AREND_AP':
//                $accountPage = 'admin_ap_account.php';
//                break;
//            case 'AREND_TP':
//                $accountPage = 'admin_tp_account.php';
//                break;
//            case 'MANAGER':
//                $accountPage = 'manager_account.php';
//                break;
//        }

        $data = [
            'title_account' => 'Personal Account',
            'name' => $_SESSION['name'],
            'auth' => isset($_SESSION['name'])
        ];

        echo $this->renderPage($accountPage, 'template_account.php', $data);
    }

    public function logoutAction()
    {
        session_start();
        session_destroy();
        $_SESSION = [];
        header('Location: /account/sign');
    }

    public function objectsAction()
    {
        if($_SESSION['role'] != 'USER') {
            session_start();
            $content = strtolower($_SESSION['role']).'_objects.php';
            $template = 'template_account.php';
//            $objects = $this->parkingsRepository->getAll();
            $cities = $this->parkingsRepository->getCities();
            $parking_in_cities = $this->parkingsRepository->parkingsInCities();
            $tech_info = $this->parkingsRepository->parkingTechInfo();
            $hyper_query = $this->parkingsRepository->hyperQuery();
            $data = [
                'title_account' => 'Objects',
                'auth' => isset($_SESSION['name']),
                'cities' => $cities,
                'parking_in_cities' => $parking_in_cities,
                'tech_info' => $tech_info,
                'hyper_query'=>$hyper_query,
                'validation' => 'test.js'
            ];
            echo $this->renderPage($content, $template, $data);
        }
    }

    public function usersAction()
    {
        if($_SESSION['role'] != 'USER') {
            session_start();
            $content = strtolower($_SESSION['role']) . '_users.php';
            $template = 'template_account.php';
            $params = ['userRole' => 'Arend_AP'];
            $users_AP = $this->usersRepository->usersHasParkings($params);
            $params = ['userRole' => 'Arend_TP'];
            $users_TP = $this->usersRepository->usersHasParkings($params);
            $data = [
                'title_account' => 'Objects',
                'auth' => isset($_SESSION['name']),
                'users_AP'=> $users_AP,
                'users_TP'=> $users_TP
            ];
            echo $this->renderPage($content, $template, $data);
        }
    }

    public function webAction()
    {
        if($_SESSION['role'] != 'USER') {
            session_start();
            $content = strtolower($_SESSION['role']).'_offices.php';
            $template = 'template_account.php';
            $offices = $this->parkingsRepository->getOffices();
            $data = [
                'title_account' => 'About',
                'auth' => isset($_SESSION['name']),
                'offices' => $offices
            ];
            echo $this->renderPage($content, $template, $data);
        }
    }
}