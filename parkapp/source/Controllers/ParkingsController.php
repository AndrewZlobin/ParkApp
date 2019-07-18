<?php


namespace Andrew\ParkApp\Controllers;


use Andrew\ParkApp\Core\Controller;
use Andrew\ParkApp\Models\ParkingsRepository;
use Andrew\ParkApp\Models\UsersRepository;

class ParkingsController extends Controller
{
    private $parkingsRepository;
    private $usersRepository;

    public function __construct()
    {
        $this->parkingsRepository = new ParkingsRepository();
        $this->usersRepository = new UsersRepository();
    }

    public function addobjectAction()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            header('Location: /account');
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            session_start();
            // если post запрос, обрабатываем данные
            $post = $_POST;

            if ($post['parkingSystem'] == 'AP-PRO') {
                $role = 'AREND_AP';
                $parkSys = 'AP-PRO';
            }
            if ($post['parkingSystem'] == 'TicketPark') {
                $role = 'AREND_TP';
                $parkSys = 'TicketPark';
            }

//            $params = [
//                'userLogin' => $post['userLogin'],
//                'userHash' => password_hash($post['userHash'], PASSWORD_DEFAULT),
//                'userEmail' => $post['userEmail'],
//                'userPhone' => $post['userPhone'],
//                'userParkSystem' => $parkSys,
//                'userRole' => $role,
//                'cityName' => $post['cityName'],
//                'parkingName' => $post['parkingName'],
//                'parkingCoordinatesX' => explode(",", $post['parkingCoordinates'])[0],
//                'parkingCoordinatesY' => trim(explode(",", $post['parkingCoordinates'])[1]),
//                'parkingAddress' => $post['parkingAddress'],
//                'parkingURL' => $post['parkingURL'],
//                'parkingDescription' => $post['parkingDescription'],
//                'parkingSystem' => $post['parkingSystem'],
//                'parkingCity' => intval($cityID['idCity']),
//                'Users_idUser' => $userID,
//                'Parking_idParking' => $parkingID,
//                'idCity' => $parkingID
//            ];

//            echo 'Error 1';
//            return;

            $param0 = [
                'userLogin' => $post['userLogin'],
                'userHash' => password_hash($post['userHash'], PASSWORD_DEFAULT),
                'userEmail' => $post['userEmail'],
                'userPhone' => $post['userPhone'],
                'userParkSystem' => $parkSys,
                'userRole' => $role
            ];
            $param1 = [
                'cityName' => $post['cityName']
            ];

            $param2  =[
                'parkingName' => $post['parkingName'],
                'parkingCoordinatesX' => explode(",", $post['parkingCoordinates'])[0],
                'parkingCoordinatesY' => trim(explode(",", $post['parkingCoordinates'])[1]),
                'parkingAddress' => $post['parkingAddress'],
                'parkingURL' => $post['parkingURL'],
                'parkingDescription' => $post['parkingDescription'],
                'parkingSystem' => $post['parkingSystem'],
                'parkingCity' => intval($cityId['idCity'])
            ];

