@extends('admin.layouts.admin_layout_index')

@section('title', 'Roles')

@section('body')
<h1 class="display-1">Lista de roles</h1>
@if(session('info'))
<div class="alert alert-success">
    {{session('info')}}
</div>
@endif
<a class="align-self-end btn btn-secondary" href="{{route('admin.roles.create')}}">Nuevo rol</a>
<table class="table table-ligh bg-light">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Accion</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($roles as $role)
        <tr>
            <td>{{$role->id}}</td>
            <td>{{$role->name}}</td>
            <td width="10pc">
                <a class="btn btn-primary" href="{{route('admin.roles.edit',$role)}}">Editar</a>
            </td>
            <td width="10px">
                <form action="{{route('admin.roles.destroy',$role)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
            
            @empty
            <td colspan="2">No hay datos disponibles</td>
            
        </tr>
        @endforelse
    </tbody>
</table>

@stop