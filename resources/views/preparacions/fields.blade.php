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

<div class="col-12">
    <div class="card card-outline card-success" id="fields_preparacion">
        <div class="card-header">
            <h3 class="card-title">Preparación de Medicamento</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="form-row">
            <!-- Fecha Admision Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('fecha_admision', 'Fecha Admision:') !!}
                {!! Form::date('fecha_admision', null, ['class' => 'form-control','id'=>'fecha_admision']) !!}
            </div>

            <!-- Responsable Id Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('responsable_id', 'Profesional A Cargo:') !!}
                {!! Form::number('responsable_id', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Droga Id Field -->
            <div class="form-group col-sm-6">
                <select-droga :items="drogas" v-model="droga" label="Droga"></select-droga>
            </div>

            <!-- Dosis Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('dosis', 'Dosis:') !!}
                {!! Form::number('dosis', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Dilucion Id Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('dilucion_id', 'Dilucion Id:') !!}
                {!! Form::number('dilucion_id', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Volumen Suero Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('volumen_suero', 'Volumen Suero:') !!}
                {!! Form::number('volumen_suero', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Volumen Agregado Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('volumen_agregado', 'Volumen Agregado:') !!}
                {!! Form::number('volumen_agregado', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Volumen Final Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('volumen_final', 'Volumen Final:') !!}
                {!! Form::number('volumen_final', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Bajada Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('bajada', 'Bajada:') !!}
                {!! Form::text('bajada', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
            </div>

            <!-- Medico Id Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('medico_id', 'Medico Id:') !!}
                {!! Form::number('medico_id', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Servicio Solicitante Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('servicio_solicitante', 'Servicio Solicitante:') !!}
                {!! Form::text('servicio_solicitante', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
            </div>

            <!-- Protocolo Id Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('protocolo_id', 'Protocolo Id:') !!}
                {!! Form::number('protocolo_id', null, ['class' => 'form-control']) !!}
            </div>

            <!-- Ciclo Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('ciclo', 'Ciclo:') !!}
                {!! Form::text('ciclo', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
            </div>

            <!-- Dia Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('dia', 'Dia:') !!}
                {!! Form::text('dia', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
            </div>

            <!-- Control Producto Terminado Field -->
            <div class="form-group col-sm-6 col-lg-6">
                {!! Form::label('control_producto_terminado', 'Control Producto Terminado:') !!}
                {!! Form::textarea('control_producto_terminado', null, ['class' => 'form-control','rows' => 4]) !!}
            </div>

            <!-- Entrega Conforme Enfermeria Field -->
            <div class="form-group col-sm-6 col-lg-6">
                {!! Form::label('entrega_conforme_enfermeria', 'Entrega Conforme Enfermeria:') !!}
                {!! Form::textarea('entrega_conforme_enfermeria', null, ['class' => 'form-control','rows' => 4]) !!}
            </div>

            <!-- refrigerar Field -->
            <div class="form-group col-sm-3">
                {!! Form::label('refrigerar', 'Refrigerar:') !!}<br>
                <input type="checkbox" data-toggle="toggle" data-size="normal" data-on="Si" data-off="No" data-style="ios" name="refrigerar" id="refrigerar"
                       value="1"
                        {{ ($preparacion->refrigerar ?? false) ? 'checked' : '' }}>
            </div>


            <!-- Proteger Luz Field -->
                <div class="form-group col-sm-3">
                    {!! Form::label('proteger_luz', 'Proteger Luz:') !!}<br>
                    <input type="checkbox" data-toggle="toggle" data-size="normal" data-on="Si" data-off="No" data-style="ios" name="proteger_luz" id="proteger_luz"
                           value="1"
                            {{ ($preparacion->proteger_luz ?? false)  ? 'checked' : '' }}>
                </div>


            </div>
        </div>
        <!-- /.card-body -->
    </div>
</div>




@push('scripts')
    <script>


        const vmPreparacionFields = new Vue({
            el: '#fields_preparacion',
            name: 'fields_preparacion',
            created() {

            },
            data: {
                loading : false,
                drogas: @json(\App\Models\Droga::all() ?? []),
                droga: @json($preparacion->droga ?? null),

                diluciones: @json(\App\Models\Dilucion::all() ?? []),
                dilucion: @json($preparacion->dilucion ?? null),

                protocolos: @json(\App\Models\Protocolo::all() ?? []),
                protocolo: @json($preparacion->protocolo ?? null),

            },
            methods: {



            }
        });
    </script>
@endpush
