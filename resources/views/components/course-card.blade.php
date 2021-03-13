@props(['course'])
<article class="card">
    <img src="{{Storage::url($course->image->url)}}" alt="{{$course->title}}" class="h-40 w-full object-cover">
    <div class="card-body">
        <h3 class="card-title">{{Str::limit($course->title,40)}}</h3>
        <p class="text-gray-500 text-sm mb-2">Por: {{$course->teacher->name}}</p>
        <div class="flex mb-4">
            <ul class="flex text-sm">
                <li class="mr-1"><i class="fas fa-star text-{{$course->rating >=1?'yellow':'gray'}}-400"></i></li>
                <li class="mr-1"><i class="fas fa-star text-{{$course->rating >=2?'yellow':'gray'}}-400"></i></li>
                <li class="mr-1"><i class="fas fa-star text-{{$course->rating >=3?'yellow':'gray'}}-400"></i></li>
                <li class="mr-1"><i class="fas fa-star text-{{$course->rating >=4?'yellow':'gray'}}-400"></i></li>
                <li class="mr-1"><i class="fas fa-star text-{{$course->rating ==5?'yellow':'gray'}}-400"></i></li>
            </ul>
            <p class="text-gray-500 text-right ml-auto text-sm"><i class="fas fa-users"></i> ({{$course->students_count}})</p>
        </div>
        <a href="{{route('courses.show',$course)}}" class="font-bold btn btn-block btn-primary">Ir al curso</a>
    </div>
</article>