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
        $mask['type'] = 'FeatureCollection';
        foreach ($json as $value){
            $parkingX = floatval($value['parkingCoordinatesX']);
            $parkingY = floatval($value['parkingCoordinatesY']);
            $mask['features'][] =  array(
                "type"=>"Feature",
                "id"=>$value['idParking'],
                "geometry"=>array(
                    "type"=>"Point",
                    "parkingCoordinates"=>[$parkingX, $parkingY]
                ),
                "properties"=> array(
//                    "balloonContentHeader"=>$value['idParking'],
                    "balloonContentHeader"=>"Header: ".$value['parkingName'],
                    "balloonContentBody"=>$value['parkingDescription'],
                    "balloonContentFooter"=>$value['parkingTariff'],
                    "hintContent"=>$value['parkingName']

                ),
                "options"=>array(
                    "preset"=> "islands#orangeAutoIcon"
                )
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