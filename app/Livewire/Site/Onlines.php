<?php

namespace App\Livewire\Site;

use App\Models\Profile;
use App\Models\User;
use Livewire\Component;

class Onlines extends Component
{
  public $profiles = [];

  public function mount($category): void
  {

    $users = User::query()
      ->select('users.id')
      ->leftJoin('profiles', 'profiles.user_id', '=', 'users.id')
      ->where('users.status', 'active')
      ->where('online', true)
      ->where('category_id', $category->id)
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
