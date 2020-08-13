<?php
namespace Framework\Services\Base;
use Framework\Services\Service;
class Model extends Service{

    public function connect()
    {
        $database = config('database');
    }
}