<?php

use Illuminate\Support\Facades\Route;
<?php
use App\Http\Controllers\PageController;
use App\Http\Controllers\StudentController;
use App\Models\Student;
use Illuminate\Support\Facades\Route;

// A
Route::get('/', [PageController::class, 'home']);
Route::get('/hello/{name}', fn ($name) => "Hello, $name");
Route::get('/about', [PageController::class, 'about']);

// B
Route::resource('students', StudentController::class);

// C (explicit binding)
Route::get('/roll/{student_roll}', fn (Student $student_roll) =>
    view('students.show', ['student' => $student_roll]));

// E
Route::get('/api/students', fn () => response()->json(Student::all()));
/*
|--------------------------------------------------------------------------
| ROUTES  — the front door of a Laravel app
|--------------------------------------------------------------------------
| Every request (URL + HTTP verb) is matched against this list.
| The first route that matches decides who handles it:
|   - a closure (small function written right here), or
|   - a controller method   [SomeController::class, 'method']
|
| See every route:   php artisan route:list
*/

// Lesson 1: the home page. A closure that returns a view (resources/views/home.blade.php).
Route::get('/', function () {
    return view('home');
});

// Lessons 2-6: you will add your routes below this line.
