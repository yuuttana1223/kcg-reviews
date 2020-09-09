@extends('layouts.app')

@section('content')

	<h1 class="my-4">
		授業評価編集
	</h1>
    	<div class="row">
    	<div class="col-sm-6">
        	{{ Form::model($review, ['route' => ['reviews.update', $review->id], 'method' => 'put']) }}
				@include('reviews.form')
				<div>
                	{{ Form::submit('更新', ['class' => 'btn btn-primary btn-block']) }}
				</div>
        	{{ Form::close() }}
    	</div>
	</div>
@endsection