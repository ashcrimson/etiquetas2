<!-- Rut Field -->
{!! Form::label('rut', 'Rut:') !!}
{!! $empleado->rut !!}<br>


<!-- Nombres Field -->
{!! Form::label('nombres', 'Nombres:') !!}
{!! $empleado->nombres !!}<br>


<!-- Apellidos Field -->
{!! Form::label('apellidos', 'Apellidos:') !!}
{!! $empleado->apellidos !!}<br>


<!-- Cargo Id Field -->
{!! Form::label('cargo_id', 'Cargo:') !!}
{!! $empleado->cargo->nombre !!}<br>


