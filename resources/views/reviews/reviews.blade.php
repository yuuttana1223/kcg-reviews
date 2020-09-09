<div class="d-flex justify-content-between">
	<div>
		{{ link_to_route('reviews.create', '授業評価の投稿', [], ['class' => 'btn btn-primary btn-lg']) }}
	</div>
	{{ Form::open(['route' => 'search', 'method' => 'get']) }}
		<div class="form-inline my-2 my-lg-0">
			{{ Form::input('text', 'keyword', null, ['class' => 'form-control mr-sm-2', 'placeholder' => '授業名/先生名']) }}
			{{ Form::submit('検索', ['class' => 'btn btn-outline-success my-2 my-sm-0']) }}
		</div>
	{{ Form::close() }}
</div>

@foreach ($reviews as $review)
	@if (count($reviews) > 0)
		<div class="text-right mb-0 mt-4">
			<span>{{ $review->user->name . ' (' . $review->created_at . ')' }}</span>
		</div>
		
		<div class="row border border-dark rounded m-0">
			<div class="col-sm-6">
				<span class="font-weight-bold">授業名: </span>{{ $review->lesson }}
			</div>
			<div class="col-sm-3">
				<span class="font-weight-bold">先生の名前: </span>{{ $review->teacher }}
			</div>
			<div class="col-sm-3 text-right">
				<span class="font-weight-bold">学科: </span>{{ $review->department }}
			</div>
		</div>
		
		<div class="row border border-dark rounded m-0">
			<div class="col-sm-6">
				<span class="font-weight-bold">授業形式: </span>{{ $review->format }}
			</div>
			<div class="col-sm-6">
				<span class="font-weight-bold">期末テスト: </span>{{ $review->exists_test }}
			</div>
		</div>
		
		<div class="row border border-dark rounded m-0">
			<div class="col-sm-6">
				<span class="font-weight-bold">内容充実度: </span>{{ $review->content_fulfilling }}
			</div>
			<div class="col-sm-6">
				<span class="font-weight-bold">単位の取りやすさ: </span>{{ $review->has_taken_unit }}
			</div>
		</div>
		
		<div class="row border border-dark rounded m-0">
			<p class="col-sm-12">
				<span class="font-weight-bold">良い点: </span><br>
				<span style="word-wrap: break-word;">{{ $review->good_point }}</span>
			</p>
		</div>
		
		<div class="row border border-dark rounded m-0">
			<p class="col-sm-12">
				<span class="font-weight-bold">悪い点: </span><br>
				<span style="word-wrap: break-word;">{{ $review->bad_point }}</span>
			</p>
		</div>
		@if ($user->id === $review->user_id)
			<div class="d-flex justify-content-end">
				{{ link_to_route('reviews.edit', '編集', ['review' => $review->id], ['class' => 'btn btn-light']) }}
				
				{{ Form::model($review, ['route' => ['reviews.destroy', $review->id], 'method' => 'delete']) }}
					{{ Form::submit('削除', ['class' => 'btn btn-danger']) }}
				{{ Form::close() }}
			</div>
		@endif
	@endif
@endforeach
{{ $reviews->links() }}