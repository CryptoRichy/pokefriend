@extends('layouts/main')

@section('content')
<div class="container">
    <div class="row wrapper-head">
        <div class="col-md-12">
            <button class="btn btn-success"><i class="fas fa-plus"></i> 新增紀錄</button>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">隊伍</th>
                        <th scope="col">名稱</th>
                        <th scope="col">代號</th>
                        <th scope="col">等級</th>
                        <th scope="col">動作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($chars as $char)
                    <tr>
                        <td>{{$char->char_team}}</td>
                        <td>{{$char->char_name}}</td>
                        <td>{{$char->char_id}}</td>
                        <td>{{$char->char_lv}}</td>
                        <td>
                            <a class="btn btn-default" href="{{url('char/edit/'.$one->id)}}"><i class="fas fa-edit"></i></a>
                            <a class="btn btn-default"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection