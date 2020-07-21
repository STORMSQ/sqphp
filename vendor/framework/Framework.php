<?php
namespace vendor\framework;
use vendor\framework\Services\Http\HttpService;
use vendor\framework\Services\Base\ConfigureService;
class Framework extends Container{

    //public $services = [];
    public function run()
    {
       $this->registerBasic();
       $this->runService();
       dd($this);
    }
    public function registerBasic()
    {
        $this->set('config',new ConfigureService($this));
        $this->set('http',new HttpService($this));
    }
    public function runService()
    {
        //dd($this->get('http'));
        $this->get('http')->run();
    }



}