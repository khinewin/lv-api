<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/login", function(){
    return response()->json(["msg"=>"Authentication is reqruied"]);
})->name("login");


Route::post("/create/user", [AuthController::class, "createUser"]);
Route::post("/create/token", [AuthController::class, "createToken"]);

Route::group(['middleware'=>"auth:sanctum"], function(){

Route::get("/posts", [PostController::class, "getPosts"]);
Route::get("/posts/id/{id}", [PostController::class, "getPostById"]);
Route::post("/posts", [PostController::class, "createPost"]);
Route::put("/posts", [PostController::class, "updatePost"]);
Route::delete("/posts/id/{id}", [PostController::class, "deletePost"]);

});