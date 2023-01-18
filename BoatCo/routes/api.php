<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

/**
 * Gets boats from the API and returns them as JSON.
 * Requires URL parameters of 'start' and 'end'.
 * Only returns IDs between these two values.
 *
 * @param Request $request The request data
 * @returns array The response data
 */
Route::get('/boats', function (Request $request) {
    if ($request->query('start') != null && $request->query('end') != null) {
        $boats = DB::select('select * from Boats WHERE `id` >= '.$request->query('start').' LIMIT '.$request->query('end'));
        foreach ($boats as $boat) {
            return $boats;
        }
    } else {
        return response()->json([
            'status' => 400
        ]);
    }
});

/**
 * Returns all boat brands from the database in JSON
 * @returns array The response data
 */
Route::get('/brands', function () {
    $brands = DB::select('select * from Brands');

    return $brands;
});

$boats = DB::select('select * from Boats');

foreach ($boats as $boat) {
    /**
     * Gets the requested boat from the database.
     * @returns array The response data
     * @var $boat \App\Boat The boat object
     */
    Route::get('/boats/'.$boat->id, function () use ($boat) {
        return $boat;
    });
}
