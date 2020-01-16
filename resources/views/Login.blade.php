@extends('app')

@section('title','Login')

@section('content')
    <div class="row formA">
        <div class="col-12 card">
            <div class="card-body">
                {{view('LoginForm')}}
            </div>
        </div>
    </div>
@endsection
