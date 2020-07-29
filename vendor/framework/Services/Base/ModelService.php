<?php
namespace vendor\framework\Services\Base;
use vendor\framework\Services\Service;
class Model extends Service{

    public function connect()
    {
        $database = config('database');
    }
}