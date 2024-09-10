<?php

namespace App\Livewire\App\Modal;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class Online extends Component
{
  public bool $onlineModal = false;

  public function mount()
  {
    $user = auth()->user();

    if (!$user->online && $user->status == 'active') {

      $this->onlineModal = true;
    }
  }

  public function render()
  {
    return view('livewire.app.modal.online');
  }

  #[On('open-online-modal')]
  public function openModal()
  {
    $this->onlineModal = true;
  }

  public function isOnline()
  {
    $user = User::query()
      ->where('id', auth()->user()->id)
      ->first();

    $user->online = !$user->online;

    $user->save();

    $this->onlineModal = false;

    redirect()->route('main');
  }
}
