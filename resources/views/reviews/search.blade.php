@extends('layouts.app')

@section('content')
	<h1 class="my-4 ">
		{{ $keyword }}の検索結果
	</h1>
	@include('reviews.reviews')
@endsection