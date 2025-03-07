<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder ="Ingrese el nombre del registro">

    </div>
    @if ($noticias->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th colspan="2"></th>
                    </tr>

                    <tbody>
                        @foreach ($registros as $registros)
                            <tr>
                                <td>{{$registro->id}}</td>
                                <td>{{$registro->titulo}}</td>
                                <td with="10px">
                                    <a class="btn btn-primary btn-sm " href="{{route('admin.registros.edit', $registro)}}">Editar</a>
                                </td with="10px">
                                <td>
                                    <form action="{{route('admin.registros.destroy', $registro)}}" method="POST" class="form-eliminar">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </thead>

            </table>

        </div>
        <div class="card-footer">
            {{$registros->links()}}
        </div>
    @else
        <div class="card-body">
            <strong>No existen registros ......</strong>
        </div>
    @endif

</div>
