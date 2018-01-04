@extends('layouts.app')
@section('form')
	<h1>Pizza Builder</h1>
	<?php $desc=unserialize($orders[0]->description);?>
		
	<h2 class="thanks_text">Thank uo for your order {{$orders[0]->name}} we will contact you asap</h2>
	<h2>1. your pizza size</h2>
	<table class="ingridients" cellspacing="0">
		<tr><td>{{$desc['size']['title']}}</td><td></td><td></td><td></td><td class="total">= ${{$desc['size']['cost']}}</td></tr>	
	</table>
	<h2>2. MEAT AND FISH INGREDIENTS</h2>
	<table class="ingridients" cellspacing="0">
		@if(isset($desc['mafi']))
		@foreach ($desc['mafi'] as $ingr) 
			<tr><td>{{$ingr['title']}}</td><td>{{$ingr['count']}}</td><td>x</td><td>${{$ingr['cost']}}</td><td class="total">= ${{$ingr['cost']*$ingr['count']}}</td></tr>		
		@endforeach		
		@endif
	</table>
	<h2>3. VEGETABLES AND MUSHROOMS</h2>
	<table class="ingridients" cellspacing="0">
		@if(isset($desc['vam']))
		@foreach ($desc['vam'] as $ingr) 
			<tr><td>{{$ingr['title']}}</td><td>{{$ingr['count']}}</td><td>x</td><td>${{$ingr['cost']}}</td><td class="total">= ${{$ingr['cost']*$ingr['count']}}</td></tr>		
		@endforeach	
		@endif		
	</table>
	<h2>4. CHEESES</h2>
	<table class="ingridients" cellspacing="0">
		@if(isset($desc['cheese']))
		@foreach ($desc['cheese'] as $ingr) 
			<tr><td>{{$ingr['title']}}</td><td>{{$ingr['count']}}</td><td>x</td><td>${{$ingr['cost']}}</td><td class="total">= ${{$ingr['cost']*$ingr['count']}}</td></tr>		
		@endforeach	
		@endif		
	</table>
				
	<div class="total">
		<div class="total_text">Total</div>
		<div class="total_sum">${{$desc['total']}}</div>
	</div>
@endsection