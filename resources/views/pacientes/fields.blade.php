<div class="form-row" id="root">
    <!-- Run Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('run', 'Run:') !!}
        {!! Form::text('run', null, ['id' => 'run','class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}

    </div>

    <div class="form-group col-sm-3">
        <label for="">&nbsp;</label>
        <button class="btn btn-success " type="button" @click="getDatosPaciente()">
            Consultar
        </button>
    </div>

    <!-- Dv Run Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('dv_run', 'Dv Run:') !!}
        {!! Form::text('dv_run', null, ['id' => 'dv_run','class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    </div>

    <!-- Apellido Paterno Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('apellido_paterno', 'Apellido Paterno:') !!}
        {!! Form::text('apellido_paterno', null, ['id' => 'apellido_paterno','class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    </div>

    <!-- Apellido Materno Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('apellido_materno', 'Apellido Materno:') !!}
        {!! Form::text('apellido_materno', null, ['id' => 'apellido_materno','class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    </div>

    <!-- Primer Nombre Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('primer_nombre', 'Primer Nombre:') !!}
        {!! Form::text('primer_nombre', null, ['id' => 'primer_nombre','class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    </div>

    <!-- Segundo Nombre Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('segundo_nombre', 'Segundo Nombre:') !!}
        {!! Form::text('segundo_nombre', null, ['id' => 'segundo_nombre','class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    </div>

    <!-- Fecha Nac Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('fecha_nac', 'Fecha Nac:') !!}
        {!! Form::date('fecha_nac', null, ['id' => 'fecha_nac','class' => 'form-control','id'=>'fecha_nac']) !!}
    </div>


    <!-- Sexo Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('sexo', 'Sexo:') !!}
        {!! Form::text('sexo', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    </div>

    
</div>

@push('scripts')
<script>
    const app = new Vue({
        el: '#root',
        created() {

        },
        data: {

        },
        methods: {
            async getDatosPaciente(){

                let run = $("#run").val();

                let url = "{{route('get.datos.paciente')}}"+"?run="+run;

                console.log('url',url);

                try{
                    let res = await axios.get(url);
                    let paciente = res.data.data;

                    console.log('respuesta',paciente);

                    $("#dv_run").val(paciente.dv_run);
                    $("#apellido_paterno").val(paciente.apellido_paterno);
                    $("#apellido_materno").val(paciente.apellido_materno);
                    $("#primer_nombre").val(paciente.primer_nombre);
                    $("#segundo_nombre").val(paciente.segundo_nombre);
                    $("#fecha_nac").val(paciente.fecha_nac);
                    $("#sexo").val(paciente.sexo);
                    $("#sigla_grado").val(paciente.sigla_grado);
                    $("#unid_rep_dot").val(paciente.unid_rep_dot);
                    $("#cond_alta_dot").val(paciente.cond_alta_dot);

                }catch (e) {
                    console.log(e.response);
                }
            }
        }
    });
</script>
@endpush
