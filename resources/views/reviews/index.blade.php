@extends('layouts.app')

@section('content')
	@include('commons.navtabs')
	<h1 class="my-4">
		授業評価一覧
	</h1>
	@include('reviews.reviews')
@endsection