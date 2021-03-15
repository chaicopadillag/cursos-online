<?php

namespace App\Http\Livewire\Teacher;

use App\Models\Course;
use App\Models\Section;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CourseCurriculum extends Component
{
    use AuthorizesRequests;
    public $course;
    public $section;
    public $name;

    protected $rules = [
        'section.name' => 'required',
    ];

    public function mount(Course $course)
    {
        $this->authorize('creator', $course);
        $this->course  = $course;
        $this->section = new Section();
    }
    public function render()
    {
        return view('livewire.teacher.course-curriculum')->layout('layouts.teacher', ['course' => $this->course]);
    }
    public function edit(Section $section)
    {
        $this->section = $section;
    }
    public function update()
    {
        $this->validate();
        $this->section->save();
        $this->section = new Section();
        $this->course  = Course::find($this->course->id);
    }
    public function store()
    {
        $this->validate([
            'name' => 'required',
        ]);
        Section::create([
            'name'      => $this->name,
            'course_id' => $this->course->id,
        ]);
        $this->reset('name');
        $this->course = Course::find($this->course->id);

    }

    public function destroy(Section $section)
    {
        $section->delete();
        $this->course = Course::find($this->course->id);

    }
}
