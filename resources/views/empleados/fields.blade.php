<!-- Rut Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rut', 'Rut:') !!}
    {!! Form::text('rut', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45,'maxlength' => 45]) !!}
</div>

<!-- Nombres Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombres', 'Nombres:') !!}
    {!! Form::text('nombres', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Apellidos Field -->
<div class="form-group col-sm-6">
    {!! Form::label('apellidos', 'Apellidos:') !!}
    {!! Form::text('apellidos', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Cargo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cargo_id', 'Cargo Id:') !!}
    {!! Form::number('cargo_id', null, ['class' => 'form-control']) !!}
</div>
