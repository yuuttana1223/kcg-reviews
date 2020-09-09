@extends('layouts.app')

@section('content')
	@include('commons.navtabs')
	<h1 class="my-4">
		掲示板一覧
	</h1>
	<div class="my-4">
		{{ link_to_route('messages.create', '投稿を新規作成する', [], ['class' => 'btn btn-primary']) }}
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
						投稿日時 {{ $message->created_at }}
					</span>
				</div>
			</div>
		@endforeach
@endsection