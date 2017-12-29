<!-- resources/views/front.blade.php -->
@extends('layouts.app')

@section('form')
<h1>Pizza Builder</h1>
@include('common.errors')
<form action="{{ url('submit') }}" method="POST">
	<h2>1. Pick your pizza size</h2>
	<div class="radio_size">
		@foreach ($links as $link) 
			@if ($link->type=='size')<p><input name="size" type="radio" value="{{ $link->id }}" checked>{{ $link->title }}<span class="cost_size">= ${{ $link->cost }}</span></p>@endif
		@endforeach
	</div>
					
	<h2>2. ADD MEAT AND FISH INGREDIENTS</h2>
	<table class="ingridients" cellspacing="0">
		@foreach ($links as $link) 
			@if ($link->type=='mafi')<tr><td>{{ $link->title }}</td><td><div class="input_spiner"><input name="maf_{{ $link->id }}" type="text" value=""><div class="spiner"><a class="qty_plus" href="#">+</a><a class="qty_minus" href="#">-</a></div></div></td><td>x</td><td>${{ $link->cost }}</td><td class="total"></td></tr>@endif
		@endforeach
	</table>
	<h2>3. ADD VEGETABLES AND MUSHROOMS</h2>
	<table class="ingridients" cellspacing="0">
		@foreach ($links as $link) 
			@if ($link->type=='mafi')<tr><td>{{ $link->title }}</td><td><div class="input_spiner"><input name="vam_{{ $link->id }}" type="text" value=""><div class="spiner"><a class="qty_plus" href="#">+</a><a class="qty_minus" href="#">-</a></div></div></td><td>x</td><td>${{ $link->cost }}</td><td class="total"></td></tr>@endif
		@endforeach
	</table>
	<h2>4. ADD SOME CHEESES</h2>
	<table class="ingridients" cellspacing="0">
		@foreach ($links as $link) 
			@if ($link->type=='cheese')<tr><td>{{ $link->title }}</td><td><div class="input_spiner"><input name="cheese_{{ $link->id }}" type="text" value=""><div class="spiner"><a class="qty_plus" href="#">+</a><a class="qty_minus" href="#">-</a></div></div></td><td>x</td><td>${{ $link->cost }}</td><td class="total"></td></tr>@endif
		@endforeach
		
	</table>
					
	<div class="total">
		<div class="total_text">Total</div>
		<div class="total_sum"></div>
	</div>
					
	<h3 class="order_now">Order now</h3>
	<div class="form_item">
		<label for="user_name">YOUR NAME</label>
		<input id="user_name" name="name" type="text" value="">
	</div>
	<div class="form_item">
		<label for="user_phone">YOUR PHONE</label>
		<input id="user_phone" name="phone" type="text" value="">
	</div>
	<input id="edit-submit" name="op" value="submit" class="form-submit" type="submit">
</form>
@endsection

