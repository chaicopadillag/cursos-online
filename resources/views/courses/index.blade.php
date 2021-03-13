<x-app-layout>
    <section style="background-image: url({{asset('img/page/banners/courses.jpg')}})" class="bg-cover">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-40">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-black text-4xl">Ls Mejores Cursos Online</h1>
                <p class="text-white text-lg mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt soluta explicabo voluptatibus facere iste velit mollitia inventore vitae voluptates ipsa!</p>
                @livewire('search')
            </div>
        </div>
    </section>
    @livewire('courses-index')
</x-app-layout>