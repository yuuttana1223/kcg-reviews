<div class="form-group">
	{{ Form::label('title', 'タイトル:', ['class' => 'mb-0 font-weight-bold']) }}
	{{ Form::text('title', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
	{{ Form::label('content', '本文:', ['class' => 'mb-0 font-weight-bold']) }}
	{{ Form::textarea('content', null, ['class' => 'form-control']) }}
</div>
