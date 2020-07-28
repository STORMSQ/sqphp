<?php
namespace app\controllers;
use app\controllers\Demo;
class TestController extends Controller{

    public function index(Demo $demo)
    {
        echo '控制器方法';
        $demo->test();
    }
    public function action(Demo $demo)
    {
        echo 'action方法';
    }
}