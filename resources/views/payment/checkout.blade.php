<x-app-layout>
    <div class="max-w-4xl mx-auto  sm:px-6 lg:px-8 py-12">
        <h2 class="text-gray-500 font-bold text-2xl">Detalle del pedido</h2>
        <div class="card">
            <div class="card-body text-gray-600">
                <article class="flex items-center">
                    <img class="h-12 w-12 object-cover" src="{{Storage::url($course->image->url)}}" alt="{{$course->title}}">
                    <h3 class="text-lg ml-2">{{$course->title}}</h3>
                    <p class="text-xl font-bold ml-auto">US$ {{$course->price->value}}</p>
                </article>
                <div class="flex justify-end">
                    <a href="{{route('payment.pay',$course)}}" class="btn btn-primary">Comprar este curso</a>
                </div>
                <hr class="my-4">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Placeat dolor, aperiam sit eos, reprehenderit, suscipit maiores voluptatem eius nemo commodi ab. Optio sit velit in sint officia earum eveniet recusandae. <a href="#" class="text-red-500">Terminos y condiciones</a></p>
            </div>
        </div>
    </div>
</x-app-layout>