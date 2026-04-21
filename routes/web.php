<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

// Route::get('/', function () {
//     return view('welcome');
// });

//home page
Route::get('/', [TestController::class, 'index']);

//test crud
Route::get('/test', [TestController::class, 'index']);
Route::get('/test/adding',  [TestController::class, 'adding']);
Route::post('/test',  [TestController::class, 'create']);
Route::get('/test/{id}',  [TestController::class, 'edit']);
Route::put('/test/{id}',  [TestController::class, 'update']);
Route::delete('/test/remove/{id}',  [TestController::class, 'remove']);
