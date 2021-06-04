<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class NavBar extends Component
{
    public $categories;

    public function render()
    {
        return view('livewire.nav-bar');
    }

    public function mount()
    {
        $this->categories = Category::all();
    }
}
