<?php


use App\Http\Controllers\Api\UserController;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/registerAuth', [UserController::class,'RegisterAccount']);
Route::put('/updateUser', [UserController::class,'updateUser']);
Route::get('/getUser/{id}',[UserController::class,'getUserbyId']);
Route::get('/getUserLoggin',[UserController::class,'getUserLoggin']);
Route::delete('/deleteUser/{id}',[UserController::class,'deleteUserById']);
Route::post('/loggin',[UserController::class,'loggin']);
Route::get('logout',[UserController::class,'logout']);
Route::post('changePassword',[UserController::class,'changePassword']);