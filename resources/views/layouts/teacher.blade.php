<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <x-jet-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-menu')
        <!-- Teacher Course -->
        <div class="container py-8 grid grid-cols-5">
            <aside>
                <h2 class="font-bold text-lg mb-4">Edición del cuerso</h2>
                <ul class="text-sm text-gray-600">
                    <li class="leading-7 mb-1 border-l-4 pl-2 @tabIs('teacher.courses.edit',$course) border-green-500 text-gray-800 @else border-transparent @endif">
                        <a href="{{route('teacher.courses.edit',$course)}}">Información del Curso</a>
                    </li>
                    <li class="leading-7 mb-1 border-l-4 pl-2 @tabIs('teacher.courses.curriculum',$course) border-green-500 text-gray-800 @else border-transparent @endif">
                        <a href="{{route('teacher.courses.curriculum',$course)}}">Lecciones del Curso</a>
                    </li>
                    <li class="leading-7 mb-1 border-l-4 pl-2 @tabIs('teacher.courses.goals',$course) border-green-500 text-gray-800 @else border-transparent @endif">
                        <a href="{{route('teacher.courses.goals',$course)}}">Metas del Curso</a>
                    </li>
                    <li class="leading-7 mb-1 border-l-4 pl-2 @tabIs('teacher.courses.students',$course) border-green-500 text-gray-800 @else border-transparent @endif">
                        <a href="{{route('teacher.courses.students',$course)}}">Estudiantes</a>
                    </li>

                    @if ($course->observation)
                    <li class="leading-7 mb-1 border-l-4 pl-2 @tabIs('teacher.courses.observation',$course) border-green-500 text-gray-800 @else border-transparent @endif">
                        <a href="{{route('teacher.courses.observation',$course)}}">Observaciones</a>
                    </li>
                    @endif
                </ul>

                <hr class="my-4">
                <h2 class="font-bold text-lg mb-4">Estado del Curso</h2>
                @switch($course->status)
                @case(1)
                <form method="POST" action="{{route('teacher.courses.status',$course)}}">
                    @csrf
                    <button type="submit" class="btn bg-blue-500 text-white">
                        <i class="fas fa-paper-plane mr-2"></i>
                        Solicitar revición
                    </button>
                </form>
                @break
                @case(2)
                <span class="tracking-wider text-white bg-yellow-500 px-6 py-2 text-sm rounded leading-loose font-semibold">
                    <i class="fas fa-hourglass-half mr-2"></i>
                    En revición
                </span>
                @break
                @case(3)
                <span class="tracking-wider text-white bg-green-500 px-6 py-2 text-sm rounded leading-loose font-semibold">
                    <i class="fas fa-globe mr-2"></i>
                    Publicado
                </span>
                @break
                @default
                <span class="tracking-wider text-white bg-red-500 px-6 py-2 text-sm rounded leading-loose font-semibold">
                    <i class="fas fa-ban mr-2"></i>
                    Rechazado
                </span>
                @endswitch
            </aside>
            <main class="col-span-4 card">
                <div class="card-body text-gray-600">
                    {{$slot}}
                </div>
            </main>
        </div>
    </div>

    @stack('modals')

    @livewireScripts
    @isset($js)
    {{$js}}
    @endisset
</body>

</html>