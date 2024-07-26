<?php

namespace App\Livewire\Site;

use App\Models\Profile;
use App\Models\User;
use Livewire\Component;

class Onlines extends Component
{
  public $profiles = [];

  public function mount()
  {
    $users = User::query()
      ->select('id')
      ->where('online', true)
      ->get();

    $this->profiles = Profile::query()
      ->whereIn('user_id', $users)
      ->inRandomOrder()
      ->limit(20)
      ->get();
  }
  public function render()
  {
    return view('livewire.site.onlines');
  }
}
