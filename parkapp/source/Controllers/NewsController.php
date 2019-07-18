<?php
namespace Andrew\ParkApp\Controllers;


use Andrew\ParkApp\Core\Controller;
use Andrew\ParkApp\Models\NewsRepository;

class NewsController extends Controller
{

    private $newsRepository;

    public function __construct()
    {
        $this->newsRepository = new NewsRepository();
    }

    public function indexAction()
    {
        session_start();
        $content = 'news.php';
        $template = 'template.php';
        $news = $this->newsRepository->getAll();
        $data = [
            'title' => 'Новости и акции',
            'style_page' => 'news.css',
            'news' => $news,
            'auth' => isset($_SESSION['name'])
        ];

        echo $this->renderPage($content, $template, $data);

    }
    //addInfo, addDiscunt, getall, getbyid, delete
}