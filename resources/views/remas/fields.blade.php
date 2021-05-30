<!-- Paciente Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('paciente_id', 'Paciente Id:') !!}
    {!! Form::number('paciente_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Numero Unidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numero_unidad', 'Numero Unidad:') !!}
    {!! Form::text('numero_unidad', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Nombres Conductor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombres_conductor', 'Nombres Conductor:') !!}
    {!! Form::text('nombres_conductor', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Apellidos Conductor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('apellidos_conductor', 'Apellidos Conductor:') !!}
    {!! Form::text('apellidos_conductor', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Hora De Llamada Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hora_de_llamada', 'Hora De Llamada:') !!}
    {!! Form::text('hora_de_llamada', null, ['class' => 'form-control']) !!}
</div>

<!-- Hora De Salida Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hora_de_salida', 'Hora De Salida:') !!}
    {!! Form::text('hora_de_salida', null, ['class' => 'form-control']) !!}
</div>

<!-- Hora De Llegada Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hora_de_llegada', 'Hora De Llegada:') !!}
    {!! Form::text('hora_de_llegada', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>
