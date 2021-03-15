<div class="card my-4" x-data="{open:false}">

    <div class="card-body bg-gray-100">
        <h4 class="font-bold cursor-pointer" x-on:click="open=!open">Recursos de la lección</h4>
    </div>
    <div class="mb-2" x-show="open">
        <hr class="my-2">
        @if ($lesson->resource)
        <div class="flex justify-between items-center p-2">
            <p>
                <i class="fas  fa-file-download text-green-500 cursor-pointer mr-2 text-lg" wire:click="download"></i>
                {{$lesson->resource->url}}
            </p>
            <i class="fas  fa-trash text-red-500 cursor-pointer ml-2" wire:click="destroy"></i>
        </div>
        @else
        <form wire:submit.prevent="save">
            <div class="flex items-center p-2 justify-between">
                <label class="w-64 flex py-2 px-2 items-center bg-indigo-100 text-blue rounded shadow-lg tracking-wide uppercase border border-indigo-200 cursor-pointer hover:bg-indigo-200 hover:text-indigo-600">
                    <i class="fas fa-file-upload mr-2"></i>
                    <span class="text-base leading-normal">Seleccionar archivo</span>
                    <input type='file' class="hidden" wire:model="file" />
                </label>
                <div class="text-green-500 flex-1 px-2" wire:loading wire:target="file">Cargando...</div>
                @error('file')
                <div class="text-red-500 text-sm flex-1 px-2">{{$message}}</div>
                @enderror
                <button type="submit" class="btn btn-primary mx-2">Guardar</button>
            </div>
        </form>
        @endif
    </div>

</div>