<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserStore extends Component
{

	public $name;
	public $email;
	public $password;

    protected $rules = [

        "name" => "required|min:3",
        "email" => "required|email|unique:users,email",
        "password" => "required"

    ];

    public function store()
    {

        $this->validate();

        $this->password = Hash::make($this->password);

    	User::create([

            "name" => $this->name,
            "email" => $this->email,
            "password" => $this->password,
            "current_team_id" => 1

        ]);

        $this->emit("created");

        $this->reset("name", "email", "password");

    }

    public function render()
    {

        return view("livewire.user-store");

    }

}