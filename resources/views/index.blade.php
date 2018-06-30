@extends('layouts/main')

@section('content')
<div class="container">
    <div class="row wrapper-head">
        @foreach($f_chars as $one)
        <div class="col-md-4">
        <div class="card border-primary">
            <div class="card-header"><img src="{{asset('img/'.$one->char_team.'-team.svg')}}" style="height:40px;"><img src="{{asset('avatars/'.$one->avatar.'.jpg')}}" style="width:50px;margin-left:15px;margin-right:15px;">{{$one->name}}</div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><span class="badge badge-primary">名稱</span>  {{$one->char_name}}</li>
                <li class="list-group-item"><span class="badge badge-primary">代碼</span>  {{$one->char_id}}</li>
                <li class="list-group-item"><span class="badge badge-primary">等級</span>  Lv: {{$one->char_lv}}</li>
            </ul>
            <div class="card-footer">Last Updated: {{$one->updated_at}}</div>
        </div>
        </div>
        @endforeach
    </div>
</div>
@endsection