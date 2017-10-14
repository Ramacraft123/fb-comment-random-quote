<?php

namespace App;

use App\HtmlView;

class Response
{
    public function html($viewName, $data = [])
    {
        $htmlView = new HtmlView($viewName, $data);
        header('Content-Type: text/html');
        return $htmlView->render();
    }

    public function redirect($uri)
    {
        header("Location: {$uri}");
    }
}