<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UserDetails extends Component
{
    public $orders;

    public function render()
    {
        return view('livewire.user-details');
    }

    public function details($id)
    {
        var_dump($id);
    }
}
