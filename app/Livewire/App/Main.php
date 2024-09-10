<?php

namespace App\Livewire\App;

use App\Models\Profile;
use App\Models\User;
use App\Models\View as ViewModel;
use Livewire\Component;

class Main extends Component
{

  public $views = 0;

  public bool $online = false;

  public $user;

  public $headers = [
    ['key' => 'ip', 'label' => 'IP'],
    ['key' => 'created_at', 'label' => 'Date'],
  ];

  public function mount(): void
  {
    $user = auth()->user();
    $this->user = $user;
    $this->online = $user->online;

    $profile = Profile::query()->where('user_id', auth()->user()->id)->first();

    if (!$profile) {
      $profile = new Profile();
      $profile->user_id = auth()->user()->id;
      $profile->name = auth()->user()->name;
      $profile->save();
    }

    $this->views = ViewModel::query()->where("profile_id", $profile->id)->get();
  }

  public function render()
  {
    return view('livewire.app.main');
  }

  public function openModalOnline()
  {
    $this->dispatch('open-online-modal');
  }
}
