@extends('layouts/main')

@section('content')
<div class="container">
    @if(\Session::has('success'))
    <div class="alert alert-success wrapper-head">
        {{\Session::get('success')}}
    </div>
    @endif

    @if(\Session::has('error'))
    <div class="alert alert-danger wrapper-head">
        {{\Session::get('error')}}
    </div>
    @endif
    <div class="row wrapper-head">
        <div class="col-md-12">
            <a class="btn btn-primary" href="{{url('char/add')}}"><i class="fas fa-plus"></i> 新增角色</a>
        </div>
    </div>
    <div class="row wrapper-head">
        <div class="col-md-12">
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
                        <td>
                            <img src="{{asset('img/'.$char->char_team.'-team.svg')}}" style="height:30px;">
                        </td>
                        <td>{{$char->char_name}}</td>
                        <td>{{$char->char_id}}</td>
                        <td>{{$char->char_lv}}</td>
                        <td>
                            <a class="btn btn-default" href="{{url('char/edit/'.$char->id)}}"><i class="fas fa-edit"></i></a>
                            <a class="btn btn-default btn-delete" href="javascript:;" data-id="{{$char->id}}"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
$(document).on('click', '.btn-delete',function(){
    var id = $(this).data('id');
    
    swal({
        title: '刪除',
        text: "請問是否確定要刪除此角色？"+id,
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '確定刪除',
        showLoaderOnConfirm: true
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url : "{{url('char/delete')}}",
                type: "POST",
                dataType: "json",
                data: {
                    id: id,
                    _token : "{{csrf_token()}}"
                },
                success: function(response){
                    if(response.result == 'success'){
                        swal('成功',response.msg,'success');
                    }else{
                        swal('錯誤',response.msg,'warning');
                    }
                },
                error: function(response){
                    swal('錯誤',response.msg,'warning');
                }
            });
            
        }
    })
});

</script>
@endsection