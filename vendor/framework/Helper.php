<?php

function D(){

    echo 'D 功能';
}

function dd($variable)
{
    echo '<pre>';
    print_r($variable);
    echo '</pre>';
    die;
}
function dump($variable)
{
    echo '<pre>';
    print_r($variable);
    echo '</pre>';
}