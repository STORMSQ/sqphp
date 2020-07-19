<?php
namespace vendor\framework\Services;
use vendor\framework\Services\Provider;
class Service implements Provider{
    public $app;
    public function __construct(\vendor\framework\Container $container){
        $this->app = $container;
    }
    public function run()
    {
        return;
    }
}
