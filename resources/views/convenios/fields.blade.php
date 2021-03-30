<!-- Entidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('entidad', 'Entidad:') !!}
    {!! Form::text('entidad', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Atencion Urgencia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('atencion_urgencia', 'Atencion Urgencia:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('atencion_urgencia', 0) !!}
        {!! Form::checkbox('atencion_urgencia', '1', null) !!}
    </label>
</div>


<!-- Consulta Especialidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('consulta_especialidad', 'Consulta Especialidad:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('consulta_especialidad', 0) !!}
        {!! Form::checkbox('consulta_especialidad', '1', null) !!}
    </label>
</div>


<!-- Laboratorio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('laboratorio', 'Laboratorio:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('laboratorio', 0) !!}
        {!! Form::checkbox('laboratorio', '1', null) !!}
    </label>
</div>


<!-- Rayos X E Imagenologia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rayos_x_e_imagenologia', 'Rayos X E Imagenologia:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('rayos_x_e_imagenologia', 0) !!}
        {!! Form::checkbox('rayos_x_e_imagenologia', '1', null) !!}
    </label>
</div>


<!-- Procedimiento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('procedimiento', 'Procedimiento:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('procedimiento', 0) !!}
        {!! Form::checkbox('procedimiento', '1', null) !!}
    </label>
</div>


<!-- Hospitalizacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hospitalizacion', 'Hospitalizacion:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('hospitalizacion', 0) !!}
        {!! Form::checkbox('hospitalizacion', '1', null) !!}
    </label>
</div>


<!-- Urologia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('urologia', 'Urologia:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('urologia', 0) !!}
        {!! Form::checkbox('urologia', '1', null) !!}
    </label>
</div>


<!-- Cirugia Mediana Complejidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cirugia_mediana_complejidad', 'Cirugia Mediana Complejidad:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('cirugia_mediana_complejidad', 0) !!}
        {!! Form::checkbox('cirugia_mediana_complejidad', '1', null) !!}
    </label>
</div>


<!-- Otorrinolaringologia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('otorrinolaringologia', 'Otorrinolaringologia:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('otorrinolaringologia', 0) !!}
        {!! Form::checkbox('otorrinolaringologia', '1', null) !!}
    </label>
</div>


<!-- Medicina Nuclear Field -->
<div class="form-group col-sm-6">
    {!! Form::label('medicina_nuclear', 'Medicina Nuclear:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('medicina_nuclear', 0) !!}
        {!! Form::checkbox('medicina_nuclear', '1', null) !!}
    </label>
</div>


<!-- Hemodinamia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hemodinamia', 'Hemodinamia:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('hemodinamia', 0) !!}
        {!! Form::checkbox('hemodinamia', '1', null) !!}
    </label>
</div>


<!-- Medicina Complementaria Field -->
<div class="form-group col-sm-6">
    {!! Form::label('medicina_complementaria', 'Medicina Complementaria:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('medicina_complementaria', 0) !!}
        {!! Form::checkbox('medicina_complementaria', '1', null) !!}
    </label>
</div>


<!-- Esterilizacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('esterilizacion', 'Esterilizacion:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('esterilizacion', 0) !!}
        {!! Form::checkbox('esterilizacion', '1', null) !!}
    </label>
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

<!-- Observaciones Field -->
<div class="form-group col-sm-6">
    {!! Form::label('observaciones', 'Observaciones:') !!}
    {!! Form::text('observaciones', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>
