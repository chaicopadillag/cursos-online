<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class CourseLearning extends Component
{
    use AuthorizesRequests;
    public $course;
    public $current;

    public function mount(Course $course)
    {
        $this->authorize('learning', $course);
        $this->course = $course;

        foreach ($course->lessons as $lesson) {
            if (!$lesson->completed) {
                $this->current = $lesson;
                break;
            }
        }
        if (!$this->current) {
            $this->current = $course->lessons->last();
        }

    }
    public function render()
    {
        return view('livewire.course-learning');
    }
    // methodos
    public function changeLesson(Lesson $lesson)
    {
        $this->current = $lesson;
    }
    public function completed()
    {
        if ($this->current->completed) {
            // eliminar registro
            $this->current->users()->detach(auth()->user()->id);
        } else {
            // agregar registro
            $this->current->users()->attach(auth()->user()->id);
        }
        $this->current = Lesson::find($this->current->id);
        $this->course  = Course::find($this->course->id);
    }
// propiedades computadas
    public function getIndexProperty()
    {
        return $this->course->lessons->pluck('id')->search($this->current->id);

    }
    public function getPreviousProperty()
    {
        if ($this->index === 0) {
            return null;
        } else {
            return $this->course->lessons[$this->index - 1];
        }

    }
    public function getNextProperty()
    {
        if ($this->index === $this->course->lessons->count() - 1) {
            return null;
        } else {
            return $this->course->lessons[$this->index + 1];
        }

    }
    public function getAdvanceProperty()
    {
        $contador_advance = 0;
        foreach ($this->course->lessons as $lesson) {
            if ($lesson->completed) {
                $contador_advance++;
            }
        }
        $advance = ($contador_advance * 100) / ($this->course->lessons->count());

        return round($advance, 2);
    }
}
