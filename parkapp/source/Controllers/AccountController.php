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
                'userLogin' => $post['login'],
                'userEmail' => $post['email'],
                'userPhone' => $post['phone'],
                'userHash'=>password_hash($post['password'], PASSWORD_DEFAULT),
                'userRole'=>'USER',
                'userParkSystem'=>'NO'
            ];

            if($this->usersRepository->save($params) === false) {
                $data = [
                    'title'=>'Регистрация'
                ];
                echo $this->renderPage('sign.php', 'template.php', $data);
            } else {
                header('Location: /account/sign');
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
//            $accountPage = strtolower($_SESSION['role'])."_account.php";
        if ($_SESSION['role'] == 'ADMIN') {
            $accountPage = 'admin_account.php';
        } elseif ($_SESSION['role'] == 'USER') {
            $accountPage = 'user_account.php';
        } elseif ($_SESSION['role'] == 'AREND_AP') {
            $accountPage = 'admin_ap_account.php';
        } elseif ($_SESSION['role'] == 'AREND_TP') {
            $accountPage = 'admin_tp_account.php';
        } elseif ($_SESSION['role'] == 'MANAGER'){
            $accountPage = 'manager_account.php';
        }

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

    public function selfchangeAction()
    {
        session_start();
        $content = strtolower($_SESSION['role']) . '_self_change.php';
        $template = 'template_account.php';
        $user = $this->usersRepository->getById(intval($_SESSION['ID']));
        $data = [
            'auth' => isset($_SESSION['name']),
            'title' => 'User Account Change',
            'user' => $user,
//                'style_general' => 'general.css',
            'style_page' => 'sign.css',
            'js_script' => 'validation.js'
        ];
        echo parent::renderPage($content, $template, $data);
    }

    public function userchangeAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            header('Location: /account');
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            session_start();
            // если post запрос, обрабатываем данные
            $post = $_POST;
            var_dump($post);
            $params = [
                'idUser'=>$post['ID'],
                'userEmail'=>$post['email'],
                'userPhone'=>$post['phone']
            ];
            if($this->usersRepository->update($params) === false){
                echo "Error";
            } else {
                echo "Success";
            }
        }
    }

    public function favouriteAction()
    {
        session_start();
        $content = strtolower($_SESSION['role']) . '_favourite.php';
        $template = 'template_account.php';
        $user = $this->usersRepository->getById(intval($_SESSION['ID']));
        $parkings = $this->parkingsRepository->getUserFavourite(intval($_SESSION['ID']));
        $data = [
            'auth' => isset($_SESSION['name']),
            'title' => 'User Account Change',
            'user' => $user,
            'parkings' => $parkings
//                'style_general' => 'general.css',
//                'style_page' => 'sign.css',
//                'js_script' => 'validation.js'
        ];
        echo parent::renderPage($content, $template, $data);
    }

    public function mapAction()
    {
        session_start();
        $content = strtolower($_SESSION['role']) . '_map.php';
        $template = 'template_account.php';
//        $user = $this->usersRepository->getById(intval($_SESSION['ID']));
//        $parkings = $this->parkingsRepository->getUserFavourite(intval($_SESSION['ID']));
        $data = [
            'auth' => isset($_SESSION['name']),
            'title' => 'User Account Change',
            'map' => 'map.css'
        ];
        echo parent::renderPage($content, $template, $data);
    }

    public function hiddenmapAction()
    {
        $json = $this->parkingsRepository->parkingsOnMap();
        foreach ($json as $value){
            $parkingX = floatval($value['parkingCoordinatesX']);
            $parkingY = floatval($value['parkingCoordinatesY']);
            $mask[] = array(
                "id"=>$value['idParking'],
                "coordinatesX"=>$parkingX,
                "coordinatesY"=>$parkingY,
                "name"=>$value['parkingName'],
                "description"=>$value['parkingDescription'],
                "tariff"=>$value['parkingTariff'],
                "free"=>$value['parkingFreePlaces'],
                'news'=>$value['parkingNews'],
                'promotions'=>$value['parkingPromotions']
            );
        }
        echo json_encode($mask, JSON_UNESCAPED_UNICODE);
    }

    public function parktofavouriteAction($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            header('Location: /account');
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            session_start();
            // если post запрос, обрабатываем данные
            $post = $_POST;
            $params = [
                'Users_idUser'=>$_SESSION['ID'],
                'Parkings_idParking'=>$post['idParking']
            ];
            if($this->parkingsRepository->addUserFavourite($params) === false){
                header("Location: /account");
            } else {
                header("Location: /account/favourite");
            }
        }
    }
}