<section>
    <h2 class="font-bold text-3xl mb-2 text-gray-800">Valoraciones</h2>
    @can('learning',$course)
    @can('valued', $course)
    <article class="py-4">
        <textarea rows="3" class="border-2 border-gray-400 bg-white px-5 pr-16 rounded-lg text-sm focus:outline-none w-full" placeholder="Escriba un reseña para el curso" wire:model="comment"></textarea>
        <div class="flex items-center my-2">
            <ul class="flex">
                <li class="mr-1 cursor-pointer" wire:click="$set('rating',1)">
                    <i class="fas fa-star text-{{$rating >=1?'yellow':'gray'}}-400"></i>
                </li>
                <li class="mr-1 cursor-pointer" wire:click="$set('rating',2)">
                    <i class="fas fa-star text-{{$rating >=2?'yellow':'gray'}}-400"></i>
                </li>
                <li class="mr-1 cursor-pointer" wire:click="$set('rating',3)">
                    <i class="fas fa-star text-{{$rating >=3?'yellow':'gray'}}-400"></i>
                </li>
                <li class="mr-1 cursor-pointer" wire:click="$set('rating',4)">
                    <i class="fas fa-star text-{{$rating >=4?'yellow':'gray'}}-400"></i>
                </li>
                <li class="mr-1 cursor-pointer" wire:click="$set('rating',5)">
                    <i class="fas fa-star text-{{$rating ==5?'yellow':'gray'}}-400"></i>
                </li>
            </ul>
            <p class="text-gray-700 ml-2">Mi valoración</p>
        </div>
        <button class="btn btn-primary mr-2" wire:click="store">Enviar comentarios</button>
    </article>
    @else
    <div class="py-4">
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
                    Curso valorado!
                </div>
                <div class="alert-description text-sm text-blue-600">
                    Ud. ya ha valorado este curso
                </div>
            </div>
        </div>
    </div>
    @endcan
    @endcan
    <div class="card">
        <div class="card-body text-gray-600">
            <p class="text-xl mb-2">{{$course->reviews->count()}} Valoraciones</p>
            @forelse($course->reviews as $review)
            <article class="flex mb-4">
                <figure class="mr-2">
                    <img class="rounded-full shadow-lg h-12 w-12 object-cover" src="{{$review->user->profile_photo_url}}" alt="{{$review->user->name}}">
                </figure>
                <div class="card flex-1">
                    <div class="card-body bg-gray-100">
                        <ul class="flex text-sm items-center">
                            <li class="text-base"><b class="mr-2">{{$review->user->name}}</b></li>
                            <li class="mr-1"><i class="fas fa-star text-{{$review->rating >=1?'yellow':'gray'}}-400"></i></li>
                            <li class="mr-1"><i class="fas fa-star text-{{$review->rating >=2?'yellow':'gray'}}-400"></i></li>
                            <li class="mr-1"><i class="fas fa-star text-{{$review->rating >=3?'yellow':'gray'}}-400"></i></li>
                            <li class="mr-1"><i class="fas fa-star text-{{$review->rating >=4?'yellow':'gray'}}-400"></i></li>
                            <li class="mr-1"><i class="fas fa-star text-{{$review->rating ==5?'yellow':'gray'}}-400"></i></li>
                        </ul>
                        <p>{{$review->comment}}</p>
                    </div>
                </div>
            </article>
            @empty

            @endforelse
        </div>
    </div>
</section>