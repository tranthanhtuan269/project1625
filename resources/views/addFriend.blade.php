@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    	<div class="col-sm-12">{{ auth()->user()->name }}</div>
        <div class="col-sm-12">
            <relative-user :initial-users="{{ $users }}"></relative-user>
        </div>
    </div>
</div>
@endsection
