<?php
namespace vendor\framework\Services\Base;
use vendor\framework\Services\Service;
class UrlService extends Service{


    
    public function parseURL()
    {

        $parser['controller']=null;
        $parser['action']=null;
        $parser['parameter'] = [];
        $document_uri = $_SERVER['DOCUMENT_URI'];
        $request_uri = $_SERVER['REQUEST_URI'];
        $request_method = $_SERVER['REQUEST_METHOD'];
        $uri = explode("?",$request_uri);
        $request = str_replace(str_replace("/index.php","", $document_uri),"",$uri[0]);
        $detail = $this->getRoute($request);

        if($detail==null){
            throw new \Exception("找不到Controller");
        }
        if (strtoupper($detail['method'])!=$request_method) {
            throw new \Exception("該提交方法與路由表的提交方式不同");
        }

        $parser['controller'] = '\app\controllers\\'.$detail['controller'];
        $parser['action'] = $detail['action'];

        $i=0;
        foreach(explode("&",$uri[count($uri)-1]) as $query){
            $parameter = explode("=",$query);
            if(count($parameter)==2){
                $parser['parameter'][$i]=$parameter[1];
                $i++;
            }

        }

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

    public function getUrl()
    {

    }
}