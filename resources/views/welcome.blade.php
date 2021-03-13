<x-app-layout>
    <section style="background-image: url({{asset('img/page/banners/bg-banner.jpg')}})" class="bg-cover">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-40">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-black text-4xl">Domina la tecnología con Cursos Online</h1>
                <p class="text-white text-lg mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt soluta explicabo voluptatibus facere iste velit mollitia inventore vitae voluptates ipsa!</p>
                @livewire('search')
            </div>
        </div>
    </section>
    <section class="my-24">
        <h1 class="text-gray-600 text-center text-3xl uppercase mb-6">Contenidos</h1>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            <article>
                <figure>
                    <img src="{{asset('img/page/articles/article1.jpg')}}" class="rounded-md w-full object-cover" alt="">
                </figure>
                <div class="mt-2">
                    <h2 class="text-center text-xl text-gray-700 mb-2">Diseño</h2>
                    <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum voluptatem omnis minus dolorum impedit.</p>
                </div>
            </article>
            <article>
                <figure>
                    <img src="{{asset('img/page/articles/article2.jpg')}}" class="rounded-md w-full object-cover" alt="">
                </figure>
                <div class="mt-2">
                    <h2 class="text-center text-xl text-gray-700 mb-2">Desarrollo</h2>
                    <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum voluptatem omnis minus dolorum impedit.</p>
                </div>
            </article>
            <article>
                <figure>
                    <img src="{{asset('img/page/articles/article3.jpg')}}" class="rounded-md w-full object-cover" alt="">
                </figure>
                <div class="mt-2">
                    <h2 class="text-center text-xl text-gray-700 mb-2">UI / UX</h2>
                    <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum voluptatem omnis minus dolorum impedit.</p>
                </div>
            </article>
            <article>
                <figure>
                    <img src="{{asset('img/page/articles/article4.jpg')}}" class="rounded-md w-full object-cover" alt="">
                </figure>
                <div class="mt-2">
                    <h2 class="text-center text-xl text-gray-700 mb-2">Marketing</h2>
                    <p class="text-sm text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum voluptatem omnis minus dolorum impedit.</p>
                </div>
            </article>
        </div>

    </section>
    <section class="my-24 bg-gray-700 py-12">
        <h1 class="text-center text-white text-3xl">¿Lorem ipsum dolor sit amet.?</h1>
        <p class="text-center text-white p-2">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Laborum hic iusto totam fugit omnis tempora, repellat doloribus dolores quod eum. Excepturi magni hic officiis voluptatum, esse quos aut modi delectus!</p>
        <div class="flex justify-center mt-4">
            <a href="{{route('courses.index')}}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Catálagos de cursos</a>
        </div>
    </section>
    <section class="my-24">
        <h1 class="text-center text-3xl text-gray-600">Últimos cursos</h1>
        <p class="text-center text-gray-500 text-sm mb-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo, inventore!</p>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            @foreach ($courses as $course)
            <x-course-card :course="$course" />
            @endforeach
        </div>
    </section>
</x-app-layout>