<!-- Fecha Admision Field -->
{!! Form::label('fecha_admision', 'Fecha Administración:') !!}
{!! $preparacion->fecha_admision !!}<br>

<!-- Fecha Elaboración Field -->
{!! Form::label('fecha_elaboracion', 'Fecha Elaboración:') !!}
{!! $preparacion->fecha_elaboracion !!}<br>


<!-- Paciente Id Field -->
{!! Form::label('paciente_id', 'Nombre Paciente:') !!}
{!! $preparacion->paciente->primer_nombre!!}
{!! $preparacion->paciente->segundo_nombre!!}
{!! $preparacion->paciente->apellido_paterno!!}
{!! $preparacion->paciente->apellido_materno!!}<br>


<!-- Profesional A Cargo Field -->
{!! Form::label('profesional_a_cargo', 'Profesional A Cargo:') !!}
{!! $preparacion->profesional_a_cargo !!}<br>


<!-- Responsable Id Field -->
{!! Form::label('responsable_id', 'Responsable:') !!}
{!! $preparacion->medico->nombres!!} {!! $preparacion->medico->apellidos!!}<br>


<!-- Droga Id Field -->
{!! Form::label('droga_id', 'Medicamento:') !!}
{!! $preparacion->droga->nombre !!}<br>


<!-- Dosis Field -->
{!! Form::label('dosis', 'Dosis:') !!}
{!! $preparacion->dosis !!}<br>


<!-- Dilucion Id Field -->
{!! Form::label('dilucion_id', 'Dilución:') !!}
{!! $preparacion->dilucion->nombre!!}<br>


<!-- Volumen Suero Field -->
{!! Form::label('volumen_suero', 'Volumen Suero:') !!}
{!! $preparacion->volumen_suero !!}<br>


<!-- Volumen Agregado Field -->
{!! Form::label('volumen_agregado', 'Volumen Agregado:') !!}
{!! $preparacion->volumen_agregado !!}<br>


<!-- Volumen Final Field -->
{!! Form::label('volumen_final', 'Volumen Final:') !!}
{!! $preparacion->volumen_final !!}<br>


<!-- Bajada Field -->
{!! Form::label('bajada', 'Bajada:') !!}
{!! $preparacion->bajada !!}<br>


<!-- Medico Id Field -->
{!! Form::label('medico_id', 'Medico:') !!}
{!! $preparacion->medico->nombres !!}
{!! $preparacion->medico->apellidos !!}<br>


<!-- Servicio Solicitante Field -->
{!! Form::label('servicio_solicitante', 'Servicio Solicitante:') !!}
{!! $preparacion->servicio->nombre !!}<br>


<!-- Protocolo Id Field -->
{!! Form::label('protocolo_id', 'Protocolo:') !!}
{!! $preparacion->protocolo->nombre !!}<br>


<!-- Ciclo Field -->
{!! Form::label('ciclo', 'Ciclo:') !!}
{!! $preparacion->ciclo !!}<br>


<!-- Dia Field -->
{!! Form::label('dia', 'Dia:') !!}
{!! $preparacion->dia !!}<br>


<!-- Control Producto Terminado Field -->
{!! Form::label('control_producto_terminado', 'Control Producto Terminado:') !!}
{!! $preparacion->control_producto_terminado !!}<br>


<!-- Entrega Conforme Enfermeria Field -->
{!! Form::label('entrega_conforme_enfermeria', 'Entrega Conforme Enfermeria:') !!}
{!! $preparacion->entrega_conforme_enfermeria !!}<br>


<!-- refrigerar Field -->
{!! Form::label('Refrigerar', 'Refrigerar:') !!}
{!! $preparacion->refrigerar !!}<br>


<!-- Proteger Luz Field -->
{!! Form::label('proteger_luz', 'Proteger Luz:') !!}
{!! $preparacion->proteger_luz !!}<br>


<!-- User Id Field -->
{!! Form::label('user_id', 'Usuario:') !!}
{!! $preparacion->user->name !!}<br>


<!-- Estado Id Field -->
{!! Form::label('estado_id', 'Estado:') !!}
{!! $preparacion->estado->nombre !!}<br>


