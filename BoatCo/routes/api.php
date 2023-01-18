<?php

use Illuminate\Support\Facades\DB;
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

$boats = DB::select('select * from Boats LIMIT 25');

Route::get('/boats', function () use ($boats) {
    foreach ($boats as $boat) {
        return $boats;
    }
});

Route::get('/brands', function () {
    $brands = DB::select('select * from Brands');

    return $brands;
});

foreach ($boats as $boat) {
    Route::get('/boats/'.$boat->id, function () use ($boat) {
        return $boat;
    });
}
