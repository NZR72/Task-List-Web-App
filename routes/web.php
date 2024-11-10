<?php

use App\Http\Requests\TaskRequest;
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
Route::get("/tasks/{task}", function(Task $task) {
  return view("show", ['task'=> $task] );
}) -> name("tasks.show");

//edit task
Route::get("/tasks/{task}/edit", function(Task $task) {
  return view("edit", ['task'=> $task] );
}) -> name("tasks.edit");

//
Route::put('/tasks/{task}', function(Task $task, TaskRequest $request) {  

  $task -> update($request -> validated());
  
  return redirect() -> route("tasks.show", ["task" => $task -> id ])
    -> with("success", "Task updated successfully!");
}) -> name('tasks.update');

//post new task
Route::post('/tasks', function(TaskRequest $request) {

  $task = Task::create($request -> validated());

  return redirect() -> route("tasks.show", ['task' => $task->id])
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