@extends('layouts/main')

@section('content')
<div class="container">
    Welcome {{ Auth::user()['name'] }}
</div>
@endsection