@extends('layouts.app')

@section('content')
    @if (Auth::check())
        @include('reviews.index')
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>京都コンピュータ学院の授業評価を<br>
                    みんなで共有しよう！
                </h1>
                {{ link_to_route('signup.get', '会員登録', [], ['class' => 'btn btn-lg btn-primary']) }}
                {{ link_to_route('login', 'ログイン', [], ['class' => 'btn btn-lg btn-primary']) }}
            </div>
        </div>
    @endif
@endsection