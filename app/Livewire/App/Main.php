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

  public $headers = [
    ['key' => 'ip', 'label' => 'IP'],
    ['key' => 'created_at', 'label' => 'Date'],
  ];

  public function mount(): void
  {
    $user = auth()->user();
    $this->online = $user->online;

    $profile = Profile::query()->where('user_id', auth()->user()->id)->first();

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
