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

// Get the data from the database
$boats = DB::select('select * from Boats');
$brands = DB::select('select * from Brands');

// Homepage
Route::get('/', function () use ($boats, $brands) {
    return view('home', ['boats' => $boats, 'brands' => $brands]);
});

// Redirect to homepage: /boat link contains no data
Route::get('/boat', function () {
    return redirect('/');
});

// Boat details page
foreach ($boats as $boat) {
    $boatsDetails = DB::select('select * from BoatsDetails where id = '.$boat->id);
    foreach ($boatsDetails as $bd) {
        $boatDetails = $bd; // Fixes a weird bug
    }

    /**
     * View a specific boat.
     *
     * @returns view
     *
     * @param $brands array The brands data
     * @param $boat object The boat data
     * @param $boatDetails object The boat details data
     */
    Route::get('/boat/'.$boat->id, function () use ($boat, $brands, $boatDetails) {
        return view('boat', ['boat' => $boat, 'brands' => $brands, 'details' => $boatDetails]);
    });

    /**
     * Buy a specific boat.
     *
     * @uses $boat The boat information.
     */
    Route::get('/buy/'.$boat->id, function () use ($boat) {
        $price = $boat->price;

        // This is a public sample test API key.
        // Don’t submit any personally identifiable information in requests made with this key.
        // Sign in to see your own test API key embedded in code samples.

        $stripe = new \Stripe\StripeClient($_ENV['APP_STRIPEKEY']);

        \Stripe\Stripe::setApiKey($_ENV['APP_STRIPEKEY']);

        header('Content-Type: application/json');

        $YOUR_DOMAIN = 'http://127.0.0.1:8000';

        $product = $stripe->products->create(['name' => $boat->name, 'images' => [$boat->image]]);
        $price = $stripe->prices->create(
            ['product' => $product->id, 'unit_amount' => $boat->price.'00', 'currency' => 'gbp']
        );

        $checkout_session = \Stripe\Checkout\Session::create([
            'line_items' => [[
                // Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
                'price'    => $price->id,
                'quantity' => 1,
            ]],
            'mode'        => 'payment',
            'success_url' => $YOUR_DOMAIN.'/buy/success', // URLs for success and cancel pgae
            'cancel_url'  => $YOUR_DOMAIN.'/buy/cancel',
        ]);

        header('HTTP/1.1 303 See Other');

        return redirect($checkout_session->url);
    });
}

/**
 * The cancelled purchase page.
 *
 * @returns view
 */
Route::get('/buy/cancel', function () {
    return view('buycancel');
});

/**
 * The successful purchase page.
 *
 * @returns view
 */
Route::get('/buy/success', function () {
    return view('/buysuccess');
});
