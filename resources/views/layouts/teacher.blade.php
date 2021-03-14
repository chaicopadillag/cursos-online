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
                    <li class="leading-7 mb-1 border-l-4 pl-2">
                        <a href="">Metas del Curso</a>
                    </li>
                    <li class="leading-7 mb-1 border-l-4 pl-2">
                        <a href="">Estudiantes</a>
                    </li>
                </ul>
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