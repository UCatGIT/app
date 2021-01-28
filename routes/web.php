<?php

use App\Chore;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
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
    return view('welcome');
});


Route::get('/chores', function () {
    $chores = Chore::orderBy('created_at', 'asc')->get();

    return view('chores', [
        'chores' => $chores
    ]);
});

Route::post('/chore', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/chores')
            ->withInput()
            ->withErrors($validator);
    }

    $chore = new Chore;
    $chore->name = $request->name;
    $chore->save();

    return redirect('/chores');
});

Route::delete('/chore/{chore}', function (Chore $chore) {
    $chore->delete();

    return redirect('/chores');
});
