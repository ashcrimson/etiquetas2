<!-- Rut Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rut', 'Rut:') !!}
    {!! Form::text('rut', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Razon Social Field -->
<div class="form-group col-sm-6">
    {!! Form::label('razon_social', 'Razon Social:') !!}
    {!! Form::text('razon_social', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Direccion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('direccion', 'Direccion:') !!}
    {!! Form::text('direccion', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Formalizado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('formalizado', 'Formalizado:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('formalizado', 0) !!}
        {!! Form::checkbox('formalizado', '1', null) !!}
    </label>
</div>


<!-- Acuerdo Comercial Field -->
<div class="form-group col-sm-6">
    {!! Form::label('acuerdo_comercial', 'Acuerdo Comercial:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('acuerdo_comercial', 0) !!}
        {!! Form::checkbox('acuerdo_comercial', '1', null) !!}
    </label>
</div>


<!-- Tramite Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tramite', 'Tramite:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('tramite', 0) !!}
        {!! Form::checkbox('tramite', '1', null) !!}
    </label>
</div>


<!-- Historico Field -->
<div class="form-group col-sm-6">
    {!! Form::label('historico', 'Historico:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('historico', 0) !!}
        {!! Form::checkbox('historico', '1', null) !!}
    </label>
</div>


<!-- Inicio Vigencia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('inicio_vigencia', 'Inicio Vigencia:') !!}
    {!! Form::date('inicio_vigencia', null, ['class' => 'form-control','id'=>'inicio_vigencia']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#inicio_vigencia').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Termino Vigencia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('termino_vigencia', 'Termino Vigencia:') !!}
    {!! Form::date('termino_vigencia', null, ['class' => 'form-control','id'=>'termino_vigencia']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#termino_vigencia').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Observacion Termino Field -->
<div class="form-group col-sm-6">
    {!! Form::label('observacion_termino', 'Observacion Termino:') !!}
    {!! Form::text('observacion_termino', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Observaciones Field -->
<div class="form-group col-sm-6">
    {!! Form::label('observaciones', 'Observaciones:') !!}
    {!! Form::text('observaciones', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>
