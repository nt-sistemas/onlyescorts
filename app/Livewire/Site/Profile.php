<?php

namespace App\Livewire\Site;

use App\Models\Image;
use App\Models\View as ViewModel;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Profile extends Component
{
  public $profile = null;
  public $images = null;

  public function mount($slug): void
  {

    $this->profile = \App\Models\Profile::query()
      ->where('slug', $slug,)
      ->first();



    $this->images = Image::query()
      ->where('user_id', $this->profile->user_id)
      ->get();

    $this->click($this->profile->id);
  }

  #[Layout('components.layouts.default')]
  public function render(): View
  {
    return view('livewire.site.profile');
  }

  public function click($id): void
  {
    $view = new ViewModel();

    $view->create([
      'profile_id' => $id,
      'ip' => request()->ip(),
    ]);
  }
}
