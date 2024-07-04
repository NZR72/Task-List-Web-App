<?php

use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index', ['name' => 'Nizar']); # Main Page
});

Route::get("/hello", function () {
    return "hehe"; 
})->name("CorrectURL");

Route::get("/hallo", function () {
    return redirect()->route("CorrectURL"); #link redirect
})-> Name("test rerouting");

Route::get("greet/{name}", function ($name){
    return "hello " . ($name);
});

Route::fallback(function () {
    return view("welcome"); #route if there is no route available
});