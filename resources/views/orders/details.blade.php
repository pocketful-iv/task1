@extends('layout.default')
@section('css')
    <style>
        a, a:hover {
            color: white;
        }
    </style>
@endsection
@section('content')
    <div class="container">

        <h2>{{isset($customer)?'Registracijos informacija':'Registracija'}}</h2>
        <hr/>
        @if(isset($customer))
            {!! Form::model($customer,['method'=>'put']) !!}
        @else
            {!! Form::open() !!}
        @endif
        <div class="form-group row">
            {!! Form::label("name","Vardas",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::text("name",null,["class"=>"form-control", "readonly"=>"true"]) !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label("equipment","Nardymo būdas",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::select("equipment",['Snorkelingas'=>'Snorkelingas','Daivingas'=>'Daivingas'],null,["class"=>"form-control", "readonly"=>"true"],["readonly"]) !!}
            </div>
        </div>
        <div class="form-group row required">
            {!! Form::label("email","El. paštas",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::text("email",null,["class"=>"form-control", "readonly"=>"true"]) !!}

            </div>
        </div>
        <div class="form-group row col-md-3 col-lg-2">
            <a href="{{url('/')}}" class="btn btn-danger">
                Grįžti į sąrašą</a>
        </div>
    </div>
    {!! Form::close() !!}
@endsection

