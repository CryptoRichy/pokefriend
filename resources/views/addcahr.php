@extends('layouts/main')

@section('content')
<div class="container">
    <div class="row wrapper-head">
        <div class="col-md-8 col-md-2-offset">
            <div class="jumbotron">
                <h1 class="display-3">嗨！訓練家！</h1>
                <p class="lead">歡迎來到PokeFriend，接下來讓我們來建立你的 Pokemon Go 訓練家資料吧，這樣就能讓你的朋友們看到你囉！</p>
                <hr class="my-4">

                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection