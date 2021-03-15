<div>
    @foreach ($section->lessons as $itemLesson)
    <article class="card mt-4" x-data="{open:false}">
        <div class="card-body">
            @if ($lesson->id===$itemLesson->id)
            <form wire:submit.prevent="update">
                <div class="flex items-center">
                    <label class="w-32">Nombre:</label>
                    <input type="text" class="block w-full mt-1 shadow-sm border-gray-300 rounded" wire:model="lesson.name">
                </div>
                @error('lesson.name')
                <span class="text-red-500 text-sm">{{$message}}</span>
                @enderror

                <div class="flex items-center mt-4">
                    <label class=" w-32">Plaforma:</label>
                    <select class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none   sm:text-sm" wire:model="lesson.platform_id">
                        @foreach ($platforms as $platform)
                        <option value="{{$platform->id}}">{{$platform->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex items-center mt-4">
                    <label class="w-32">URL:</label>
                    <input type="text" class="block w-full mt-1 shadow-sm border-gray-300 rounded" wire:model="lesson.url">
                </div>
                @error('lesson.url')
                <span class="text-red-500 text-sm">{{$message}}</span>
                @enderror

                <div class="mt-4 flex justify-end">
                    <button type="button" class="btn btn-danger mr-4" wire:click="cancel">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
            @else
            <div>
                <h3 class="cursor-pointer" x-on:click="open=!open">
                    <i class="fas fa-play text-green-500 mr-1"></i>
                    Lección: {{$itemLesson->name}}
                </h3>
            </div>
            <div x-show="open">
                <hr class="my-2">
                <p class="text-sm"> Plataforma: {{$itemLesson->platform->name}}</p>
                <p class="text-sm">Enlace:
                    <a href="{{$itemLesson->url}}" target="_blank" class="text-blue-500">{{$itemLesson->url}}</a>
                </p>
                <div class="my-2 flex">
                    <button class="uppercase p-3 flex items-center border border-blue-600 text-blue-600 max-w-max shadow-sm hover:shadow-lg rounded-full w-10 h-10 text-sm mr-1" wire:click="edit({{$itemLesson}})">
                        <i class="fas fa-pen"></i>
                    </button>
                    <button class="uppercase p-3 flex items-center border border-red-600 text-red-600 max-w-max shadow-sm hover:shadow-lg rounded-full w-10 h-10 text-sm" wire:click="destroy({{$itemLesson}})">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
                @livewire('teacher.lesson-description', ['lesson' => $itemLesson], key('lesson-description'.$itemLesson->id))

                @livewire('teacher.lesson-resources', ['lesson' => $itemLesson], key('teacher.lesson-resources'.$itemLesson->id))
            </div>
            @endif
        </div>
    </article>
    @endforeach
    <div class="mt-4" x-data="{open:false}">
        <a class="flex items-center cursor-pointer text-green-500 font-bold text-lg mb-4" x-on:click="open=true" x-show="!open">
            <i class="fas fa-plus-circle mr-2"></i>
            Agregar nueva lección
        </a>
        <article class="card" x-show="open">
            <div class="card-body">
                <h3 class="text-2xl text-gray-600 font-bold">Nueva lección</h3>
                <div>
                    <div class="flex items-center">
                        <label class="w-32">Nombre:</label>
                        <input type="text" class="block w-full mt-1 shadow-sm border-gray-300 rounded" wire:model="name">
                    </div>
                    @error('name')
                    <span class="text-red-500 text-sm">{{$message}}</span>
                    @enderror

                    <div class="flex items-center mt-4">
                        <label class=" w-32">Plaforma:</label>
                        <select class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none   sm:text-sm" wire:model="platform_id">
                            @foreach ($platforms as $platform)
                            <option value="{{$platform->id}}">{{$platform->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('platform_id')
                    <span class="text-red-500 text-sm">{{$message}}</span>
                    @enderror

                    <div class="flex items-center mt-4">
                        <label class="w-32">URL:</label>
                        <input type="text" class="block w-full mt-1 shadow-sm border-gray-300 rounded" wire:model="url">
                    </div>
                    @error('url')
                    <span class="text-red-500 text-sm">{{$message}}</span>
                    @enderror

                    <div class="flex justify-end mt-4">
                        <button class="btn btn-danger mr-4" x-on:click="open=false">Cancelar</button>
                        <button class="btn btn-primary" wire:click="store">Agregar</button>
                    </div>
                </div>
            </div>
        </article>
    </div>
</div>