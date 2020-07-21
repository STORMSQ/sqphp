<?php
namespace vendor\framework\Services;
use vendor\framework\Container as App;

class Service{
    public $app;
    public function __construct(App $app)
    {
        $this->app = $app;
        $this->create();
    }
    public function create()
    {
        return ;
    }

}
