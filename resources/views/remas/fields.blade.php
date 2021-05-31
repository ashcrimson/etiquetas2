<div class="row" id="root">


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

                    <!-- Run Field -->
                    <div class="form-group col-sm-4">

                        {!! Form::label('run', 'Run:') !!}

                        <div class="input-group ">

                            {!! Form::text('run', null, ['id' => 'run','class' => 'form-control','maxlength' => 8]) !!}
                            <div class="input-group-append">
                                <button class="btn btn-outline-success" type="button" @click="getDatosPaciente()">Consultar</button>
                            </div>
                        </div>


                    </div>

                    <!-- Dv Run Field -->
                    <div class="form-group col-sm-2">
                        {!! Form::label('dv_run', 'Dv Run:') !!}
                        {!! Form::text('dv_run', null, ['id' => 'dv_run','class' => 'form-control','maxlength' => 1]) !!}
                    </div>

                    <div class="form-group col-sm-12" style="padding: 0px; margin: 0px"></div>

                    <!-- Primer Nombre Field -->
                    <div class="form-group col-sm-3">
                        {!! Form::label('primer_nombre', 'Primer Nombre:') !!}
                        {!! Form::text('primer_nombre', null, ['id' => 'primer_nombre','class' => 'form-control','maxlength' => 255]) !!}
                    </div>

                    <!-- Segundo Nombre Field -->
                    <div class="form-group col-sm-3">
                        {!! Form::label('segundo_nombre', 'Segundo Nombre:') !!}
                        {!! Form::text('segundo_nombre', null, ['id' => 'segundo_nombre','class' => 'form-control','maxlength' => 255]) !!}
                    </div>

                    <!-- Apellido Paterno Field -->
                    <div class="form-group col-sm-3">
                        {!! Form::label('apellido_paterno', 'Apellido Paterno:') !!}
                        {!! Form::text('apellido_paterno', null, ['id' => 'apellido_paterno','class' => 'form-control','maxlength' => 255]) !!}
                    </div>

                    <!-- Apellido Materno Field -->
                    <div class="form-group col-sm-3">
                        {!! Form::label('apellido_materno', 'Apellido Materno:') !!}
                        {!! Form::text('apellido_materno', null, ['id' => 'apellido_materno','class' => 'form-control','maxlength' => 255]) !!}
                    </div>

                    <!-- Fecha Nac Field -->
                    <div class="form-group col-sm-3">
                        {!! Form::label('fecha_nac', 'Fecha Nac:') !!}
                        {!! Form::date('fecha_nac', null, ['id' => 'fecha_nac','class' => 'form-control','id'=>'fecha_nac']) !!}
                    </div>


                    <div class="form-group col-sm-3">
                        {!! Form::label('sexo', 'Sexo:') !!}<br>
                        <input type="checkbox" data-toggle="toggle" data-size="normal" data-on="M" data-off="F" data-style="ios" name="sexo" id="sexo"
                               value="1"
                            {{( !isset($paciente) || (isset($paciente) && $paciente->sexo) ) ? 'checked' : '' }}>
                    </div>
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

</div>

@push('scripts')
<script>
    const app = new Vue({
        el: '#root',
        created() {

        },
        data: {

        },
        methods: {
            async getDatosPaciente(){

                let run = $("#run").val();

                let url = "{{route('get.datos.paciente')}}"+"?run="+run;

                console.log('url',url);

                try{
                    let res = await axios.get(url);
                    let paciente = res.data.data;

                    console.log('respuesta',paciente);

                    $("#dv_run").val(paciente.dv_run);
                    $("#apellido_paterno").val(paciente.apellido_paterno);
                    $("#apellido_materno").val(paciente.apellido_materno);
                    $("#primer_nombre").val(paciente.primer_nombre);
                    $("#segundo_nombre").val(paciente.segundo_nombre);
                    $("#fecha_nac").val(paciente.fecha_nac);
                    $("#sexo").val(paciente.sexo);
                    $("#sigla_grado").val(paciente.sigla_grado);
                    $("#unid_rep_dot").val(paciente.unid_rep_dot);
                    $("#cond_alta_dot").val(paciente.cond_alta_dot);

                }catch (e) {
                    console.log(e.response);
                }
            }
        }
    });
</script>
@endpush
