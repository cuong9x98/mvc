<?php
namespace MVC;

use MVC\Core\Controller;

class Dispatcher
{

    private $request;
    // function tac request
    public function dispatch()
    {
        $this->request = new Request();
        
        Router::parse($this->request->url, $this->request);
        
        $controller = $this->loadController();

        call_user_func_array([$controller, $this->request->action], $this->request->params);
    }

    // Get controller
    public function loadController()
    {
        $name = $this->request->controller . "Controller";
        $nameController = "MVC\Controllers\\".$name;
        $controller = new $nameController();
        return $controller;
    }

}
