<?php
namespace vendor\framework\Services\Http;
use vendor\framework\Services\Service;
use app\controllers\Controller;
class HttpService extends Service{

    public $controller;
    public $action;

    public function run()
    {
        $this->parseURL();
        $action = $this->action;
        $controller = $this->app->get($this->controller);
        $controller->$action();

    }
    public function parseURL()
    {
        $this->controller = '\app\controllers\TestController';
        $this->action = 'index';
    }
  
}