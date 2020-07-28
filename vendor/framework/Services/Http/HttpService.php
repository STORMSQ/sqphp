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
        //dump($_SERVER);
        $parser['controller']=null;
        $parser['action']=null;
        $document_uri = $_SERVER['DOCUMENT_URI'];
        $request_uri = $_SERVER['REQUEST_URI'];
        $request_method = $_SERVER['REQUEST_METHOD'];
        $request = str_replace(str_replace("/index.php","", $document_uri),"",preg_replace("/\?.+/","",$request_uri));
        
        $detail = $this->getRoute($request);

        if($detail==null){
            throw new \Exception("找不到Controller");
        }
        if(strtoupper($detail['method'])!=$request_method){
            throw new \Exception("該提交方法與路由表的提交方式不同");
        }
        $parser['controller'] = '\app\controllers\\'.$detail['controller'];
        $parser['action'] = $detail['action'];
        return $parser;
    }
    private function getRoute($request)
    {
        foreach(config('route') as $row){
            if(count(array_diff(['controller','url','action','method'],array_keys($row)))==0 && array_search($request,$row)){
                return $row;
            }
        }
    }
  
}