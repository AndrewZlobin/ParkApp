<?php


namespace Andrew\ParkApp\Core;


class Controller
{
    public function renderPage($content, $template, $data)
    {
        extract($data);
        ob_start();
        include_once __DIR__ . '/../Views/' . $template;
        $page = ob_get_contents();
        ob_end_clean();
        return $page;
    }
}