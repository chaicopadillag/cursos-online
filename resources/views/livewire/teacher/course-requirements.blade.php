<section class="mt-4">
    <h2 class="text-2xl font-bold">Requirimientos del Curso</h2>
    <hr class="my-2">
    @foreach ($course->requirements as $item)
    <article class="card mb-4">
        <div class="card-body bg-gray-100">
            @if ($requirement->id===$item->id)
            <form wire:submit.prevent="update">
                <input wire:model="requirement.name" type="text" class="block w-full mt-1 shadow-sm border-gray-300 rounded" placeholder="Ingrese un requirimiento">
                @error('requirement.name')
                <span class="text-red-600 text-sm">{{$message}}</span>
                @enderror
            </form>
            @else
            <div class="flex items-center justify-between">
                <h3 class="font-bold">
                    <i class="fas fa-check text-green-500 mr-1"></i>
                    {{$item->name}}
                </h3>
                <div class="flex">
                    <button class="uppercase p-3 flex items-center bg-blue-600 text-blue-50 max-w-max shadow-sm hover:shadow-lg rounded-full w-10 h-10 mr-2" wire:click="edit({{$item}})">
                        <i class="fas fa-pen"></i>
                    </button>
                    <button class="uppercase p-3 flex items-center bg-red-600 text-blue-50 max-w-max shadow-sm hover:shadow-lg rounded-full w-10 h-10 mr-2" wire:click="destroy({{$item}})">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
            @endif
        </div>
    </article>
    @endforeach
    <article class="card">
        <div class="card-body bg-gray-100">
            <form wire:submit.prevent="store">
                <input type="text" class="flex-1 mt-1 shadow-sm border-gray-300 rounded w-full" wire:model="name" placeholder="Igrese un requerimiento">
                @error('name')
                <span class="text-red-600 text-sm">{{$message}}</span>
                @enderror
                <div class="flex justify-end mt-2">
                    <button class="btn btn-primary">Agregar requirimiento</button>
                </div>
            </form>
        </div>
    </article>
</section>