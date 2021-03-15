<x-teacher-layout :course="$course">
    <h2 class="text-2xl font-bold">Observaciones del Curso</h2>
    <hr class="mt-2 mb-6">
    <div class="text-gray-500">
        {!!$course->observation->body!!}
    </div>
</x-teacher-layout>