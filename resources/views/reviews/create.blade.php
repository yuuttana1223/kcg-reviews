@extends('layouts.app')

@section('content')

    <h1>授業評価入力</h1>

    <div class="row">
        <div class="col-sm-6">
            {{ Form::model($review, ['route' => 'reviews.store']) }}

                <div class="form-group">
                    {{ Form::label('lesson', '授業名:', ['class' => 'mb-0 font-weight-bold']) }}
                    {{ Form::text('lesson', null, ['class' => 'form-control', 'placeholder' => '正式名称（半角・全角・大文字・小文字など）kingで確認']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('teacher', '先生の名前:', ['class' => 'mb-0 font-weight-bold']) }}
                    {{ Form::text('teacher', null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('department', '自分の学科:', ['class' => 'mb-0 font-weight-bold']) }}
                    {{ Form::text('department', null, ['class' => 'form-control']) }}
                </div>
                
                <p class="mb-0 font-weight-bold">授業形式:</p>
            	<div class="form-check form-check-inline">
    				{{ Form::radio('format', '対面', false, ['id' => 'format-one', 'class' => 'form-check-input']) }}
    				{{ Form::label('format-one', '対面', ['class' => 'form-check-label']) }}
				</div>
				<div class="form-check form-check-inline">
				    {{ Form::radio('format', 'オンライン', false, ['id' => 'format-two', 'class' => 'form-check-input']) }}
				    {{ Form::label('format-two', 'オンライン', ['class' => 'form-check-label']) }}
				</div>
				<div class="form-check form-check-inline">
				    {{ Form::radio('format', 'オンライン＋対面', false, ['id' => 'format-three', 'class' => 'form-check-input']) }}
				    {{ Form::label('format-three', 'オンライン＋対面', ['class' => 'form-check-label']) }}
				</div>
                <p class="mb-0 mt-2 font-weight-bold">期末テスト:</p>
            	<div class="form-check form-check-inline">
    				{{ Form::radio('exists_test', 'あり', false, ['id' => 'exists_test-one', 'class' => 'form-check-input']) }}
    				{{ Form::label('exists_test-one', 'あり', ['class' => 'form-check-label']) }}
				</div>
				<div class="form-check form-check-inline">
				    {{ Form::radio('exists_test', 'なし', false, ['id' => 'exists_test-two', 'class' => 'form-check-input']) }}
				    {{ Form::label('exists_test-two', 'なし', ['class' => 'form-check-label']) }}
				</div>
                <p class="mb-0 mt-2 font-weight-bold">内容充実度:</p>
            	<div class="form-check form-check-inline">
    				{{ Form::radio('content_fulfilling', '大変不満', false, ['id' => 'content_fulfilling-one', 'class' => 'form-check-input']) }}
    				{{ Form::label('content_fulfilling-one', '大変不満', ['class' => 'form-check-label']) }}
				</div>
				<div class="form-check form-check-inline">
				    {{ Form::radio('content_fulfilling', 'やや不満', false, ['id' => 'content_fulfilling-two', 'class' => 'form-check-input']) }}
				    {{ Form::label('content_fulfilling-two', 'やや不満', ['class' => 'form-check-label']) }}
				</div>
            	<div class="form-check form-check-inline">
    				{{ Form::radio('content_fulfilling', '普通', false, ['id' => 'content_fulfilling-three', 'class' => 'form-check-input']) }}
    				{{ Form::label('content_fulfilling-three', '普通', ['class' => 'form-check-label']) }}
				</div>
				<div class="form-check form-check-inline">
				    {{ Form::radio('content_fulfilling', 'やや満足', false, ['id' => 'content_fulfilling-four', 'class' => 'form-check-input']) }}
				    {{ Form::label('content_fulfilling-four', 'やや満足', ['class' => 'form-check-label']) }}
				</div>
            	<div class="form-check form-check-inline">
    				{{ Form::radio('content_fulfilling', '大変満足', false, ['id' => 'content_fulfilling-five', 'class' => 'form-check-input']) }}
    				{{ Form::label('content_fulfilling-five', '大変満足', ['class' => 'form-check-label']) }}
				</div>
				<div>
                <p class="mb-0 mt-2 font-weight-bold">単位の取りやすさ:</p>
            	<div class="form-check form-check-inline">
    				{{ Form::radio('has_taken_unit', '大変難しい', false, ['id' => 'has_taken_unit-one', 'class' => 'form-check-input']) }}
    				{{ Form::label('has_taken_unit-one', '大変難しい', ['class' => 'form-check-label']) }}
				</div>
				<div class="form-check form-check-inline">
				    {{ Form::radio('has_taken_unit', 'やや難しい', false, ['id' => 'has_taken_unit-two', 'class' => 'form-check-input']) }}
				    {{ Form::label('has_taken_unit-two', 'やや難しい', ['class' => 'form-check-label']) }}
				</div>
            	<div class="form-check form-check-inline">
    				{{ Form::radio('has_taken_unit', '普通', false, ['id' => 'has_taken_unit-three', 'class' => 'form-check-input']) }}
    				{{ Form::label('has_taken_unit-three', '普通', ['class' => 'form-check-label']) }}
				</div>
				<div class="form-check form-check-inline">
				    {{ Form::radio('has_taken_unit', 'やや易しい', false, ['id' => 'has_taken_unit-four', 'class' => 'form-check-input']) }}
				    {{ Form::label('has_taken_unit-four', 'やや易しい', ['class' => 'form-check-label']) }}
				</div>
            	<div class="form-check form-check-inline">
    				{{ Form::radio('has_taken_unit', '大変易しい', false, ['id' => 'has_taken_unit-five', 'class' => 'form-check-input']) }}
    				{{ Form::label('has_taken_unit-five', '大変易しい', ['class' => 'form-check-label']) }}
				</div>
            	<div class="form-group">
                    {{ Form::label('good_point', '良かった点:', ['class' => 'mt-2 font-weight-bold']) }}
                    {{ Form::textarea('good_point', null, ['class' => 'form-control']) }}
                </div>
            	<div class="form-group">
                    {{ Form::label('bad_point', '悪かった点:', ['class' => 'font-weight-bold']) }}
                    {{ Form::textarea('bad_point', null, ['class' => 'form-control']) }}
                </div>
				<div>
	                {{ Form::submit('投稿', ['class' => 'btn btn-primary btn-block']) }}
				</div>
            {{ Form::close() }}
        </div>
    </div>
@endsection