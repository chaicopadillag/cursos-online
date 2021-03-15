<div>
    <h2 class="text-2xl font-bold mb-4">Estudiantes del Curso</h2>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                    <div class="px-6 py-4 flex">
                        <input type="search" class="form-input flex-1 shadow-sm border-gray-300 rounded mr-4" placeholder="Buscar curso" wire:model="search">
                    </div>
                    @if ($students->count()>0)
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nombre
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Correo
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($students as $student)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full object-cover object-center" src="{{$student->profile_photo_url}}" alt="{{$student->name}}">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{$student->name}}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{$student->email}} Alumnos</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="" class="text-indigo-600 hover:text-indigo-900">Ver</a>
                                </td>
                            </tr>
                            @endforeach
                            <!-- More items... -->
                        </tbody>
                    </table>

                    <div class="px-6 py-4">
                        {{$students->links()}}
                    </div>
                    @else
                    <div class="px-6 py-4">
                        <div class="alert flex flex-row items-center bg-blue-200 p-5 rounded border-b-2 border-blue-300">
                            <div class="alert-icon flex items-center bg-blue-100 border-2 border-blue-500 justify-center h-10 w-10 flex-shrink-0 rounded-full">
                                <span class="text-blue-500">
                                    <svg fill="currentColor" viewBox="0 0 20 20" class="h-6 w-6">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                            </div>
                            <div class="alert-content ml-4">
                                <div class="alert-title font-semibold text-lg text-blue-800">
                                    Busqueda sin resultado!
                                </div>
                                <div class="alert-description text-sm text-blue-600">
                                    No hay ningun estudiante coincidente con el texto ingresado
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>