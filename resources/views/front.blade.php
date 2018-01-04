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
			@if ($link->type=='mafi')<tr><td>{{ $link->title }}</td><td><div class="input_spiner"><input name="mafi_{{ $link->id }}" type="text" value=""><div class="spiner"><a class="qty_plus" href="#">+</a><a class="qty_minus" href="#">-</a></div></div></td><td>x</td><td>${{ $link->cost }}</td><td class="total"></td></tr>@endif
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

@section('scripts')
<script>
	$( document ).ready(function() {
		setup();
	});
	$(".qty_plus").click(function(e){
		e.preventDefault();
		var currentVal = parseInt($(this).parent().prev().val());
		if (!isNaN(currentVal) ) { 
			$(this).parent().prev().val(currentVal + 1);
			$multiply=$(this).parent().parent().parent().next().next().text();
			$multiply=$multiply.replace(/\$/i, '');
			$count=$multiply*(currentVal + 1);
			$(this).parent().parent().parent().next().next().next().text(' = $' + $count.toFixed(2));
		} 
		else {
			$(this).parent().prev().val(1);
			$multiply=$(this).parent().parent().parent().next().next().text();
			$(this).parent().parent().parent().next().next().next().text(' = ' + $multiply);
		}
		total_sum();
		
	});
	$(".qty_minus").click(function(e) {e.preventDefault();
		var currentVal = parseInt($(this).parent().prev().val());
		if (!isNaN(currentVal) && currentVal !=1) {
			$(this).parent().prev().val(currentVal - 1);
			$multiply=$(this).parent().parent().parent().next().next().text();
			$multiply=$multiply.replace(/\$/i, '');
			$count=$multiply*(currentVal - 1);
			$(this).parent().parent().parent().next().next().next().text(' = $' + $count.toFixed(2));
		} 
		else {
			$(this).parent().prev().val('');
			$(this).parent().parent().parent().next().next().next().text('');
		}
		total_sum();
	});
	
	$( ".radio_size input[type=radio]" ).click(function(){
		$( ".radio_size input[type=radio]" ).each(function(){
			$(this).parent().removeClass('active');
		});
		$(this).parent().toggleClass('active');
		total_sum();
	});
	
	function setup(){
		$( ".radio_size input[type=radio]:checked" ).parent().toggleClass('active');
		$(".ingridients td input").each(function(){
			$count=$(this).val();
			console.log($count);
			if ($count!=''){
				$val=$(this).parent().parent().next().next().text();
				$val=$val.replace(/\$/i, '');
				$total=$count*$val;
				$(this).parent().parent().next().next().next().text(' = $' + $total.toFixed(2));
			}
		})
		total_sum();
	}
	
	function total_sum(){
		var $total_sum=0;
		$('td.total').each(function(){
			$wrk_sum=$(this).text();
			if (isNaN($wrk_sum)){
				$wrk_sum=$wrk_sum.replace(/= \$/i, '');
				$wrk_sum=parseFloat($wrk_sum);
				$total_sum+=$wrk_sum;
			}
		});
		$size_cost=$( ".radio_size input[type=radio]:checked" ).next().text();
		$size_cost=parseFloat($size_cost.replace(/= \$/i, ''));
		$total_sum+=$size_cost;
		$('div.total_sum').text('$'+$total_sum.toFixed(2));
	}
			
</script>
@endsection

