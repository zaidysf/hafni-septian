<?php

use App\Models\Pesan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function (Request $request) {
    return view('home', ['data' => $request->all(), 'pesan' => Pesan::all()]);
});

Route::post('/pesan', function (Request $request) {
    $model = new Pesan();
    $model->name = $request->get('name');
    $model->message = $request->get('pesan');
    $model->attend = (($request->get('attend') == 1) ? 1 : 0);
    $model->save();
    return response($model, 200);
})->name('pesan.post');
