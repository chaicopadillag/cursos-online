<?php

namespace App\Http\Livewire\dashboard;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    public function render()
    {
        $users = User::where('name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('email', 'LIKE', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.dashboard.users-index', ['users' => $users]);
    }

    public function clearPage()
    {
        $this->reset('page');
    }

}
