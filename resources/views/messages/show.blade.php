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
			<span style="word-wrap: break-word;">{{ $message->content }}</span>
		</p>

		<section>
			<h2 class="h5 mb-4">
				コメント
			</h2>
			@forelse($message->comments as $comment)
				<div class="border-top p-4">
					<span class="text-secondary">
						投稿者 {{ $comment->user->name }}
						投稿日時 {{ $comment->created_at }}
					</span>
					<p class="mt-2">
						<span style="word-wrap: break-word;">{{ nl2br(e($comment->content)) }}</span>
					</p>
                    <div>
                        @if (Auth::id() == $comment->user_id)
                            {!! Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'delete']) !!}
                                {!! Form::submit('削除', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        @endif
                    </div>
				</div>
			@empty
				<p>コメントはまだありません。</p>
			@endforelse
			
			{{ Form::open(['route' => 'comments.store']) }}
				{{ Form::hidden('message_id', $message->id) }}
				<div class="form-group">
					{{ Form::label('content', '本文:', ['class' => 'mt-2 font-weight-bold']) }}
					{{ Form::textarea('content', null, ['class' => 'form-control']) }}
				</div>
				<div>
					{{ Form::submit('投稿', ['class' => 'btn btn-primary']) }}
				</div>
			{{ Form::close() }}
		</section>
	</div>
@endsection