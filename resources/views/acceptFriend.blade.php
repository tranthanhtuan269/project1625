@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-sm-12">{{ auth()->user()->name }}</div>
        <div class="col-sm-12">
            <accept-friend :initial-users="{{ $users }}"></accept-friend>
        </div>
    </div>
</div>
@endsection
