<?php

use Kernel\Route;

spl_autoload_register(function ($class_name) {
    require_once $class_name . '.php';
});

Route::add("/rp76",function(){
    echo "Salam Rp76";
});

Route::add("/rp",function(){
    header("location: https://rp76.ir");
});

Route::run();