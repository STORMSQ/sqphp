<?php
namespace RunTime\controllers;
class TestController extends Controller
{
    public function index(Demo $demo)
    {
        echo '控制器方法';
        $demo->test();
    }
    public function action(Demo $demo, $a)
    {
        echo 'action方法<br>';
        echo $a;
    }
    public function action2()
    {
        echo 'aaaaaaaa';
    }
    
}