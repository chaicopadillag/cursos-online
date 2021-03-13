<div class="form-group">
    {!! Form::label('name', 'Nombre de Rol:') !!}
    {!! Form::text('name', null, ['class'=>'form-control'.($errors->has('name')?' is-invalid':''),'placeholder'=>'Nuevo rol']) !!}
    @error('name')
    <span class="invalid-feedback">{{$message}}</span>
    @enderror
</div>
<strong>Permisos</strong>
@error('permissions')
<div class="text-danger text-sm">{{$message}}</div>
@enderror
@foreach ($permissions as $permission)
<div>
    <label for="{{$permission->name}}">
        {!! Form::checkbox('permissions[]', $permission->id, null, ['class'=>'mr-1','id'=>$permission->name]) !!}
        {{$permission->name}}
    </label>
</div>
@endforeach