<?php
namespace vendor\framework\Services\Http;
use vendor\framework\Services\Service;
use app\controllers\Controller;
class HttpService extends Service{

    public $controller;
    public $action;
    public $route = [];
    public function run()
    {
    
        $this->parseURL();
        $controller = $this->app->get($this->controller);
        
        $method = $this->app->getReflector($this->controller)->getMethod($this->action);
        
        $parameters = [];
        foreach($method->getParameters() as $param){
            
            if($param->getClass()){
                $parameters[] = $this->app->get($param->getClass()->name);
            }else{
                $parameters[] = 'abc';
            }
          
        }
        $method->invokeArgs($controller,$parameters);

    }


    public function parseURL()
    {
        $document_uri = $_SERVER['DOCUMENT_URI'];
        $request_uri = $_SERVER['REQUEST_URI'];
        $request = str_replace(str_replace("/index.php","", $document_uri),"",preg_replace("/\?.+/","",$request_uri));
        $route = $this->app->getInstance('config')->getConfig('route');

        dd($route);
    

        $this->controller = '\app\controllers\TestController';
        $this->action = 'index';
    }
  
}