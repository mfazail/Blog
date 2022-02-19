<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AddCategory extends Component
{
    public $category;
    public $ip;

    public function mount()
    {
       $this->ip = request()->ip();
    }

    public function render()
    {
        return view('livewire.add-category');
    }

    public function addCategory()
    {
        $this->validate([
            'category' => 'string'
        ]);
        $res = Category::create([
            'name' => $this->category,
            'slug' => Str::slug($this->category)
        ]);

        if ($res) {
            session()->flash('category', 'Category Added');
        } else {
            session()->flash('category', 'Error');
        }
    }
}
