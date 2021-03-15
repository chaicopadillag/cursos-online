<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Mail\ApprovedCourse;
use App\Mail\RejectCourse;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::where('status', 2)->latest('id')->paginate(10);
        return view('dashboard.courses.index', ['courses' => $courses]);
    }
    public function show(Course $course)
    {
        $this->authorize('revision', $course);
        return view('dashboard.courses.show', ['course' => $course]);
    }
    public function approved(Course $course)
    {
        $this->authorize('revision', $course);

        if (!$course->lessons || !$course->goals || !$course->requirements || !$course->image) {
            return back()->with('error', 'No se puede publicar un curso que no está al 100% completo');
        }
        $course->status = 3;
        $course->save();

        $mail = new ApprovedCourse($course);
        Mail::to($course->teacher->email)->queue($mail);

        return redirect()->route('dashboard.courses.index')->with('success', 'El Curso se publicó con exito');
    }
    public function observation(Course $course)
    {
        return view('dashboard.courses.observation', ['course' => $course]);
    }
    public function reject(Request $request, Course $course)
    {
        $request->validate([
            'body' => 'required',
        ]);
        $course->observation()->create($request->all());
        $course->status = 1;
        $course->save();

        $mail = new RejectCourse($course);
        Mail::to($course->teacher->email)->queue($mail);
        return redirect()->route('dashboard.courses.index')->with('success', 'El Curso se ha rechazado con exito');

    }
}
