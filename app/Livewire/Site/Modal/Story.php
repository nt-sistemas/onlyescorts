<?php

namespace App\Livewire\Site\Modal;

use App\Models\Image;
use App\Models\Profile;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class Story extends Component
{
  public bool $storiesModal = false;

  public $stories = [];
  public function render()
  {
    return view('livewire.site.modal.story');
  }

  public function mount()
  {
    $profile = User::first();
    $this->storiesModal = false;


    $this->stories = Image::where('user_id', $profile->id)->get();
  }

  #[On('open-stories-modal')]
  function openModal()
  {
    $this->storiesModal = true;
  }

  public function closeModal()
  {
    $this->storiesModal = false;
  }
}
