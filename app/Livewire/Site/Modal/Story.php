<?php

namespace App\Livewire\Site\Modal;

use App\Models\Image;
use App\Models\Profile;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class Story extends Component
{
  public $storiesModal = true;

  public $stories = [];
  public function render()
  {
    return view('livewire.site.modal.story');
  }

  public function mount()
  {
    $this->storiesModal = false;

    $profile = User::first();


    $this->stories = Image::where('user_id', $profile->id)->get();
  }

  #[On('open-stories-modal')]
  function openModal()
  {
    $this->storiesModal = true;
  }
}
