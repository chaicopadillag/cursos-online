<div>
    <article class="card" x-data="{open:false}">
        <div class="card-body bg-gray-100">
            <div>
                <h4 class="cursor-pointer font-bold" x-on:click="open=!open">Descripción de la lección</h4>
            </div>
            <div x-show="open">
                <hr class="my-2">
                @if ($lesson->description)
                <form wire:submit.prevent="update">
                    <textarea class="block w-full mt-1 shadow-sm border-gray-300 rounded" wire:model="description.name"></textarea>
                    @error('description.name')
                    <span class="text-red-500 text-sm">{{$message}}</span>
                    @enderror
                    <div class="my-3 flex justify-end">
                        <button type="button" class="uppercase px-3 py-2 rounded-full bg-red-300 text-red-600 max-w-max shadow-sm hover:shadow-lg" wire:click="destroy">
                            <i class="fas fa-trash"></i>
                        </button>
                        <button type="submit" class="uppercase px-3 py-2 rounded-full bg-green-300 text-green-600 max-w-max shadow-sm hover:shadow-lg ml-2">
                            <i class="fas fa-save"></i>
                        </button>
                    </div>
                </form>
                @else
                <div>
                    <textarea class="block w-full mt-1 shadow-sm border-gray-300 rounded" wire:model="name" placeholder="Agregue una descripción de la lección"></textarea>
                    @error('name')
                    <span class="text-red-500 text-sm">{{$message}}</span>
                    @enderror
                    <div class="my-3 flex justify-end">
                        <button type="button" class="uppercase px-3 py-2 rounded-full bg-green-300 text-green-600 max-w-max shadow-sm hover:shadow-lg ml-2" wire:click="store">
                            <i class="fas fa-save"></i>
                        </button>
                    </div>
                </div>
                @endif

            </div>
        </div>

    </article>
</div>