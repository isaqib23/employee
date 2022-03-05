@extends('layouts.app')        
<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
?>
@section('content')
<style>
	@keyframes check {0% {height: 0;width: 0;}
			25% {height: 0;width: 10px;}
			50% {height: 20px;width: 10px;}
		}
		.checkboxRadio{
			background-color:#fff;
			display:inline-block;
			height:28px;
			margin:0 .25em;
			width:28px;
			border-radius:4px;
			border:1px solid #ccc;
			margin-left:15px
		}
		.checkboxRadio span{
			display:block;
			height:28px;
			position:relative;
			width:28px;
			padding:0
		}
		.checkboxRadio span:after{
			-moz-transform:scaleX(-1) rotate(135deg);
			-ms-transform:scaleX(-1) rotate(135deg);
			-webkit-transform:scaleX(-1) rotate(135deg);
			transform:scaleX(-1) rotate(135deg);
			-moz-transform-origin:left top;
			-ms-transform-origin:left top;
			-webkit-transform-origin:left top;
			transform-origin:left top;
			border-right:4px solid #fff;
			border-top:4px solid #fff;
			content:'';
			display:block;
			height:20px;
			left:3px;
			position:absolute;
			top:15px;
			width:10px
		}
		.checkboxRadio span:hover:after{
			border-color:#999
		}
		.checkboxRadio input{
			display:none
		}
		.checkboxRadio input:checked + span:after{
			-webkit-animation:check .8s;
			-moz-animation:check .8s;
			-o-animation:check .8s;
			animation:check .8s;
			border-color:#555
		}
		.checkboxRadio input:checked + .default:after{
			border-color:#444
		}
		.checkboxRadio input:checked + .primary:after{
			border-color:#2196F3
		}
		.timercss{
			font-size: 25px;
			font-family: cursive;
			color: #FFEB3B !important;
		}
</style>

@if($evaluationCheck)
<div class="text-center p-2 col-md-12 text-white bg-primary border-top">
	<h3>You Already Evaluate to this Employee</h3>
</div>
@else

	<form method="POST" action="{{ route('employee.evaluation_store') }}">
	@csrf
		@if(Auth::user()->can_full_review)
			@if(Request::segment(2))
				@include("evaluation.hr")
			@else
				@include("evaluation.self")
			@endif
		@elseif(Auth::user()->is_hod)
			@if(Request::segment(2))
				@include("evaluation.manager")
			@else
				@include("evaluation.self")
			@endif
		@else
			@if(Request::segment(2))
			@include("evaluation.peer")
			@else
				@include("evaluation.self")
			@endif
		@endif

		<?php

	

	$user_id = (Request::segment(2)) ? base64_decode(Request::segment(2)) : Auth::user()->id ?>
		<input type="hidden" name="user_id" value="{{$user_id}}">
		<button class="btn btn-success btn-lg btn-block mt-3 mb-3">Submit</button>
	</form>
@endif
@endsection