            $param3 = [
                'Users_idUser' => $userId,
                'Parking_idParking' => $parkingId
            ];

//            $param4 = [
//                'idCity' => $parkingId,
//                'cityName' => $post['cityName']
//            ];


//            var_dump($_POST);
            $transaction = $this->parkingsRepository->transaction($param0,$param1,$param2,$param3);
            if($transaction === false)
                echo "Error";

//            var_dump($param0,$param1,$param2,$param3,$param4);
//            var_dump($this->parkingsRepository->transaction($param0,$param1,$param2,$param3));
//            return;
//            if ($userId === false) {
//
//                echo $addResult = 'Ошибка 1';
////                $content = $_SESSION['role'].'_account.php';
////                $data = [
////                    'title'=>'Account',
////                    'addResult'=>$addResult
////                ];
////                echo $this->renderPage($content, 'template_account.php', $data);
//            } else {
//                $params = [
//                    'cityName' => $post['cityName']
//                ];
//
//                $cityId = $this->parkingsRepository->getCitiesByName($params);
//
//                if ($cityId === false) {
//                    $addResult = 'Ошибка 2';
//                } else {
//                    $params = [
//                        'parkingName' => $post['parkingName'],
//                        'parkingCoordinatesX' => explode(",", $post['parkingCoordinates'])[0],
//                        'parkingCoordinatesY' => trim(explode(",", $post['parkingCoordinates'])[1]),
//                        'parkingURL' => $post['parkingURL'],
//                        'parkingDescription' => $post['parkingDescription'],
//                        'parkingSystem' => $post['parkingSystem'],
//                        'parkingCity' => intval($cityId['idCity'])
//                    ];
//
//                    $parkingId = $this->parkingsRepository->save($params);
//                    if ($parkingId === false) {
//                        $addResult = 'Ошибка 3';
//                        $content = $_SESSION['role'] . '_account.php';
//                        $data = [
//                            'title' => 'Account',
//                            'addResult' => $addResult
//                        ];
//                        echo $this->renderPage($content, 'template_account.php', $data);
//                    } else {
//
//                        $params = [
//                            'Users_idUser' => $userId,
//                            'Parking_idParking' => $parkingId
//                        ];
//                        $link = $this->parkingsRepository->linkUserAndParking($params);
//                        if ($link === false) {
//                            $addResult = 'Ошибка при вводе информации об арендаторе';
//                        } else {
//                            $addResult = 'Успешное добавление объекта и арендатора!';
//                            header('Location: /account');
//                        }
//
//                        $params = [
//                            'idCity' => $parkingId,
//                            'cityName' => $post['cityName']
//                        ];
//                        $this->parkingsRepository->saveCity($params);
//                        if ($this->parkingsRepository->saveCity($params) === false) {
//                            $addResult = 'Ошибка при выборе города';
//                        } else {
//                            $addResult = 'Успешное добавление объекта и арендатора!';
//                            $content = $_SESSION['role'] . '_account.php';
//                            $data = [
//                                'title' => 'Account',
//                                'addResult' => $addResult
//                            ];
////                    header('Location: /account');
//                            echo $this->renderPage($content, 'template_account.php', $data);
//                        }
//                    }
//                }
//            }
        }
    }


    public function updateobjAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            header('Location: /account/objects');
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            session_start();
            // если post запрос, обрабатываем данные
            $post = $_POST;

            $params = [
                'idParking' => $post['idParking'],
                'parkingName' => $post['parkingName'],
                'parkingCoordinatesX' => explode(",", $post['parkingCoordinates'])[0],
                'parkingCoordinatesY' => trim(explode(",", $post['parkingCoordinates'])[1]),
                'parkingURL' => $post['parkingURL'],
                'parkingAddress' => $post['parkingAddress'],
                'parkingDescription' => $post['parkingDescription'],
                'parkingSystem' => $post['parkingSystem'],
                'parkingCity' => $post['parkingCity']
            ];

            if ($this->parkingsRepository->updateObj($params) === false) {
                $addResult = 'Возникла ошибка при обновлении информации об объекте';
                echo $addResult;
//                header("Location: /account/objects");
//                return $addResult;
//                return false;
//                $content = $_SESSION['role'] . '_account.php';
//                $data = [
//                    'title' => 'Account',
//                    'addResult' => $addResult
//                ];
//                echo $this->renderPage($content, 'template_account.php', $data);
            } else {
                $addResult = 'Данные об объекте обновлены успешно!';
                echo 'Данные об объекте обновлены успешно!';
//                header("Location: /account/objects");
//                return $addResult;
//                header('Location: /account/objects');
//                return $this->parkingsRepository->update($params);
//                $content = $_SESSION['role'] . '_account.php';
//                $data = [
//                    'title' => 'Account',
//                    'addResult' => $addResult
//                ];
//                echo $this->renderPage($content, 'template_account.php', $data);
            }
        }
    }

    public function addtechAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            header('Location: /account/objects');
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            session_start();
            $post = $_POST;

            $params = [
                'techInfo' => intval($post['idParking']),
                'parkingTariff' => $post['parkingTariff'],
                'parkingFreePlaces' => intval($post['parkingFreePlaces'])
            ];
            if($this->parkingsRepository->addTech($params) === false) {
                $addResult = "Возникла ошибка при добавлении информации о тарифе и свободных местах!";
            }
            else{
                $addResult = "Информация о тарифе и свободных местах успешно добавлена!";
                header("Location: /account/objects");
            }
        }
    }

    public function updatetechAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            header('Location: /account/objects');
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            session_start();
            $post = $_POST;

            $params = [
                'techInfo' => intval($post['idParking']),
                'parkingTariff' => $post['parkingTariff'],
                'parkingFreePlaces' => intval($post['parkingFreePlaces'])
            ];
            if($this->parkingsRepository->updateTech($params) === false){
                $addResult = "Возникла ошибка при обновлении информации о тарифе и свободных местах!";
            }
            else{
                $addResult = "Информация о тарифе и свободных местах успешно обновлена!";
                header("Location: /account/objects");
            }
        }
    }

    public function addclientAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            header('Location: /account/objects');
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            session_start();
            $post = $_POST;

            $params = [
                'clientInfo' => intval($post['idParking']),
                'parkingNews' => $post['parkingNews'],
                'parkingPromotions' => $post['parkingPromotions']
            ];

            if ($this->parkingsRepository->addClient($params) === false) {
                $addResult = "Возникла ошибка при добавлении клиентской информации!";
            } else {
                $addResult = "Клиентская информация успешно добавлена!";
                header("Location: /account/objects");
            }
        }
    }

    public function updateclientAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            header('Location: /account/objects');
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            session_start();
            $post = $_POST;

            $params = [
                'clientInfo' => intval($post['idParking']),
                'parkingNews' => $post['parkingNews'],
                'parkingPromotions' => $post['parkingPromotions']
            ];
            if($this->parkingsRepository->updateClient($params) === false){
                $addResult = "Возникла ошибка при обновлении информации о тарифе и свободных местах!";
            }
            else{
                $addResult = "Информация о тарифе и свободных местах успешно обновлена!";
                header("Location: /account/objects");
            }
        }
    }

