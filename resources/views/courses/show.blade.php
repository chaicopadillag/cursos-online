<x-app-layout>
    <section class="bg-gray-700 py-12">
        <div class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
            <figure>
                <img class="h-96 w-full object-cover" src="{{Storage::url($course->image->url)}}" alt="{{$course->title}}">
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
        <div class="order-2 lg:col-span-2 lg:order-1">
            <section class="card">
                <div class="card-body">
                    <h2 class="font-bold text-2xl mb-2 text-gray-800">Lo que aprenderás</h2>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-y-2 gap-x-6">
                        @foreach ($course->goals as $goal)
                        <li class="text-gray-700 text-base"><i class="fas fa-check text-gray-600 mr-2"></i> {{$goal->name}}</li>
                        @endforeach
                    </ul>
                </div>
            </section>
            <section class="py-8">
                <h2 class="font-bold text-3xl mb-2 text-gray-800">Temario</h2>
                @foreach ($course->sections as $section)
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
                @endforeach
            </section>
            <section class="mb-8">
                <h2 class="font-bold text-3xl text-gray-800">Requisitos</h2>
                <ul class="list-disc list-inside">
                    @foreach ($course->requirements as $requirement)
                    <li class="text-gray-600 text-base">{{$requirement->name}}</li>
                    @endforeach
                </ul>
            </section>
            <section class="mb-8">
                <h2 class="text-3xl font-bold">Descripción</h2>
                <div class="text-gray-600 text-base">{!!$course->description!!}</div>
            </section>

            @livewire('course-review', ['course' => $course], key($course->id))
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
                    @can('learning', $course)
                    <a href="{{route('courses.learning',$course)}}" class="btn btn-danger btn-block mt-4"><i class="fas fa-play mr-2"></i>Continuar aprendiendo</a>
                    @else

                    @if((int)$course->price->value===0)
                    <form action="{{route('courses.enrolled',$course)}}" method="POST">
                        @csrf
                        <p class="text-2xl font-bold text-center text-green-500 my-2">GRATIS</p>
                        <button type="submit" class="btn btn-primary btn-block mt-4">
                            <i class="fas fa-check mr-2"></i>
                            Llevar al curso</button>
                    </form>
                    @else
                    <p class="text-2xl text-center font-bold text-gray-500 my-2">US$ {{$course->price->value}}</p>
                    <a href="{{route('payment.checkout',$course)}}" class="btn btn-primary btn-block"><i class="fas fa-dollar-sign mr-2"></i>Inscribirse al curso</a>
                    @endif
                    @endcan

                </div>
            </section>
            <aside class="hidden lg:block">
                @foreach ($similars as $similar)
                <article class="flex mb-6">
                    <img class="h-32 w-40 object-cover" src="{{Storage::url($similar->image->url )}}" alt="{{$similar->title}}">
                    <div class="ml-3">
                        <h3><a class="font-bold text-gray-600 mb-3" href="{{route('courses.show',$similar)}}">{{Str::limit($similar->title,41)}}</a></h3>
                        <div class="flex items-center mb-2">
                            <img class="h-8 w-8 object-cover rounded-full shadow-lg" src="{{$similar->teacher->profile_photo_url}}" alt="{{$similar->teacher->name}}">
                            <p class="text-gray-700 text-sm ml-2">{{$similar->teacher->name}}</p>
                        </div>
                        <p class="text-sm text-gray-700"><i class="fas fa-star mr-2 text-yellow-400"></i>{{$similar->rating}} Estrellas</p>
                    </div>

                </article>
                @endforeach
            </aside>

        </div>
    </section>
</x-app-layout>