<?php

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
	$links = \App\Ingridient::all();
	return view('front', compact('links'));
});

Route::get('/order/{id}', function () {
	$orders = \App\Order::where('id', 7);
	//$orders = \App\Order::all();
	return view('order', compact('orders'));
});

use Illuminate\Http\Request;

Route::post('/submit', function (Request $request) {
	$data = $request->validate([
        'name' => 'required|max:255',
        'phone' => 'required|max:255',
    ]);

    // $order = tap(new App\Order($data))->save();
	$order = new App\Order;
	$order->name = $data['name'];
	$order->phone = $data['phone'];
	$order->description = 'test';
	$order->save();
    return redirect('/order/'.$order->id);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
