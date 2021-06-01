<!-- Motivo Consulta Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('motivo_consulta', 'Motivo Consulta:') !!}
    {!! Form::textarea('motivo_consulta', null, ['class' => 'form-control','rows' => 2]) !!}
</div>

<!-- Clasificacion Triaje Field -->
<div class="form-group col-sm-4">
    {!! Form::label('clasificacion_triaje','Clasificacion Triaje:') !!}
    {!!
        Form::select(
            'clasificacion_triaje',
            ['' => 'Seleccione una..','SC' => 'Sin Clasificacion','C1','C2','C3','C4','C5']
            , null
            , ['id'=>'clasificacion_triaje','class' => 'form-control','style'=>'width: 100%']
        )
    !!}
</div>

<!-- Presion Arterial Field -->
<div class="form-group col-sm-4">
    {!! Form::label('presion_arterial', 'Presion Arterial:') !!}
    {!! Form::text('presion_arterial', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Frecuencia Cardiaca Field -->
<div class="form-group col-sm-4">
    {!! Form::label('frecuencia_cardiaca', 'Frecuencia Cardiaca:') !!}
    {!! Form::text('frecuencia_cardiaca', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Frecuencia Respiratoria Field -->
<div class="form-group col-sm-4">
    {!! Form::label('frecuencia_respiratoria', 'Frecuencia Respiratoria:') !!}
    {!! Form::text('frecuencia_respiratoria', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Temperatura Field -->
<div class="form-group col-sm-4">
    {!! Form::label('temperatura', 'Temperatura:') !!}
    {!! Form::number('temperatura', null, ['class' => 'form-control']) !!}
</div>

<!-- Saturacion Oxigeno Field -->
<div class="form-group col-sm-4">
    {!! Form::label('saturacion_oxigeno', 'Saturacion Oxigeno:') !!}
    {!! Form::number('saturacion_oxigeno', null, ['class' => 'form-control']) !!}
</div>

<!-- Atencion Enfermeria Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('atencion_enfermeria', 'Atencion Enfermeria:') !!}
    {!! Form::textarea('atencion_enfermeria', null, ['class' => 'form-control','rows' => 2]) !!}
</div>

<!-- Antecedentes Morbidos Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('antecedentes_morbidos', 'Antecedentes Morbidos:') !!}
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
