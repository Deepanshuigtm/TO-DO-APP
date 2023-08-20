<?php
use App\Http\Requests\TaskRequest;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Task;
use Illuminate\Auth\Events\Validated;

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
// class Task
// {
//   public function __construct(
//     public int $id,
//     public string $title,
//     public string $description,
//     public ?string $long_description,
//     public bool $completed,
//     public string $created_at,
//     public string $updated_at
//   ) {
//   }
// }

// $tasks = [
//   new Task(
//     1,
//     'Buy groceries',
//     'Task 1 description',
//     'Task 1 long description',
//     false,
//     '2023-03-01 12:00:00',
//     '2023-03-01 12:00:00'
//   ),
//   new Task(
//     2,
//     'Sell old stuff',
//     'Task 2 description',
//     null,
//     false,
//     '2023-03-02 12:00:00',
//     '2023-03-02 12:00:00'
//   ),
//   new Task(
//     3,
//     'Learn programming',
//     'Task 3 description',
//     'Task 3 long description',
//     true,
//     '2023-03-03 12:00:00',
//     '2023-03-03 12:00:00'
//   ),
//   new Task(
//     4,
//     'Take dogs for a walk',
//     'Task 4 description',
//     null,
//     false,
//     '2023-03-04 12:00:00',
//     '2023-03-04 12:00:00'
//   ),
// ]; 

// query builder = all(),find(),fidOrFail(),latest()->where('completed',true)->get()

Route::get('/',function(){
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function () {
    return view('index',[
        'tasks' => Task::latest()->paginate(10)
    ]);
})->name('tasks.index');

Route::view('/tasks/create','create')->name('tasks.create');

Route::get('/tasks/{task}', function(Task $task) {
    return view('show',[
      'task' => $task
    ]); 
})->name('tasks.show');

Route::get('/tasks/{task}/edit', function(Task $task) { //change id to task
  return view('edit',[
    'task' => $task
  ]); 
})->name('tasks.edit');

Route::post('/tasks', function(TaskRequest $request){
  $task = Task::create($request->Validated());

  return redirect()->route('tasks.show',['task' => $task->id])
  ->with('success', 'Task created successfully!');
})->name('tasks.store');

Route::put('/tasks/{task}', function(Task $task,TaskRequest $request){
  $task->update($request->Validated());
  return redirect()->route('tasks.show',['task' => $task->id])
  ->with('success', 'Task updated successfully!');
})->name('tasks.update');

Route::delete('/task/{task}',function(Task $task){  //we fetch the task using route model binding
  $task->delete();
  return redirect()->route('tasks.index')->with('success', 'The Task deleted sucessfuluy');
})->name('tasks.destroy');

Route::put('task/{task}/toggle-complete', function(Task $task){

  $task->toggleComplete();
  // $task->completed = !$task->completed;
  // $task->save();

  return redirect()->back()->with('success','Task updated sucessfully');
})->name('tasks.toggle-complete');

Route::fallback(function(){
    return 'this is the fallback route';
});