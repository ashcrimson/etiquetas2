


    <div class="col-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Datos Personales</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-row">
                    @include('pacientes.fields')
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

    <div class=" col-sm-12">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Datos de REMA</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-row">


{{--                    <!-- Numero Unidad Field -->--}}
{{--                    <div class="form-group col-sm-6">--}}
{{--                        {!! Form::label('numero_unidad', 'Numero Unidad:') !!}--}}
{{--                        {!! Form::text('numero_unidad', null, ['class' => 'form-control','maxlength' => 255]) !!}--}}
{{--                    </div>--}}

{{--                    <!-- Nombres Conductor Field -->--}}
{{--                    <div class="form-group col-sm-6">--}}
{{--                        {!! Form::label('nombres_conductor', 'Nombres Conductor:') !!}--}}
{{--                        {!! Form::text('nombres_conductor', null, ['class' => 'form-control','maxlength' => 255]) !!}--}}
{{--                    </div>--}}

{{--                    <!-- Apellidos Conductor Field -->--}}
{{--                    <div class="form-group col-sm-6">--}}
{{--                        {!! Form::label('apellidos_conductor', 'Apellidos Conductor:') !!}--}}
{{--                        {!! Form::text('apellidos_conductor', null, ['class' => 'form-control','maxlength' => 255]) !!}--}}
{{--                    </div>--}}

                    <!-- Hora De Llamada Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('hora_de_llamada', 'Hora De Llamada:') !!}
                        {!! Form::time('hora_de_llamada', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Hora De Salida Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('hora_de_salida', 'Hora De Salida:') !!}
                        {!! Form::time('hora_de_salida', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- Hora De Llegada Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('hora_de_llegada', 'Hora De Llegada:') !!}
                        {!! Form::time('hora_de_llegada', null, ['class' => 'form-control']) !!}
                    </div>

                    <!-- User Id Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('user_id', 'Responsable:') !!}
                        {!! Form::text('user', auth()->user()->name, ['class' => 'form-control','readonly']) !!}
                    </div>

                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>


    <div class="col-sm-12 mb-3">
        <div class="card card-outline card-info ">
            <div class="card-header">
                <h3 class="card-title">Datos Atención</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-row">
                    @include('paciente_atencions.fields')
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>

