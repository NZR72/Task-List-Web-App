<?php

use Faker\Guesser\Name;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(route('homepage'));
}) -> Name("tasks.index");

Route::get('/tasks',function () {
  return view('index', ['name' => 'Nizar', 'tasks' => \App\Models\Task::latest()->orderBy('completed') -> get()]); # Main Page
}) -> Name("homepage");

Route::view("/tasks/create", 'create') -> name("tasks.create");

Route::get("/tasks/{id}", function($id) {
  return view("show", ['task'=> \App\Models\Task::findOrFail($id)] );
}) -> name("tasks.show");

Route::post('/tasks', function(Request $request) {
  dd($request -> all());
}) -> name('tasks.store');

// Route::get("/hello", function () {
//     return "hehe"; 
// })->name("CorrectURL");

// Route::get("/hallo", function () {
//     return redirect()->route("CorrectURL"); #link redirect
// })-> Name("test rerouting");

// Route::get("greet/{name}", function ($name){
//     return "hello " . ($name);
// });

Route::fallback(function () {
    return view("welcome"); #route if there is no route available
});