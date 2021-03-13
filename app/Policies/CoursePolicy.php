<?php

namespace App\Policies;

use App\Models\Course;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CoursePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function learning(User $user, Course $course)
    {
        return $course->students->contains($user->id);
    }

    public function published(?User $user, Course $course)
    {
        if ((int) $course->status === 3) {
            return true;
        } else {
            return false;
        }
    }
}
