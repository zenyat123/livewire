<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserUpdate extends Component
{

    public $id_user;

    public $name;
    public $email;
    public $password;

    protected $rules = [

        "name" => "required|min:3",
        "email" => "required|email",
        "password" => "required|min:3"

    ];

	public function mount(User $user)
	{

		$this->name = $user->name;
        $this->email = $user->email;

        $object = User::findOrFail($user->id);

        $this->id_user = $object;

	}

    public function update()
    {

        $this->rules["email"] = "required|email|unique:users,email," . $this->id_user->id;

        $this->validate();

        $this->password = Hash::make($this->password);

    	$this->id_user->update([

            "name" => $this->name,
            "email" => $this->email,
            "password" => $this->password

        ]);

        $this->emit("updated");

    }

    public function render()
    {

        return view("livewire.user-update");

    }

}