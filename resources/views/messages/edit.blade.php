@extends('layouts.app')

@section('content')
	<h1 class="my-4">
		投稿の編集
	</h1>
	<div class="row">
		<div class="col-sm-6">
			{{ Form::model($message, ['route' => ['messages.update', $message->id], 'method' => 'put']) }}
				@include('messages.form')
				<div>
					{{ Form::submit('更新', ['class' => 'btn btn-primary btn-block']) }}
				</div>
			{{ Form::close() }}
		</div>
	</div>
@endsection