@extends('adminlte::page')

@section('title', 'CRUD API')

@section('content_header')
    <a class="btn btn-secondary btn-sm float-right" href="{{route('admin.registros.create')}}">Nuevo Registro</a>
    <h1>Listado de Registros</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    
    @livewire('admin.registro-index')
@stop


@section('js')
    <script> console.log('Hi!'); </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
                    '¡Eliminado!',
                    'El registro se eliminó correctamente.',
                    'success'
            )
        </script>
        
    @endif

    <script> 
        $('.form-eliminar').submit(function(e){
            e.preventDefault();      
    
            Swal.fire({
            title: '¿Estás Seguro?',
            text: "Este registro se eliminará definitivamente",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '¡Sí, Eliminar!',
            cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                
                this.submit();
            }
            })
        });
    </script>
@stop