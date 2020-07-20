<?php
namespace app\controllers;
use app\controllers\Demo;
class TestController extends Controller{

    public function index(Demo $demo,$age)
    {
        echo '控制器方法';
        $demo->test();
    }
}