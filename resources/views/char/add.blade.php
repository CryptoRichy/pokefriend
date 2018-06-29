@extends('layouts/main')

@section('content')
<div class="container">
    <div class="row wrapper-head">
        <div class="col-md-12">
            <div class="jumbotron">
                <div class="row">
                    <div class="col-md-8">
                        <h1 class="display-4">嗨！訓練家！</h1>
                        <p class="lead">歡迎來到PokeFriend，接下來讓我們來建立你的 Pokemon Go 訓練家資料吧，這樣就能讓你的朋友們看到你囉！</p>
                        <hr class="my-4">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <hr class="my-4">
                        @endif
                        <form method="post" action="{{ url('char/add') }}">
                        

                            @csrf
                            <div class="form-group">
                                <label for="inputCharName">訓練家名稱</label>
                                <input type="text" class="form-control" id="inputCharName" name="char_name" placeholder="請輸入你的訓練家名稱" value="{{old('char_name')}}">
                            </div>
                            <div class="form-group">
                                <label for="inputCharId">訓練家代碼</label>
                                <input type="text" class="form-control" id="inputCharId" name="char_id" placeholder="這裡打上你的訓練家代碼，總共12個數字" value="{{old('char_id')}}">
                            </div>
                            <div class="form-group">
                                <label for="inputCharLv">等級</label>
                                <input type="number" class="form-control" id="inputCharLv" name="char_lv" placeholder="這裡可以輸入等級讓其他人知道喔" value="{{old('char_lv')}}">
                            </div>
                            <div class="form-group">
                                <label for="inputCharLv">隊伍</label>
                                <div class="row">
                                    <div class="col-md-4 team-select">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="char_team" id="inputCharTeam1" value="red" <?php if(old('char_team') == 'red') echo "checked";?>>
                                            <label class="form-check-label" for="inputCharTeam1">
                                                紅隊 Red
                                            </label>
                                        </div>
                                        <img src="{{asset('img/red-team.svg')}}">
                                    </div>
                                    <div class="col-md-4 team-select">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="char_team" id="inputCharTeam2" value="yellow"  <?php if(old('char_team') == 'yellow') echo "checked";?>>
                                            <label class="form-check-label" for="inputCharTeam2">
                                                黃隊 Yellow
                                            </label>
                                        </div>
                                        <img src="{{asset('img/yellow-team.svg')}}">
                                    </div>
                                    <div class="col-md-4 team-select">
                                    <div class="form-check">
                                            <input class="form-check-input" type="radio" name="char_team" id="inputCharTeam3" value="blue"  <?php if(old('char_team') == 'blue') echo "checked";?>>
                                            <label class="form-check-label" for="inputCharTeam3">
                                                藍隊 Blue
                                            </label>
                                        </div>
                                        <img src="{{asset('img/blue-team.svg')}}">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">送出</button>
                        </form>
                    </div>

                    <div class="col-md-4">
                        <img src="http://imghere.imin.tw/300x650/">
                    </div>

                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection