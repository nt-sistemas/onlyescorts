<?php

namespace App\Livewire\Site;

use App\Models\Profile;
use App\Models\Story;
use Carbon\Carbon;
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
    $users_id = Story::query()->select('user_id')->groupBy('user_id')->get();

    $this->stories = Profile::query()
      ->whereIn('user_id', $users_id)
      ->where('created_at', '<', Carbon::now())
      ->get();
  }

  public function openStoriesModal($user_id)
  {
    $this->dispatch('open-stories-modal', user_id: $user_id);
  }
}