//    public function addAction()
//    {
//        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
//            header('Location: /account');
//        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
//            // если post запрос, обрабатываем данные
//            $post = $_POST;
//            $params = [
//                'parkingName' => $post['parkingName'],
//                'parkingCoordinatesX' => explode(",", $post['parkingCoordinates'])[0],
//                'parkingCoordinatesY' => trim(explode(",", $post['parkingCoordinates'])[1]),
//                'parkingTariff' => $post['parkingTariff'],
//                'parkingURL' => $post['parkingURL'],
//                'parkingDescription' => $post['parkingDescription'],
//                'parkingSystem' => $post['parkingSystem'],
//                'parkingCity' => $post['parkingCity']
//            ];
//            if ($this->parkingsRepository->save($params) === false) {
//                $addResult = 'Парковку добавить не удалось';
//            } else {
//                $addResult = 'Парковка добавлена в базу данных';
//            }
//
//            $data = [
//                'title' => 'Добавление парковки',
//                'addResult' => $addResult,
//                'auth' => isset($_SESSION['name'])
//            ];
//            echo parent::renderPage('admin_account.php',
//                'template.php', $data);
//        }
//    }
//
//    public function showAction()
//    {
////        session_start();
////        if ($_SESSION['role'] == 'ADMIN'){
////            $
////        }
//        session_start();
//        $parkings = $this->parkingsRepository->getAll();
//        $data = [
//            'title' => 'ADMIN - All Parkings',
//            'parkings' => $parkings,
//            'auth' =>isset($_SESSION['name'])
//        ];
//
//        echo parent::renderPage('admin_account.php', 'template.php', $data);
//    }
}