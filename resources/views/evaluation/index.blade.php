@extends('layouts.app')        

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

<form method="POST" action="{{ route('employee.evaluation_store') }}">
@csrf
	@if(Auth::user()->can_full_review)
	@include("evaluation.hr")
	@elseif(Auth::user()->is_hod)
	@include("evaluation.manager")
	@else
	@include("evaluation.self")
	@endif

	<button class="btn btn-success btn-lg btn-block mt-3 mb-3">Submit</button>
</form>
@endsection