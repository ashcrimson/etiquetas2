<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Dosis Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dosis', 'Dosis:') !!}
    {!! Form::number('dosis', null, ['class' => 'form-control']) !!}
</div>

<!-- Suero Dilusion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('suero_dilusion', 'Suero Dilusion:') !!}
    {!! Form::text('suero_dilusion', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Vol Agregado Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vol_agregado', 'Vol Agregado:') !!}
    {!! Form::number('vol_agregado', null, ['class' => 'form-control']) !!}
</div>

<!-- Vol Final Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vol_final', 'Vol Final:') !!}
    {!! Form::number('vol_final', null, ['class' => 'form-control']) !!}
</div>

<!-- Bajada Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bajada', 'Bajada:') !!}
    {!! Form::text('bajada', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>
