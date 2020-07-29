<?php
namespace vendor\framework\Services\Http;
use vendor\framework\Services\Service;
class HttpService extends Service{


    public function run(array $parser)
    { 
        $this->app->method($parser['controller'],$parser['action'],$parser['parameter']);
    }
    
  
}