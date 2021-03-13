<form class="pt-2 relative mx-auto text-gray-600 mt-4" method="POST" autocomplete="off">
    <input class="border-2 border-gray-400 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none w-full py-3" type="search" name="search" placeholder="Buscar..." autocomplete="off" wire:model="search">
    <!-- component -->
    <button type="submit" class="bg-green-500 hover:bg-blue-dark text-white font-bold py-2 px-4 rounded absolute right-0 top-0 mt-2">
        Buscar
    </button>
    @if ($search)
    <ul class="absolute left-0 w-full bg-white mt-1 rounded-md overflow-hidden z-50 border-2 border-gray-400">
        @forelse ($this->results as $result)
        <li class="leading-8 px-5 text-sm cursor-pointer hover:bg-gray-300">
            <a href="{{route('courses.show',$result)}}">{{$result->title}}</a>
        </li>
        @empty
        <li class="leading-8 px-5 text-sm cursor-pointer hover:bg-gray-300 text-red-500">No se encontrarón resultados para tu busqueda ☹️</li>
        @endforelse
    </ul>
    @endif
</form>