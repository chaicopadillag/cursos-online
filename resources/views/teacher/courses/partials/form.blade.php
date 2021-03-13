<div class="mb-4">
    {!! Form::label('title', 'Titulo del curso') !!}
    {!! Form::text('title', null, ['class'=>'form-input block w-full mt-1 shadow-sm border-gray-300 rounded'.($errors->has('title')?' border-red-600':'')]) !!}
    @error('title')
    <span class="text-red-600 text-sm">{{$message}}</span>
    @enderror
</div>
<div class="mb-4">
    {!! Form::label('slug', 'Slug del curso') !!}
    {!! Form::text('slug', null, ['readonly'=>'readonly','class'=>'form-input block w-full mt-1 shadow-sm border-gray-300 rounded'.($errors->has('slug')?' border-red-600':'')]) !!}
    @error('slug')
    <span class="text-red-600 text-sm">{{$message}}</span>
    @enderror
</div>
<div class="mb-4">
    {!! Form::label('subtitle', 'Subtitulo del curso') !!}
    {!! Form::text('subtitle', null, ['class'=>'form-input block w-full mt-1 shadow-sm border-gray-300 rounded'.($errors->has('subtitle')?' border-red-600':'')]) !!}
    @error('subtitle')
    <span class="text-red-600 text-sm">{{$message}}</span>
    @enderror
</div>
<div class="mb-4">
    {!! Form::label('description', 'Descripción') !!}
    {!! Form::textarea('description', null, ['class'=>'form-input block w-full mt-1 shadow-sm border-gray-300 rounded'.($errors->has('description')?' border-red-600':'')]) !!}
    @error('description')
    <span class="text-red-600 text-sm">{{$message}}</span>
    @enderror
</div>
<div class="grid grid-cols-3 gap-4">
    <div>
        {!! Form::label('category_id', 'Categoria:') !!}
        {!! Form::select('category_id', $categories, null, ['class'=>'block w-full mt-1 shadow-sm border-gray-300 rounded']) !!}
    </div>
    <div>
        {!! Form::label('level_id', 'Niveles:') !!}
        {!! Form::select('level_id', $levels, null, ['class'=>'block w-full mt-1 shadow-sm border-gray-300 rounded']) !!}
    </div>
    <div>
        {!! Form::label('price_id', 'Precio:') !!}
        {!! Form::select('price_id', $prices, null, ['class'=>'block w-full mt-1 shadow-sm border-gray-300 rounded']) !!}
    </div>

</div>
<h2 class="text-2xl font-bold mt-4 mb-2">Portada del curso</h2>
<div class=" grid grid-cols-2 gap-4">
    <figure>
        @isset($course->image)
        <img src="{{Storage::url($course->image->url)}}" class="w-full object-cover h-72 object-center" id="picture" alt="{{$course->title}}">
        @else
        <img src="{{asset('img/page/courses/course-default.jpg')}}" class="w-full object-cover h-72 object-center" id="picture" alt="Course Default">
        @endisset
    </figure>
    <div>
        <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium vel soluta sapiente obcaecati consequuntur. Exercitationem ullam, accusamus, molestiae, consequuntur nam natus numquam possimus iusto delectus officia commodi. Explicabo, eligendi error?</p>
        <label class="w-64 flex flex-col items-center px-2 py-4 bg-white text-green-500 rounded-lg shadow-lg tracking-wide uppercase border border-green-500 cursor-pointer hover:text-white hover:bg-green-500">
            <i class="fas fa-image text-3xl"></i>
            <span class="mt-2 text-base leading-normal">Seleccionar imagen</span>
            <input type='file' id="imagen" name="imagen" class="hidden" accept="image/*" />
        </label>
        @error('imagen')
        <span class="text-red-600 text-sm">{{$message}}</span>
        @enderror
    </div>
</div>