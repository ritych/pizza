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

use App\Order;

Route::get('/', function () {
	$links = \App\Ingridient::all();
	return view('front', compact('links'));
});

Route::get('/order/{id}', function () {
	$orders = \App\Order::all();
	return view('order', compact('order'));
});


Route::post('/submit', function (Request $request) {
	$validator = Validator::make($request::all(), [
		'name' => 'required|max:255',
		'phone' => 'required|max:255',
	]);

	if ($validator->fails()) {
		return redirect('/')
			->withInput()
			->withErrors($validator);
	}
	echo '<pre>';print_r($request::all());echo '</pre>';
	
	$order = new Order;
	$order->name = $request::all()['name'];
	$order->phone = $request::all()['phone'];
	
	$order->save();
	
	return redirect('/order');
	
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
