@extends('layouts/main')

@section('content')
<header class="bg-primary text-white">
      <div class="container text-center">
        <h1><img src="{{asset('img/pokefriend-logo.png')}}" style="max-width:300px;"></h1>
        
        <h3>幫你找出還有哪些Facebook的好友在玩Pokemon Go<br>快速查詢好友邀請代碼！</h3>
        @if(Auth::check())
        <p class="lead">
            <a class="btn btn-lg btn-success" href="{{ url('friend') }}"><i class="fas fa-user-friends"></i>我的好友</a>
        </p>
        @else
        <p class="lead">
            <a class="btn btn-lg btn-facebook" href="{{ url('auth/facebook') }}"><i class="fab fa-facebook-f"></i>使用 Facebook 登入</a>
        </p>
        @endif
        
        <p class="mute"><small>PokeFriend只會取得您的臉書名稱、Email、大頭貼，以及使用此應用程式的好友名單</small></p>
        <p class="mute"><small>並不會將這些資料做為其他用途，或代替您PO文等</small></p>
      </div>
</header>
<div class="container">
    <div class="row wrapper-head">
        <div class="col-md-4">
            <div class="feature-item">
                <img src="{{asset('img/pokefriend-index-image-01.png')}}" style="max-width:340px;">
                <h3>有哪些朋友？</h3>
                <p class="text-muted">不知道還有哪些Facebook上的好友也還有在玩 PokemonGo 呢？好想跟大家加好友啊！</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="feature-item">
                <img src="{{asset('img/pokefriend-index-image-02.png')}}" style="max-width:340px;">
                <h3>資訊分享</h3>
                <p class="text-muted">將您的 PokemonGo 的訓練家資訊分享給其他人，讓大家來加你好友、互相送禮物！</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="feature-item">
                <img src="{{asset('img/pokefriend-index-image-03.png')}}" style="max-width:340px;">
                <h3>好友ID查詢</h3>
                <p class="text-muted">阿明的寶可夢ID取超長超亂的，好友太多都忘記是誰了，到底是哪個ID呢？</p>
            </div>
        </div>

    </div>
</div>
@endsection