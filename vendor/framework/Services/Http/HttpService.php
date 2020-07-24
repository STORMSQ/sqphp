<?php
namespace vendor\framework\Services\Http;
use vendor\framework\Services\Service;
use app\controllers\Controller;
class HttpService extends Service{


    public function run()
    {
    
        $parser = $this->parseURL();
        $controller = $this->app->get($parser['controller']);
        
        $method = $this->app->getReflector($parser['controller'])->getMethod($parser['action']);
        
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
        $parser['controller']=null;
        $parser['action']=null;
        $document_uri = $_SERVER['DOCUMENT_URI'];
        $request_uri = $_SERVER['REQUEST_URI'];
        $request = str_replace(str_replace("/index.php","", $document_uri),"",preg_replace("/\?.+/","",$request_uri));
        $route = $this->app->getInstance('config')->getConfig('route');

        $parser['controller'] = '\app\controllers\TestController';
        $parser['action'] = 'index';
        return $parser;
    }
  
}