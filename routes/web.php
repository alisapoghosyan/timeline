<?php
use App\Http\Controllers\{
    AdminController,
    UserController,
    AttendanceController,
    UserUpdateController,
    UserCreateController
};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin',[AdminController::class,'index']);

Route::post("/sortUser",[AdminController::class,'attendances']);
Route::get("/attendances",[AdminController::class,'attendances']);
Route::get("/users_list/{type}",[AdminController::class,'users_list']);
Route::post("/users_list/search",[AdminController::class,'users_list']);
Route::post('/admin',[AdminController::class,'login']);
Route::post('/edit',[UserController::class,'edit']);
Route::post('/create',[UserController::class,'createUser']);
Route::post('/activeUser',[UserController::class,'activeUser']);
Route::post('/updateUser',[UserController::class,'updateUser']);
Route::post('/deleteUser',[UserController::class,'deleteUser']);
Route::get('/users',[UserController::class, 'show']);
Route::post('/user-attendance/{user}',[AttendanceController::class, 'doAction']);
