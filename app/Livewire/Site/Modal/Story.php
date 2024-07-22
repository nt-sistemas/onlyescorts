<?php

namespace App\Livewire\Site\Modal;

use App\Models\Image;
use App\Models\Profile;
use App\Models\Story as ModelsStory;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class Story extends Component
{
  public bool $storiesModal = false;

  public $stories = [];

  public $user_id = null;
  public function render()
  {
    return view('livewire.site.modal.story');
  }

  public function mount($user_id = null)
  {
    if ($user_id == null) {
      return;
    }

    $profile = User::query()->where('id', $user_id)->first();
    $this->stories = ModelsStory::where('user_id', $profile->id)->get();

    //
  }

  #[On('open-stories-modal')]
  function openModal($user_id)
  {
    $this->user_id = $user_id;


    $this->storiesModal = true;
    $this->mount($user_id);
  }

  public function closeModal()
  {
    $this->storiesModal = false;
  }
}
