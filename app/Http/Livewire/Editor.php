<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Editor extends Component
{

    public function render()
    {
        return view('livewire.editor');
    }
}
