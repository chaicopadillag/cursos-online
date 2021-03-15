<?php

namespace App\Http\Livewire\Teacher;

use App\Models\Course;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class CourseStudents extends Component
{
    use WithPagination;

    use AuthorizesRequests;
    public $course;
    public $search;

    public function mount(Course $course)
    {
        $this->authorize('creator', $course);
        $this->course = $course;

    }

    public function render()
    {
        $students = $this->course->students()
            ->where('name', 'LIKE', '%' . $this->search . '%')
            ->paginate(4);
        return view('livewire.teacher.course-students', ['students' => $students])->layout('layouts.teacher', ['course' => $this->course]);
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
}
