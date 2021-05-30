@extends('layouts.app')

@section('title_page',__('Nueva Rema'))

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('Nueva Rema')}}</h1>
                </div>
                <div class="col ">
                    <a class="btn btn-outline-info float-right"
                       href="{{route('remas.index')}}">
                        <i class="fa fa-list" aria-hidden="true"></i>&nbsp;<span class="d-none d-sm-inline">{{__('List')}}</span>
                    </a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="content">
        <div class="container-fluid">
            @include('layouts.partials.request_errors')

            {!! Form::open(['route' => 'remas.store','class' => 'form-loading-on-submit']) !!}
            <div class="form-row">
                @include('remas.fields')

                <div class="form-group col-sm-6">
                    <a href="{!! route('remas.index') !!}" class="btn btn-block btn-secondary">Cancelar</a>
                </div>
                <div class="form-group col-sm-6">
                    <button type="submit"  class="btn btn-block btn-success">Guardar</button>
                </div>

            </div>

            <br>


            {!! Form::close() !!}
        </div>
    </div>

@endsection
