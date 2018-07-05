<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="PokeFriend">
    <meta name="author" content="Min Hsieh">
    <title>PokeFriend</title>
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom_index.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <style>
      body {
        padding-top: 70px;
      }
      @media (min-width: 992px) {
        body {
          padding-top: 70px;
        }
      }
    </style>
    @section('style')
    @show()
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{url('/')}}">Poke Friend</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{$link->checkActive('/')}}">
                        <a class="nav-link" href="{{url('/')}}">首頁</a>
                    </li>
                    @if($user = Auth::user())
                    <li class="nav-item {{$link->checkActive('friend')}}">
                        <a class="nav-link" href="{{url('friend')}}">我的好友</a>
                    </li>
                    <li class="nav-item {{$link->checkActive(['char/list','char/add','char/edit/*'])}}">
                        <a class="nav-link" href="{{url('char/list')}}">我的角色</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('logout')}}">登出</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    @section('content')
    @show()
    <footer id="footer" style="margin-top:150px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>Made by <a href="mailto:oimintw@gmail.com">Min Hsieh</a>.</p>
                    <p>Css Template <a href="https://bootswatch.com/flatly/"  target="_blank" rel="nofollow">Bootswatch - Flaty</a>. Icons from <a href="http://fontawesome.io/" target="_blank"  rel="nofollow">Font Awesome</a>. Backend Framework <a href="https://laravel.com/" target="_blank" rel="nofollow">Laravel</a>.</p>
                    <p>Open Source on <a href="https://github.com/minhsieh/pokefriend">Github</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert2@7.21.1/dist/sweetalert2.all.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.min.js"></script>
    @section('js')
    @show()
</body>
</html>