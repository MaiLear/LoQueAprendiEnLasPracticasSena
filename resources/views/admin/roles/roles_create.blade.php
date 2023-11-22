@extends('admin.layouts.admin_layout_index')

@section('title', 'Crear Roles')

@section('body')

<h1>Crea nuevos roles</h1>

<div class="card">
   <div class="card-body">
    <form  action="{{route('admin.roles.store')}}" method="post">
        @csrf
     <label for="">Nombre
        <input class="form-control" type="text" name="name">
    </label><br>
    
    <div class="my-2">
        <h1 class="h4">Lista de permisos</h1>
        @foreach ($permissions as $permission)
        <label>
            <input type="checkbox" name="permissions[]" value="{{$permission->id}}">
            {{$permission->description}}
        </label>
            
        @endforeach
    </div>
    <input class="btn btn-success" type="submit" value="Enviar">
     
     </form>
   </div>
</div>

@stop