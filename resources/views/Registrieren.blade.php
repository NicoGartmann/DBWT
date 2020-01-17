@extends('app')

@section('title','Registrieren')

@section('content')
    <div class="row formA">
        <div class="col-12 card">
            <div class="card-body">
                {{view('RegistrierenForm')}}
            </div>
        </div>
    </div>
@endsection
