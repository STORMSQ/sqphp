<?php
namespace vendor\framework;
use vendor\framework\Services\Http\HttpService;
use vendor\framework\Services\Base\ConfigureService;
class Framework extends Container{

    public function __construct()
    {
        $ServicesList = require(SERVICES_PATH.'/ServiceList.php');
        foreach($ServicesList as $name=>$service){
             $this->set($name, new $service($this));
        }      
    }
    public function run()
    {
        $this->getInstance('http')->run();

    }


}