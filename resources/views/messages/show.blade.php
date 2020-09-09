@extends('layouts.app')

@section('content')
    <div class="border p-4">
		@if ($user->id === $message->user_id)
			<div class="d-flex justify-content-end">
				{{ link_to_route('messages.edit', '編集', ['message' => $message->id], ['class' => 'btn btn-light']) }}
				
				{{ Form::model($message, ['route' => ['messages.destroy', $message->id], 'method' => 'delete']) }}
					{{ Form::submit('削除', ['class' => 'btn btn-danger']) }}
				{{ Form::close() }}
			</div>
		@endif
        <h1 class="h5 mb-4">
        	<span>タイトル: </span>
            <span>{{ $message->title }}</span>
        </h1>

        <p class="mb-5">
        	<span>本文:</span>
            <span>{{ $message->content }}</span>
        </p>

        <section>
            <h2 class="h5 mb-4">
                コメント
            </h2>

        </section>
    </div>
@endsection