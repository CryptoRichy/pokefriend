@extends('layouts/main')

@section('content')
<header class="bg-primary text-white">
      <div class="container text-center">
        <h1>Poke Friend</h1>
        <h3>幫你找出還有哪些Facebook的好友在玩Pokemon Go<br>快速查詢好友邀請代碼！</h3>
        <p class="lead">
            <a class="btn btn-lg btn-facebook" href="{{ url('auth/facebook') }}"><i class="fab fa-facebook-f"></i>使用 Facebook 登入</a>
        </p>
        <p class="mute"><small>PokeFriend只會取得您的臉書名稱、Email、大頭貼，以及使用此應用程式的好友名單</small></p>
        <p class="mute"><small>並不會將這些資料做為其他用途，或代替您PO文等</small></p>
      </div>
</header>
<div class="container">
    <div class="row wrapper-head">
        <div class="col-md-4">
            <div class="feature-item">
                <img src="http://imghere.imin.tw/240x380/">
                <h3>Device Mockups</h3>
                <p class="text-muted">Ready to use HTML/CSS device mockups, no Photoshop required!</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="feature-item">
                <img src="http://imghere.imin.tw/240x380/">
                <h3>Device Mockups</h3>
                <p class="text-muted">Ready to use HTML/CSS device mockups, no Photoshop required!</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="feature-item">
                <img src="http://imghere.imin.tw/240x380/">
                <h3>Device Mockups</h3>
                <p class="text-muted">Ready to use HTML/CSS device mockups, no Photoshop required!</p>
            </div>
        </div>

    </div>
</div>
@endsection