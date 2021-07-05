@extends('layouts.app')

@section('title_page',__('Droga'))

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('Droga')}}</h1>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="content">
        <div class="card card-primary">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-sm-12">
                        @include('drogas.show_fields')
                        <a href="{{ route('drogas.index') }}" class="btn btn-default">
                        {{__('Back')}}
                        </a>
                        &nbsp;
                        <a href="{{ route('drogas.imprimir',$droga->id) }}" class="btn btn-default">
                            <i class="fa fa-print"></i> Imprimir
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
