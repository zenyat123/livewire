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

    public function render()
    {

        return view("livewire.user-store");

    }

    public function store()
    {

        $this->validate();

        $this->password = Hash::make($this->password);

    	User::create([

            "name" => $this->name,
            "email" => $this->email,
            "password" => $this->password

        ]);

        session()->flash("response", "User created");

        return redirect()->route("user.index");

    }

}