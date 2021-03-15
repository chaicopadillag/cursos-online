<div>
    <h2 class="text-2xl font-bold">Lecciones del Curso</h2>
    <hr class="mt-2 mb-6">
    @foreach ($course->sections as $item)
    <article class="card mb-6" x-data="{open:true}">
        <div class="card-body bg-gray-200">
            @if ($section->id===$item->id)
            <form wire:submit.prevent="update">
                <input wire:model="section.name" type="text" class="block w-full mt-1 shadow-sm border-gray-300 rounded" placeholder="Nombre de la sección">
                @error('section.name')
                <span class="text-red-600 text-sm">{{$message}}</span>
                @enderror
            </form>
            @else
            <div class="flex justify-between items-center">
                <h3 class="cursor-pointer" x-on:click="open=!open">
                    <strong class="mr-2">
                        <i class="fas fa-angle-down text-gray-500"></i>
                        Sección:
                    </strong>
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
            <div x-show="open">
                @livewire('teacher.course-lesson', ['section' => $item], key($item->id))
            </div>
            @endif
        </div>
    </article>
    @endforeach
    <div x-data="{open:false}">
        <a class="flex items-center cursor-pointer text-green-500 font-bold text-lg mb-4" x-on:click="open=true" x-show="!open">
            <i class="fas fa-plus-circle mr-2"></i>
            Agregar nueva sección
        </a>
        <article class="card" x-show="open">
            <div class="card-body bg-green-100">
                <h3 class="text-2xl text-gray-600 font-bold">Nueva Sección</h3>
                <div>
                    <input wire:model="name" type="text" class="block w-full mt-1 shadow-sm border-gray-300 rounded" placeholder="Escriba el nombre de la sección">
                    @error('name')
                    <span class="text-red-500 text-sm">{{$message}}</span>
                    @enderror
                </div>
                <div class="flex justify-end mt-4">
                    <button class="btn btn-danger mr-4" x-on:click="open=false">Cancelar</button>
                    <button class="btn btn-primary" wire:click="store">Agregar</button>
                </div>
            </div>

        </article>
    </div>
</div>