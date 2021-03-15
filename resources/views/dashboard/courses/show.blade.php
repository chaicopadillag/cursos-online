<x-app-layout>
    <section class="bg-gray-700 py-12">
        <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>
                @if($course->image)

                <img class="h-96 w-full object-cover" src="{{Storage::url($course->image->url)}}" alt="{{$course->title}}">
                @else
                <img class="h-96 w-full object-cover" src="{{asset('img/page/courses/course-default.jpg')}}" alt="Default">
                @endif
            </figure>
            <div class="text-white p-4">
                <h2 class="text-4xl mb-2">{{$course->title}}</h2>
                <h3 class="text-xl mb-3">{{$course->subtitle}}</h3>
                <p class="mb-2"><i class="fas fa-signal text-base mr-2"></i> Nivel: {{$course->level->name}} </p>
                <p class="mb-2"><i class="fas fa-list text-base mr-2"></i> Categoria: {{$course->category->name}}</p>
                <p class="mb-2"><i class="fas fa-users text-base mr-2"></i> Matriculados: {{$course->students_count}}</p>
                <p><i class="fas fa-star text-base mr-2 text-yellow-400"></i> Calificación: {{$course->rating}} de 5 Estrellas</p>
            </div>
        </div>
    </section>
    <section class="container grid grid-cols-1 lg:grid-cols-3 py-8 gap-6">
        @if(session('error'))
        <div class="lg:col-span-3 alert flex flex-row items-center bg-red-200 p-5 rounded border-b-2 border-red-300 relative" x-data="{open:true}" x-show="open">
            <div class="alert-icon flex items-center bg-red-100 border-2 border-red-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">
                <span class="text-red-500" x-on:click="open=!open">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="h-6 w-6">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </span>
            </div>
            <div class="alert-content ml-4">
                <div class="alert-title font-semibold text-lg text-red-800">
                    Error
                </div>
                <div class="alert-description text-sm text-red-600">
                    {{session('error')}}
                </div>
            </div>
            <div class="alert-icon flex h-10 w-10 flex-shrink-0 rounded-full right-2 absolute">
                <span class="text-red-500 cursor-pointer" x-on:click="open=!open">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="h-6 w-6">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </span>
            </div>
        </div>

        @endif
        <div class="order-2 lg:col-span-2 lg:order-1">
            <section class="card">
                <div class="card-body">
                    <h2 class="font-bold text-2xl mb-2">Lo que aprenderás</h2>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-y-2 gap-x-6">
                        @forelse ($course->goals as $goal)
                        <li class="text-gray-700 text-base"><i class="fas fa-check text-gray-600 mr-2"></i> {{$goal->name}}</li>
                        @empty
                        <li class="text-gray-700 text-base"> Este curso no tiene asignado ninguna meta</li>
                        @endforelse
                    </ul>
                </div>
            </section>
            <section class="py-8">
                <h2 class="font-bold text-3xl mb-2">Temario</h2>
                @forelse ($course->sections as $section)
                <article class="shadow mb-4" @if ($loop->first)
                    x-data="{open:true}"
                    @else
                    x-data="{open:false}"
                    @endif>
                    <div class="border border-gray-200 cursor-pointer px-4 py-2 bg-gray-200" x-on:click="open=!open">
                        <h2 class="text-gray-600 font-bold text-lg">{{$section->name}}</h2>
                    </div>
                    <div class="bg-white py-2 px-4" x-show="open">
                        <ul class="grid grid-cols-1 gap-2">
                            @foreach ($section->lessons as $lesson)
                            <li class="text-gray-600 text-base"><i class="fas fa-play-circle mr-2 text-gray-600"></i> {{$lesson->name}}</li>
                            @endforeach
                        </ul>

                    </div>
                </article>
                @empty
                <article class="card">
                    <div class="card-body">
                        <p>Este curso de no tiene ninguna sección creada</p>
                    </div>
                </article>
                @endforelse
            </section>
            <section class="mb-8">
                <h2 class="font-bold text-3xl">Requisitos</h2>
                <ul class="list-disc list-inside">

                    @forelse ($course->requirements as $requirement)
                    <li class="text-gray-600 text-base">{{$requirement->name}}</li>
                    @empty
                    <article class="card">
                        <div class="card-body">
                            <p>Este curso de no tiene ningun requisito creada</p>
                        </div>
                    </article>
                    @endforelse

                </ul>
            </section>
            <section class="mb-8">
                <h2 class="text-3xl font-bold">Descripción</h2>
                <div class="text-gray-600 text-base">{!!$course->description!!}</div>
            </section>
        </div>
        <div class="order-1 lg:order-1">
            <section class="card mb-4">
                <div class="card-body">
                    <div class="flex items-center">
                        <img src="{{$course->teacher->profile_photo_url}}" alt="{{$course->teacher->name}}" class="h-12 w-12 object-cover rounded-full shadow-lg">
                        <div class="ml-4">
                            <h3 class="font-bold text-gray-500 text-xl">Prof: {{$course->teacher->name}}</h3>
                            <a class="text-green-500 text-sm font-bold" href="{{Str::slug($course->teacher->name,'')}}">{{'@'.Str::slug($course->teacher->name,'')}}</a>
                        </div>
                    </div>

                    <form action="{{route('dashboard.courses.approved',$course)}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-block mt-4">
                            <i class="fas fa-check mr-2"></i>
                            Aprobar curso</button>
                    </form>
                    <a href="{{route('dashboard.courses.observation',$course)}}" class="btn btn-danger btn-block mt-4"><i class="fas fa-ban mr-2"></i> Observar curso</a>

                </div>
            </section>
        </div>
    </section>
</x-app-layout>