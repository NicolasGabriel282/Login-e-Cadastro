<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login_CadastroController;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('cadastro');
});
Route::post('/realizarCadastro',[Login_CadastroController::class,"cadastro"]);

Route::get('/login', function () {
    return view('login');
});
Route::get('/inicio', function () {
    return view('paginainicial');
});

Route::get('/token', function (Request $request) {
    $token = $request->session()->token();
 
    $token = csrf_token();
    var_dump($token);
});
