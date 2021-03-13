<?php

namespace App\Http\Livewire\teacher;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class CoursesIndex extends Component
{
    use WithPagination;
    public $search;
    public function render()
    {
        $courses = Course::where('title', 'LIKE', '%' . $this->search . '%')
            ->where('user_id', auth()->user()->id)
            ->latest('id')
            ->paginate(10);

        return view('livewire.teacher.courses-index', ['courses' => $courses]);
    }
    public function clearPage()
    {
        $this->reset('page');
    }
}
