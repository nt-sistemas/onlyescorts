<?php

namespace App\Livewire\Site;

use App\Models\Profile;
use Livewire\Component;

class Stories extends Component
{
  public $stories = [];
  public function render()
  {
    return view('livewire.site.stories');
  }

  public function mount()
  {
    $this->stories = Profile::all()->random(10);
  }
}
