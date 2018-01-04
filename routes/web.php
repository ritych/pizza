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

Route::get('/order/{id}', function ($id) {
	$orders = \App\Order::where('id', $id)->get();
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
	
	$ingridient = \App\Ingridient::all();
	$total_sum=0;
	$i=0;
	foreach ($request->post() as $key => $value){
		if (isset($value)){
			if ($key!='size'){
				
				if ($key!='name' && $key!='phone' && $key!='op'){
					$data=explode('_', $key);
					$wrkingr=$ingridient->where('id', $data[1]);
					
					foreach ($wrkingr as $ingr){
						$desc[$data[0]][$i]['title']=$ingr->title;
						$desc[$data[0]][$i]['cost']=$ingr->cost;
						$desc[$data[0]][$i]['count']=$value;
						$total_sum+=$ingr->cost*$value;
						$i++;
					}
				}
			}
			else{
				$wrkingr=$ingridient->where('id', $value);
				foreach ($wrkingr as $size){
					$desc['size']['title']=$size->title;
					$desc['size']['cost']=$size->cost;
					$total_sum+=$size->cost;
				}
			}
		}
	}
	$desc['total']=$total_sum;
	$desc['name']=$request->post('name');
	$desc['phone']=$request->post('phone');
	$order->description = serialize($desc);
	$order->save();
    return redirect('/order/'.$order->id);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
