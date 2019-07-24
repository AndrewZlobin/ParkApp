<?php
namespace Andrew\ParkApp\Controllers;

use Andrew\ParkApp\Core\Controller;
use Andrew\ParkApp\Models\ParkingsRepository;

class IndexController extends Controller
{
    private $parkingsRepository;

    public function __construct()
    {
        $this->parkingsRepository = new ParkingsRepository();
    }

    public function indexAction()
    {
        session_start();
        $content = 'main.php';
        $template = 'template.php';
        $json = $this->parkingsRepository->parkingsOnMap();
//        $unique_cities = $this->parkingsRepository->getCitiesNames();
        $data = [
            'title' => 'ParkApp',
            'style_general' => 'general.css',
//            'style_page' => 'main.css',
            'auth' => isset($_SESSION['name']),
            'json'=>$json,
            'js_script'=>'slider.js'
        ];


        echo $this->renderPage($content, $template, $data);
    }

    public function hiddenAction()
    {
        $json = $this->parkingsRepository->parkingsOnMap();
        foreach ($json as $value){
            $parkingX = floatval($value['parkingCoordinatesX']);
            $parkingY = floatval($value['parkingCoordinatesY']);
//            $mask['features'][] =  array(
//                "type"=>"Feature",
//                "id"=>$value['idParking'],
//                "geometry"=>array(
//                    "type"=>"Point",
//                    "coordinates"=>[$parkingX, $parkingY]
//                ),
//                "properties"=> array(
//////                    "balloonContentHeader"=>$value['idParking'],
//                    "balloonContentHeader" => "<h1>".$value['parkingName']."</h1>"."<h2>".$value['parkingDescription']."</h2>",
////                    "balloonContent" => ['<form class="map_form">', '<input type="text" placeholder="Your Name">', '<input type="text" placeholder="Email Adress">', '<textarea placeholder="Your Message">', '</textarea>', '</form>'],
//                    "balloonContent" => $value['parkingAddress'].$value['parkingTariff'],
////                    "balloonContentBody" => "<h3>".$value['parkingTariff']."</h3>"."<h3>".$value['parkingFreePlaces']."</h3>",
//                    "balloonContentFooter" => "<button type='submit' value='Выбрать'>",
//                    "hintContent" => "<h4>".$value['parkingName']."</h4>"
//                ),
//                "options"=>array(
//                    "preset"=> "islands#orangeAutoIcon"
//                )
//            );
            $mask[] = array(
                "id"=>$value['idParking'],
                "coordinatesX"=>$parkingX,
                "coordinatesY"=>$parkingY,
                "name"=>$value['parkingName'],
                "description"=>$value['parkingDescription'],
                "tariff"=>$value['parkingTariff']
            );
        }
        echo json_encode($mask, JSON_UNESCAPED_UNICODE);
    }

    public function paymentAction()
    {
        $content = 'payment.php';
        $template = 'template.php';
        $data = [
            'title' => 'Оплата',
            'style_general' => 'general.css',
            'style_page' => 'payment.css',
            'auth' => isset($_SESSION['name'])
        ];


        echo $this->renderPage($content, $template, $data);
    }
}