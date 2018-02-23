@extends('layout.default')
@section('css')
    <style>
        .form-group.required label:after {
            content: " *";
            color: red;
            font-weight: bold;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="intro">
            <img src="images/diving.png" class="rounded mx-auto d-block img-thumbnail" alt="nardymas" />
            <br>
            <h1 class="text-center">Nardymas</h1><br>
            <p class="text-center lead">Tai galimybė atrasti povandeninį pasaulį, kuria gali pasinaudoti bet kuris žmogus. Galbūt atrasite naują pomėgį, kuris suteiks jums nepakartojamų pojūčių!
                <br><br>
                Kaip jis vyksta?
                Šių pramogų metu gražiausi šalies ežerai Jums atvers savo nepažintą povandeninį pasaulį. Prieš nėrimą išdėstomi nardymo pagrindai, suteikiamas trumpas instruktažas. Prižiūrimas instruktoriaus, naujokas atlieka keletą pratimų vandenyje, o tada atliekamas 30-60 minučių trunkantis nėrimas. Jo metu instruktorius padės jums jaukiai jaustis po vandeniu, prižiūrės ir valdys jūsų įrangą, todėl jums nereikės daryti nieko sudėtingo, tik plaukti, žvalgytis ir grožėtis savita Lietuvos ežerų flora ir fauna.
                <br><br>
                Jeigu susidomėjote, prašome užpildyti registracijos formą. Greitu metu susisieksime! </p>
        </div>
        <h2>{{isset($customer)?'Registracijos informacija':'Registracija'}}</h2>
        <hr/>
        @if(isset($customer))
            {!! Form::model($customer,['method'=>'put']) !!}
        @else
            {!! Form::open() !!}
        @endif
        <div class="form-group row required">
            {!! Form::label("name","Vardas",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::text("name",null,["class"=>"form-control".($errors->has('name')?" is-invalid":""),"autofocus",'placeholder'=>'Vardas']) !!}
                {!! $errors->first('name','<span class="invalid-feedback">:message</span>') !!}
            </div>
        </div>
        <div class="form-group row">
            {!! Form::label("equipment","Nardymo būdas",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::select("equipment",['Snorkelingas'=>'Snorkelingas','Daivingas'=>'Daivingas'],null,["class"=>"form-control"]) !!}
            </div>
        </div>
        <div class="form-group row required">
            {!! Form::label("email","El. paštas",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
            <div class="col-md-8">
                {!! Form::text("email",null,["class"=>"form-control".($errors->has('email')?" is-invalid":""),'placeholder'=>'El. paštas']) !!}
                {!! $errors->first('email','<span class="invalid-feedback">:message</span>') !!}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3 col-lg-2"></div>
            <div class="col-md-4">
                {!! Form::button("Registruotis",["type" => "submit","class"=>"btn
            btn-primary"])!!}
                <a href="{{url('/')}}" class="btn btn-success">Visas sąrašas</a></div>
        </div>
        @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
        {!! Form::close() !!}
    </div>
@endsection