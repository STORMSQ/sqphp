<?php
namespace vendor\framework;
use vendor\framework\Services\Http\HttpService;
use vendor\framework\Services\Base\LoadConfigureService;
class Framework extends Container{

    //public $services = [];
    public function run()
    {
       $this->set('config',new LoadConfigureService($this));
       $this->set('http',new HttpService($this));
       //dd($this->instances);
        //$this->services['http'] = $this->get(HttpService::class);

    
    }



}