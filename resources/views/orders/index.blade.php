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
        <div class="float-right">
            <a href="{{url('/create')}}" class="btn btn-primary">Registracija</a>
        </div>
        <h1 style="font-size: 2.2rem">Registracijų sąrašas</h1>
        <hr/>
        {!! Form::open(['method'=>'get']) !!}
        <div class="row">
            <div class="col-sm-4 form-group">
                {!! Form::select('equipment',['-1'=>'Pasirinkite nardymo būdą','Snorkelingas'=>'Snorkelingas','Daivingas'=>'Daivingas'],null,['class'=>'form-control','onChange'=>'form.submit()']) !!}
            </div>
            <div class="col-sm-5 form-group">
                <div class="input-group">
                    <input class="form-control" id="search"
                           value="{{ request('search') }}"
                           placeholder="Ieškoti pagal vardą" name="search"
                           type="text"/>
                    <div class="input-group-btn">
                        <button type="submit" class="btn btn-warning">
                            Ieškoti
                        </button>
                    </div>
                </div>
            </div>
            <input type="hidden" value="{{request('field')}}" name="field"/>
            <input type="hidden" value="{{request('sort')}}" name="sort"/>
        </div>
        {!! Form::close() !!}
        <table class="table table-bordered bg-light">
            <thead class="bg-success" style="color: white">
            <tr>
                <th width="60px" style="vertical-align: middle;text-align: center">Nr.</th>
                <th style="vertical-align: middle">
                    <a href="{{url('/')}}?search={{request('search')}}&equipment={{request('equipment')}}&field=name&sort={{request('sort','asc')=='asc'?'desc':'asc'}}">
                        Vardas
                    </a>
                    {{request('field','name')=='name'?(request('sort','asc')=='asc'?'▴':'▾'):''}}
                </th>
                <th style="vertical-align: middle">
                    <a href="{{url('/')}}?search={{request('search')}}&equipment={{request('equipment')}}&field=equipment&sort={{request('sort','asc')=='asc'?'desc':'asc'}}">
                        Nardymo būdas
                    </a>
                    {{request('field')=='equipment'?(request('sort','asc')=='asc'?'▴':'▾'):''}}
                </th>
                <th style="vertical-align: middle">
                    <a href="{{url('/')}}?search={{request('search')}}&equipment={{request('equipment')}}&field=email&sort={{request('sort','asc')=='asc'?'desc':'asc'}}">
                        El. paštas
                    </a>
                    {{request('field')=='email'?(request('sort','asc')=='asc'?'▴':'▾'):''}}
                </th>
                <th width="130px" style="vertical-align: middle"></th> <!--Plačiau-->
            </tr>
            </thead>
            <tbody>
            @php
                $i=1;
            @endphp
            @foreach($customers as $customer)
                <tr>
                    <th style="vertical-align: middle;text-align: center">{{$i++}}</th>
                    <td style="vertical-align: middle">{{ $customer->name }}</td>
                    <td style="vertical-align: middle">{{ $customer->equipment }}</td>
                    <td style="vertical-align: middle">{{ $customer->email}}</td>
                    <td style="vertical-align: middle" align="center">
                        <form id="frm_{{$customer->id}}"
                               method="post" style="padding-bottom: 0px;margin-bottom: 0px">
                            <a class="btn btn-dark btn-sm" title="Edit"
                               href="{{url('/details/'.$customer->id)}}">
                               Peržiūrėti</a>
                            {{csrf_field()}}
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <nav>
            <ul class="pagination justify-content-end">
                {{$customers->links('vendor.pagination.bootstrap-4')}}
            </ul>
        </nav>
    </div>
@endsection