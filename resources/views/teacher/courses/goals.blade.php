<x-teacher-layout :course="$course">

    @livewire('teacher.course-goals', ['course' => $course], key('teacher.course-goals'.$course->id))
    @livewire('teacher.course-requirements', ['course' => $course], key('teacher.course-requirements'.$course->id))
    @livewire('teacher.course-audiences', ['course' => $course], key('teacher.course-audiences'.$course->id))
</x-teacher-layout>