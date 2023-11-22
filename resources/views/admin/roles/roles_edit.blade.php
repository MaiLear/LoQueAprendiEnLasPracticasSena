@extends('admin.layouts.admin_layout_index')

@section('title', 'Editar Roles')

@section('body')

<h1>Editar roles</h1>

@if(session('info'))
<div class="alert alert-success">
    {{session('info')}}
</div>
@endif
<div class="card">
    <div class="card-body">
        <form  action="{{route('admin.roles.update',$roleId)}}" method="post">
            @method('PUT')
            @csrf
         <label for="">Nombre
            <input class="form-control" type="text" name="name" value="{{$roleName}}">
        </label><br>
        
        <div class="my-2">
            <h1 class="h4">Lista de permisos</h1>
            @foreach ($permissions as $permission)
            @php
            $isChecked = collect($permissionsSelected)->contains('id', $permission->id);
            @endphp
       
            <label>
                <input type="checkbox" @checked($isChecked) name="permissions[]" value="{{$permission->id}}">   
                {{$permission->description}}
            </label>
            
            @endforeach
        </div>
        <input class="btn btn-success" type="submit" value="Enviar">
         
         </form>
    </div>
 </div>

@stop