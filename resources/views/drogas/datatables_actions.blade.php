{{--@can('Ver drogas')--}}
<a href="{{ route('drogas.show', $id) }}" data-toggle="tooltip" title="Ver" class='btn btn-default btn-sm'>
    <i class="fa fa-eye"></i>
</a>
{{--@endcan--}}

{{--@can('Editar drogas')--}}
<a href="{{ route('drogas.edit', $id) }}" data-toggle="tooltip" title="Editar" class='btn btn-outline-info btn-sm'>
    <i class="fa fa-edit"></i>
</a>
{{--@endcan--}}


{{--@can('Imprimir drogas')--}}
    <a href="{{ route('drogas.imprimir', $id) }}" data-toggle="tooltip" title="Imprimir" class='btn btn-outline-secondary btn-sm'>
        <i class="fa fa-print"></i>
    </a>
{{--@endcan--}}

{{--@can('Eliminar Drogras')--}}
<a href="#" onclick="deleteItemDt(this)" data-id="{{$id}}" data-toggle="tooltip" title="Eliminar" class='btn btn-outline-danger btn-sm'>
    <i class="fa fa-trash-alt"></i>
</a>


<form action="{{ route('drogas.destroy', $id)}}" method="POST" id="delete-form{{$id}}">
    @method('DELETE')
    @csrf
</form>
{{--@endcan--}}
