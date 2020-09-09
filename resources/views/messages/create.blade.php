@extends('layouts.app')

@section('content')
	<h1 class="my-4">
		掲示板投稿
	</h1>
	<div class="row">
		<div class="col-sm-6">
			{{ Form::model($message, ['route' => 'messages.store']) }}
				@include('messages.form')
				<div>
					{{ Form::submit('投稿', ['class' => 'btn btn-primary btn-block']) }}
				</div>
			{{ Form::close() }}
		</div>
	</div>
@endsection