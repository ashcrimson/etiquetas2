<!-- Motivo Consulta Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('motivo_consulta', 'Motivo Consulta:') !!}
    {!! Form::textarea('motivo_consulta', null, ['class' => 'form-control','rows' => 2]) !!}
</div>

<!-- Clasificacion Triaje Field -->
<div class="form-group col-sm-4">
    {!! Form::label('clasificacion_triaje','Clasificacion Triage:') !!}
    {!!
        Form::select(
            'clasificacion_triaje',
            ['' => 'Seleccione una..','SC' => 'Sin Clasificacion','S1'=> 'S1','S2'=>'S2','S3'=>'S3','S4'=>'S4','S5'=>'S5']
            , null
            , ['id'=>'clasificacion_triaje','class' => 'form-control','style'=>'width: 100%']
        )
    !!}
</div>

<!-- Presion Arterial Field -->
<div class="form-group col-sm-4">
    {!! Form::label('presion_arterial', 'Presión Arterial:') !!}
    {!! Form::text('presion_arterial', null, [
            'id' => 'presion_arterial',
            'class' => 'form-control',
            'maxlength' => 255,
            "data-inputmask"=>'"mask": "999/99"', "data-mask"
         ]) !!}
</div>

<!-- Frecuencia Cardiaca Field -->
<div class="form-group col-sm-4">
    {!! Form::label('frecuencia_cardiaca', 'Frecuencia Cardiaca:') !!}
    {!! Form::number('frecuencia_cardiaca', null, ['class' => 'form-control','maxlength' => 255]) !!}
</div>

<!-- Frecuencia Respiratoria Field -->
<div class="form-group col-sm-4">
    {!! Form::label('frecuencia_respiratoria', 'Frecuencia Respiratoria:') !!}
    {!! Form::number('frecuencia_respiratoria', null, ['class' => 'form-control','maxlength' => 255]) !!}
</div>

<!-- Temperatura Field -->
<div class="form-group col-sm-4">
    {!! Form::label('temperatura', 'Temperatura:') !!}
    {!! Form::number('temperatura', null, ['class' => 'form-control','step="any"','min="0"','max="50"']) !!}
</div>

<!-- Saturacion Oxigeno Field -->
<div class="form-group col-sm-4">
    {!! Form::label('saturacion_oxigeno', 'Saturación Oxígeno:') !!}
    {!! Form::number('saturacion_oxigeno', null, ['class' => 'form-control']) !!}
</div>

<!-- Atencion Enfermeria Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('atencion_enfermeria', 'Atención Enfermería:') !!}
    {!! Form::textarea('atencion_enfermeria', null, ['class' => 'form-control','rows' => 2]) !!}
</div>

<!-- Antecedentes Morbidos Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('antecedentes_morbidos', 'Antecedentes Mórbidos:') !!}
    {!! Form::textarea('antecedentes_morbidos', null, ['class' => 'form-control','rows' => 2]) !!}
</div>

<!-- Alergias Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('alergias', 'Alergias:') !!}
    {!! Form::textarea('alergias', null, ['class' => 'form-control','rows' => 2]) !!}
</div>

<!-- Medicamentos Habituales Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('medicamentos_habituales', 'Medicamentos Habituales:') !!}
    {!! Form::textarea('medicamentos_habituales', null, ['class' => 'form-control','rows' => 2]) !!}
</div>

@push('scripts')
<script>
    $(function () {

        $('[data-mask]').inputmask()

    })
</script>
@endpush
