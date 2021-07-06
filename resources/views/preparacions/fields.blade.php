<!-- Fecha Admision Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_admision', 'Fecha Admision:') !!}
    {!! Form::date('fecha_admision', null, ['class' => 'form-control','id'=>'fecha_admision']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#fecha_admision').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Paciente Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('paciente_id', 'Paciente Id:') !!}
    {!! Form::number('paciente_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Profesional A Cargo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('profesional_a_cargo', 'Profesional A Cargo:') !!}
    {!! Form::text('profesional_a_cargo', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Responsable Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('responsable_id', 'Responsable Id:') !!}
    {!! Form::number('responsable_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Droga Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('droga_id', 'Droga Id:') !!}
    {!! Form::number('droga_id', null, ['class' => 'form-control']) !!}
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
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('control_producto_terminado', 'Control Producto Terminado:') !!}
    {!! Form::textarea('control_producto_terminado', null, ['class' => 'form-control']) !!}
</div>

<!-- Entrega Conforme Enfermeria Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('entrega_conforme_enfermeria', 'Entrega Conforme Enfermeria:') !!}
    {!! Form::textarea('entrega_conforme_enfermeria', null, ['class' => 'form-control']) !!}
</div>

<!-- Refrigerar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Refrigerar', 'Refrigerar:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('Refrigerar', 0) !!}
        {!! Form::checkbox('Refrigerar', '1', null) !!}
    </label>
</div>


<!-- Proteger Luz Field -->
<div class="form-group col-sm-6">
    {!! Form::label('proteger_luz', 'Proteger Luz:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('proteger_luz', 0) !!}
        {!! Form::checkbox('proteger_luz', '1', null) !!}
    </label>
</div>


<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado_id', 'Estado Id:') !!}
    {!! Form::number('estado_id', null, ['class' => 'form-control']) !!}
</div>
