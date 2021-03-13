<div class="mt-8">
    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <div class="embed-responsible">
                {!!$current->iframe!!}
            </div>
            <h2 class="text-gray-800 text-3xl my-4">{{$current->name}}</h2>
            @if ($current->description)
            <div class="text-gray-600">
                {{$current->description->name}}
            </div>
            <div class="flex items-center mt-4 cursor-pointer" wire:click="completed">
                @if ($current->completed)
                <i class="fas fa-toggle-on text-2xl text-blue-600"></i>
                @else
                <i class="fas fa-toggle-off text-2xl text-gray-600"></i>
                @endif
                <p class="text-sm ml-2">Marcar esta unidad como culminada</p>
            </div>

            <div class="card mt-2">
                <div class="card-body flex font-bold">
                    @if ($this->previous)
                    <a wire:click="changeLesson({{$this->previous}})" class="cursor-pointer text-green-600"><i class="fas fa-caret-left mr-2"></i>Tema anterior</a>
                    @else
                    <a class="text-gray-600"><i class="fas fa-caret-left mr-2"></i>Tema anterior</a>
                    @endif
                    @if ($this->next)
                    <a wire:click="changeLesson({{$this->next}})" class="ml-auto cursor-pointer text-green-600">
                        Siguiente tema<i class="fas fa-caret-right ml-2"></i>
                    </a>
                    @else
                    <a class="ml-auto text-gray-600">
                        Siguiente tema<i class="fas fa-caret-right ml-2"></i>
                    </a>
                    @endif
                </div>
            </div>

            @endif
        </div>
        <div class="card">
            <div class="card-body">
                <h2 class="text-gray-600 text-2xl mb-4 leading-8 text-center">{{$course->title}}</h2>
                <div class="flex items-center mb-4">
                    <figure>
                        <img class="rounded-full shadow-lg w-12 h-12 object-cover" src="{{$course->teacher->profile_photo_url}}" alt="{{$course->teacher->name}}">
                    </figure>
                    <div class="ml-2">
                        <p class="text-gray-600">{{$course->teacher->name}}</p>
                        <a href="" class="text-green-400 text-sm">{{'@'.Str::slug($course->teacher->name,'')}}</a>
                    </div>
                </div>
                <p class="text-gray-600 text-sm mt-2">{{$this->advance}}% completado</p>
                <div class="relative pt-1">
                    <div class="overflow-hidden h-4 mb-4 text-xs flex rounded bg-gray-200">
                        <div style="width:{{$this->advance}}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-600 transition-all duration-500"></div>
                    </div>
                </div>

                <ul>
                    @foreach ($course->sections as $section)
                    <li class="text-gray-600 mb-4">
                        <a class="font-bold text-base mb-2 inline-block" href="">{{$section->name}}</a>
                        <ul>
                            @foreach ($section->lessons as $lesson)
                            <li class="flex">
                                <div>
                                    @if ($lesson->completed)
                                    @if ($current->id===$lesson->id)
                                    <i class="inline-block w-4 h-4 border-2 border-blue-600 rounded-full mr-2 mt-1"></i>
                                    @else
                                    <i class="inline-block w-4 h-4 bg-blue-500 rounded-full mr-2 mt-1"></i>
                                    @endif

                                    @else

                                    @if ($current->id===$lesson->id)
                                    <i class="inline-block w-4 h-4  bg-green-600 rounded-full mr-2 mt-1"></i>
                                    @else
                                    <i class="inline-block w-4 h-4 bg-gray-400 rounded-full mr-2 mt-1"></i>
                                    @endif
                                    @endif
                                </div>
                                <a class="cursor-pointer" wire:click="changeLesson({{$lesson}})">{{$lesson->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                    </li>
                    @endforeach
                    <li></li>
                </ul>
            </div>
        </div>
    </div>
</div>