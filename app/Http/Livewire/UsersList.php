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

	public function mount()
	{

		

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

    public function destroy(User $user)
    {

    	$user->delete();

    }

    public function order($parameter)
    {

        $this->column = $parameter;

        $this->order = $this->order == "asc" ? "desc" : "asc";

    }

    public function cleanFilter()
    {

    	$this->reset(["search"]);

    }

}