@extends('layouts.app')

@section('content')
	@include('commons.navtabs')
	<h1 class="my-4">
		掲示板
	</h1>
	<div class="my-4 ">
		{{ link_to_route('messages.create', '投稿を新規作成する', [], ['class' => 'btn btn-primary btn-lg']) }}
	</div>
		@foreach ($messages as $message)
			<div class="card mb-4">
				<div class="card-header">
					<span>タイトル: </span>
					<span>{{ $message->title }}</span>
				</div>
				<div class="card-body">
					<p class="card-text">
						{{ $message->content }}
					</p>
					
					{{ link_to_route('messages.show', '続きを読む', $message->id, ['class' => 'card-link']) }}
				</div>
				<div class="card-footer">
					<span class="mr-2">
						投稿者 {{ $message->user->name }}
					</span>
					<span class="mr-2">
						投稿日時 {{ $message->created_at }}
					</span>
					@if ($message->comments->count())
						<span class="badge badge-primary">
							コメント {{ $message->comments->count() }}件
						</span>
					@endif
				</div>
			</div>
		@endforeach
	{{ $messages->links() }}
@endsection