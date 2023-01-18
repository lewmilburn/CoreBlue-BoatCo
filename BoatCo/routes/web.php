<?php

use Illuminate\Support\Facades\DB;
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

$boats = DB::select('select * from Boats');
$brands = DB::select('select * from Brands');

Route::get('/', function () use ($boats, $brands) {
    return view('home', ['boats' => $boats, 'brands' => $brands]);
});

Route::get('/boat', function() {
    return redirect('/');
});

foreach ($boats as $boat) {
    Route::get('/boat/'.$boat->id, function () use ($boat, $brands) {
        return view('boat', ['boat' => $boat, 'brands' => $brands]);
    });
}
