<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\User;

class UsersList extends Component
{

	use WithPagination;

    public $column = "id";
    public $order = "asc";
	public $search;

    public $columns = ["id", "name", "email"];

    public $modalUserDeletion = false;

	public function mount()
	{

		

	}

    public function updatingSearch()
    {

        $this->resetPage();

    }

    public function cleanFilter()
    {

        $this->reset(["search"]);

    }

    public function order($parameter)
    {

        $this->column = $parameter;

        $this->order = $this->order == "asc" ? "desc" : "asc";

    }

    public function confirmUserDeletion($id)
    {

        $this->modalUserDeletion = $id;

    }

    public function deleteUser(User $user)
    {

        $user->delete();

        $this->modalUserDeletion = false;

    }

    public function render()
    {

        $users = User::orderBy($this->column, $this->order);

        if($this->search)
        {

            $users->where("name", "like", "%" . $this->search . "%")
                ->orWhere("email", "like", "%" . $this->search . "%");

        }

        $users = $users->paginate(6);

        return view("livewire.users-list", compact("users"));

    }

}