@extends('layouts/main')

@section('content')
<div class="container" id="f_list">
    <h2 class="wrapper-head">你的Facebook好友們</h2>
    <div class="row wrapper-head">
        <div class="col-md-4">
            <input class="form-control form-control-sm search" placeholder="關鍵字搜尋"/>
        </div>
        <div class="col-md-8">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="sort_dropdown_btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    排序
                </button>
                <div class="dropdown-menu" aria-labelledby="sort_dropdown_btn">
                    <a class="dropdown-item sort" href="javascript:;" data-sort="l_fb_name">臉書名稱</a>
                    <a class="dropdown-item sort" href="javascript:;" data-sort="l_name">角色名稱</a>
                    <a class="dropdown-item sort" href="javascript:;" data-sort="l_id">代碼</a>
                    <a class="dropdown-item sort" href="javascript:;" data-sort="l_lv">等級</a>
                    <a class="dropdown-item sort" href="javascript:;" data-sort="l_team">隊伍</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row wrapper-head list">
            @foreach($f_chars as $one)
            <div class="col-md-4">
                <div class="card border-primary l_item">
                    <div class="card-header">
                        <img src="{{asset('img/'.$one->char_team.'-team.svg')}}" style="height:40px;">
                        <img src="{{asset('avatars/'.$one->avatar.'.jpg')}}" style="width:50px;margin-left:15px;margin-right:15px;">
                        <span class="l_fb_name">{{$one->name}}</span>
                    </div>
                    <span class="l_team" style="display:none;">{{$one->char_team}}</span>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><span class="badge badge-primary">名稱</span> <span class="l_name">{{$one->char_name}}</span></li>
                        <li class="list-group-item"><span class="badge badge-primary">代碼</span>  <span class="l_id">{{$one->char_id}}</span></li>
                        <li class="list-group-item"><span class="badge badge-primary">等級</span>  Lv: <span class="l_lv">{{$one->char_lv}}</span></li>
                        
                    </ul>
                </div>
            </div>
            @endforeach
    </div>
</div>
@endsection

@section("js")
<script src="{{asset('js/list.min.js')}}"></script>

<script>
var options = {
  valueNames: [ 'l_fb_name', 'l_team', 'l_name', 'l_id', 'l_lv'],
  item: 'l_item'
};

var userList = new List('f_list', options);
</script>
@endsection