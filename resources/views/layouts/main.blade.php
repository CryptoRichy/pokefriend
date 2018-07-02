<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="This is a bare framework for bootstrap">
    <meta name="author" content="Min Hsieh">
    <title>PokeFriend</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('css/custom_index.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <!-- <link href="{{asset('css/new_age.css')}}" rel="stylesheet"> -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert2@7.21.1/dist/sweetalert2.all.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.min.js"></script>
    <!-- Custom styles for this template -->
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
            <a class="navbar-brand" href="javascript:;">Poke Friend</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('/')}}">首頁</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">關於PokeFriend</a>
                    </li>
                    @if(isset($user))
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:;">{{$user->name}}</a>
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
    <!-- Bootstrap core JavaScript -->

    @section('js')
    @show()
</body>
</html>