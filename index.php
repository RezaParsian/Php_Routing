<?php

use Kernel\Route;

spl_autoload_register(function ($class_name) {
    require_once $class_name . '.php';
});

Route::add("/", function () {
    echo "Main page";
});

Route::add("/rp76", function () {
    Route::redirect("https://rp76.ir");
}, "get", "zizi");

Route::add("/ zizi",function(){
    Route::redirect(Route::name("zizi"));
});

Route::add("/rp",function(){
    echo "rp";
});

Route::run();