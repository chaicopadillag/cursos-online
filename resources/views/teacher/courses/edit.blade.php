<x-app-layout>
    <div class="container py-8 grid grid-cols-5">
        <aside>
            <h2 class="font-bold text-lg mb-4">Edición del cuerso</h2>
            <ul class="text-sm text-gray-600">
                <li class="leading-7 mb-1 border-l-4 pl-2 border-green-500 text-gray-800"><a href="">Información del Curso</a></li>
                <li class="leading-7 mb-1 border-l-4 pl-2 border-transparent"><a href="">Lecciones del Curso</a></li>
                <li class="leading-7 mb-1 border-l-4 pl-2 border-transparent"><a href="">Metas del Curso</a></li>
                <li class="leading-7 mb-1 border-l-4 pl-2 border-transparent"><a href="">Estudiantes</a></li>
            </ul>
        </aside>
        <div class="col-span-4 card">
            <div class="card-body text-gray-600">
                <h2 class="text-2xl font-bold">Información del Curso</h2>
                <hr class="mt-2 mb-6">
                {!! Form::model($course, ['route'=>['teacher.courses.update',$course],'method'=>'PUT','files'=>true]) !!}
                @include('teacher.courses.partials.form')
                <div class="flex justify-end">
                    {!! Form::submit('Actualizar curso', ['class'=>'btn btn-primary cursor-pointer']) !!}

                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <x-slot name="js">
        <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>
        <script src="{{asset('js/teacher/courses/form.js')}}"></script>
    </x-slot>
</x-app-layout>