<?php
namespace vendor\framework;
use \vendor\framework\Services\Http\HttpService;
class Framework extends Container{

    private $services = [];
    public function run()
    {
        
        $this->baseService();
        $this->routeService();

    }

    protected function baseService()
    {
        //load database
       // $this->tools['db'] = $this->get(\vendor\framework\Services\Base\DatabaseService::class);

       // print_r($db);
    }


    protected function routeService()
    {
        $this->services['HttpService'] = $this->get(HttpService::class);
        $this->services['HttpService']->run();

    }

}