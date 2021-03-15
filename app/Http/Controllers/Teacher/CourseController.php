<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Level;
use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:view-course')->only('index');
        $this->middleware('can:create-course')->only('create', 'store');
        $this->middleware('can:update-course')->only('edit', 'update', 'goals');
        $this->middleware('can:delete-course')->only('destroy');
    }
    public function index()
    {
        return view('teacher.courses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id');
        $levels     = Level::pluck('name', 'id');
        $prices     = Price::pluck('name', 'id');

        return view('teacher.courses.create', ['categories' => $categories, 'levels' => $levels, 'prices' => $prices]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required',
            'subtitle'    => 'required',
            'slug'        => 'required|unique:courses',
            'description' => 'required',
            'category_id' => 'required',
            'level_id'    => 'required',
            'price_id'    => 'required',
            'imagen'      => 'image',
        ]);

        try {
            $course = Course::create($request->all());

            if ($request->file('imagen')) {
                $url = Storage::put('courses', $request->file('imagen'));
                $course->image()->create(['url' => $url]);
            }

            return redirect()->route('teacher.courses.edit', $course);

        } catch (\Exception$e) {
            return redirect()->back()->with('error', 'Error al guardar los datos del curso, ERROR: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('teacher.courses.index', ['course' => $course]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {

        $this->authorize('creator', $course);

        $categories = Category::pluck('name', 'id');
        $levels     = Level::pluck('name', 'id');
        $prices     = Price::pluck('name', 'id');
        return view('teacher.courses.edit', ['course' => $course, 'categories' => $categories, 'levels' => $levels, 'prices' => $prices]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $this->authorize('creator', $course);

        $request->validate([
            'title'       => 'required',
            'subtitle'    => 'required',
            'slug'        => 'required|unique:courses,slug,' . $course->id,
            'description' => 'required',
            'category_id' => 'required',
            'level_id'    => 'required',
            'price_id'    => 'required',
            'imagen'      => 'image',
        ]);
        try {

            $course->update($request->all());

            if ($request->file('imagen')) {
                $url = Storage::put('courses', $request->file('imagen'));

                if ($course->image) {
                    Storage::delete($course->image->url);
                    $course->image->update(['url' => $url]);
                } else {
                    $course->image()->create(['url' => $url]);
                }

            }

            return redirect()->route('teacher.courses.edit', $course);

        } catch (\Exception$e) {
            return redirect()->back()->with('error', 'Error al actualizar los datos del curso, ERROR: ' . $e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
    public function goals(Course $course)
    {
        $this->authorize('creator', $course);

        return view('teacher.courses.goals', ['course' => $course]);
    }

    public function status(Course $course)
    {
        $course->status = 2;
        $course->save();
        $course->observation->delete();
        return redirect()->route('teacher.courses.edit',$course);
    }

    public function observation(Course $course)
    {
        return view('teacher.courses.observation', ['course' => $course]);
    }
}
