<?php

use \App\Models\Task;
use Faker\Guesser\Name;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect(route('homepage'));
}) -> Name("tasks.index");

Route::get('/tasks',function () {
  return view('index', ['name' => 'Nizar', 'tasks' => Task::latest()->orderBy('completed') -> get()]); # Main Page
}) -> Name("homepage");

Route::view("/tasks/create", 'create') -> name("tasks.create");

//get task
Route::get("/tasks/{id}", function($id) {
  return view("show", ['task'=> Task::findOrFail($id)] );
}) -> name("tasks.show");

//edit task
Route::get("/tasks/{id}/edit", function($id) {
  return view("edit", ['task'=> Task::findOrFail($id)] );
}) -> name("tasks.edit");

//
Route::put('/tasks/{id}', function($id, Request $request) {
  // dd($request -> all()); #check the structure of the POST
  $data = $request -> validate([
    "title" => "required | max : 255",
    "description" => "required",
    "long_description" => "required"
  ]);

  $task = Task::findOrFail($id);
  $task -> title = $data["title"];
  $task -> description = $data["description"];
  $task -> long_description = $data["long_description"];
  $task -> save();

  return redirect() -> route("tasks.show", ["id" => $task -> id ])
    -> with("success", "Task updated successfully!");
}) -> name('tasks.update');

//post new task
Route::post('/tasks', function(Request $request) {
  // dd($request -> all()); #check the structure of the POST
  $data = $request -> validate([
    "title" => "required | max : 255",
    "description" => "required",
    "long_description" => "required"
  ]);

  $task = new Task;
  $task -> title = $data["title"];
  $task -> description = $data["description"];
  $task -> long_description = $data["long_description"];
  $task -> save();

  return redirect() -> route("tasks.show", ['id' => $task->id])
    -> with("success", "Task created successfully!");
}) -> name('tasks.store');

Route::fallback(function () {
    return view("welcome"); #route if there is no route available
});




// Route::get("/hello", function () {
//     return "hehe"; 
// })->name("CorrectURL");

// Route::get("/hallo", function () {
//     return redirect()->route("CorrectURL"); #link redirect
// })-> Name("test rerouting");

// Route::get("greet/{name}", function ($name){
//     return "hello " . ($name);
// });