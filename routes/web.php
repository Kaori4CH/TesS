<?php

use App\Http\Controllers\classes\IndexController;
use App\Http\Controllers\classes\ShowController;
use App\Http\Controllers\classes\CreateController;
use App\Http\Controllers\classes\EditController;
use App\Http\Controllers\classes\StoreController;
use App\Http\Controllers\classes\UpdateController;
use App\Http\Controllers\classes\DestroyController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\MajorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::name('students.')->prefix('students')->group(function () {

    Route::get('/', [StudentController::class, 'index'])->name('index');

    Route::get('/{id}', [StudentController::class, 'show'])->name('show')->whereNumber('id');

    Route::get('/create', [StudentController::class, 'create'])->name('create');

    Route::get('/{id}/edit', [StudentController::class, 'edit'])->name('edit');

    Route::post('/', [StudentController::class, 'store'])->name('store');

    Route::put('/{id}', [StudentController::class, 'update'])->name('update');

    Route::delete('/{id}', [StudentController::class, 'destroy'])->name('destroy');
});

Route::name('teachers.')->prefix('teachers')->group(function () {

    Route::get('/', [TeachersController::class, 'index'])->name('index');

    Route::get('/{id}', [TeachersController::class, 'show'])->name('show')->whereNumber('id');

    Route::get('/create', [TeachersController::class, 'create'])->name('create');

    Route::get('/{id}/edit', [TeachersController::class, 'edit'])->name('edit');

    Route::post('/', [TeachersController::class, 'store'])->name('store');

    Route::put('/{id}', [TeachersController::class, 'update'])->name('update');

    Route::delete('/{id}', [TeachersController::class, 'destroy'])->name('destroy');
});

Route::name('classes.')->prefix('classes')->group(function () {

    Route::get('/', IndexController::class)->name('index');

    Route::get('/{id}', ShowController::class)->name('show')->whereNumber('id');

    Route::get('/create', CreateController::class)->name('create');

    Route::get('/{id}/edit', EditController::class)->name('edit');

    Route::post('/', [StoreController::class, 'store'])->name('store');

    Route::put('/{id}', [UpdateController::class, 'update'])->name('update');

    Route::delete('/{id}', [DestroyController::class, 'destroy'])->name('destroy');
});

Route::resource('majors', MajorController::class);