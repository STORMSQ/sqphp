<?php
namespace vendor\framework\Services;
use vendor\framework\Framework as App;

class Service{
    public $app;
    public function __construct(App $app)
    {
        $this->app = $app;
        $this->run();
    }
    public function run()
    {
        return ;
    }

}
