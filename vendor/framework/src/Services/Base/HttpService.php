<?php
namespace Framework\Services\Base;
use Framework\Services\Service;
class HttpService extends Service{


    public function run(array $parser)
    { 
        $this->app->method($parser['controller'],$parser['action'],$parser['parameter']);
    }
    
  
}