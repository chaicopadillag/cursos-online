<x-app-layout>
    <div class=" container py-8">
        @if(session('error'))
        <div class="px-6 py-4">
            <div class="alert flex flex-row items-center bg-red-200 p-5 rounded border-b-2 border-red-300">
                <div class="alert-icon flex items-center bg-red-100 border-2 border-red-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">
                    <span class="text-red-500">
                        <svg fill="currentColor" viewBox="0 0 20 20" class="h-6 w-6">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                        </svg>
                    </span>
                </div>
                <div class="alert-content ml-4">
                    <div class="alert-title font-semibold text-lg text-red-800">
                        ¡Ups...! Algo salio mal.
                    </div>
                    <div class="alert-description text-sm text-red-600">
                        {{session('error')}}
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="card">
            <div class="card-body text-gray-600">
                <h2 class="text-2xl font-bold">Crear nuevo curso</h2>
                <hr class="mt-2 mb-6">
                {!! Form::open(['route'=>'teacher.courses.store','files'=>true,'autocomplete'=>'off']) !!}
                @include('teacher.courses.partials.form')
                {!! Form::hidden('user_id', Auth::user()->id) !!}
                <div class="flex justify-end">
                    {!! Form::submit('Guardar curso', ['class'=>'btn btn-primary cursor-pointer']) !!}
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