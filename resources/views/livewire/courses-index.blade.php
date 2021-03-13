<div>
    <div class="bg-gray-200 py-4">
        <div class=" max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex">
            <button class="bg-white shadow h-12 px-4 rounded-md text-gray-700 mr-4 focus:outline-none" wire:click="resetFilters"><i class="fab fa-buffer text-base mr-2"></i>Todos los cursos</button>
            <!-- Dropdown cats -->
            <div class="relative mr-4" x-data="{open:false}">
                <button class="bg-white shadow block h-12  rounded-md overflow-hidden focus:outline-none px-4 text-gray-700" x-on:click="open=true">
                    <i class="fas fa-list text-base mr-2"></i>
                    Categorias
                    <i class="fas fa-angle-down text-base ml-2"></i>
                </button>
                <!-- Dropdown Body -->
                <div class="absolute right-0 mt-2 bg-white border rounded shadow-xl w-full" x-show="open" x-on:click.away="open=false">
                    @foreach ($categories as $category)
                    <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-700 hover:bg-green-500 hover:text-white" wire:click="$set('category_id',{{$category->id}})" x-on:click="open=false">{{$category->name}}</a>
                    <hr>
                    @endforeach

                </div>
            </div>
            <!-- Dropdown levels -->
            <div class="relative" x-data="{open:false}">
                <button class="bg-white shadow block h-12  rounded-md overflow-hidden focus:outline-none px-4 text-gray-700" x-on:click="open=true">
                    <i class="fas fa-signal text-base mr-2"></i>
                    Niveles
                    <i class="fas fa-angle-down text-base ml-2"></i>
                </button>
                <!-- Dropdown Body -->
                <div class="absolute right-0 mt-2 bg-white border rounded shadow-xl w-full" x-show="open" x-on:click.away="open=false">
                    @foreach ($levels as $level)
                    <a class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 hover:bg-green-500 hover:text-white cursor-pointer" wire:click="$set('level_id',{{$level->id}})" x-on:click="open=false">{{$level->name}}</a>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8 pt-16">
        @foreach ($courses as $course)
        <x-course-card :course="$course" />
        @endforeach
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        {{$courses->links()}}
    </div>
</div>