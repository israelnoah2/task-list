<?php

use App\Http\Requests\TaskRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use \App\Models\Task;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Redirect to the index page
Route::get('/',function(){
    return redirect()->route('tasks.index');
});

// Index Page
Route::get('/tasks', function () {
    return view('app.index',['tasks' => Task::latest()->paginate(10)]);
})->name('tasks.index');

// Create View Page
Route::view('/task/create','app.create')->name('task.create');

// Edit Task Page
Route::get('/task/{task}/edit', function (Task $task)  {
    return view('app.edit',['task' => $task]);
})->name('task.edit');

// View Task Page
Route::get('/task/{task}', function (Task $task)  {
    return view('app.show',['task' => $task]);
})->name('task.show');

// Create Post Page
Route::post('/tasks',function(TaskRequest $request) {
    Task::create($request->validated());
    return redirect()->route('tasks.index')->with('success','Task Created Successfully');
})->name('task.store');

// Update Put Task
Route::put('/tasks/{task}',function(Task $task ,TaskRequest $request) {
    $task->update($request->validated());
    return redirect()->route('tasks.index')->with('success','Task Updated Successfully');
})->name('task.update');


Route::delete('/tasks/{task}',function(Task $task) {
    $task->delete(); 
    return redirect()->route('tasks.index')->with('delete','Task Deleted Successfully');
})->name('task.delete');


Route::put('tasks/{task}/complete',function(Task $task){
    $task->toggleComplete();
    return redirect()->back();
})->name('task.complete');