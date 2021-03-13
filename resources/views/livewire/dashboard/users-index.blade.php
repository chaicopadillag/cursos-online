<div>
    <div class="card">
        <div class="card-header">
            <label class="">Buscar:</label>
            <input wire:keydown="clearPage" wire:model="search" type="text" class="form-control w-100" placeholder="Escriba un nombre o correo">
        </div>
        @if ($users->count()>0)

        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Nombre</td>
                        <td>Correo</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td width="10px"><a class="btn btn-primary" href="{{route('dashboard.users.edit',$user)}}">Editar</a></td>

                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$users->links()}}
        </div>
        @else
        <div class="card-body">
            <div class="alert alert-info" role="alert">
                <h4 class="alert-heading">Busqueda sin resultados</h4>
                No hay registros que coencidan con con la busqueda
            </div>
        </div>
        @endif
    </div>
</div>