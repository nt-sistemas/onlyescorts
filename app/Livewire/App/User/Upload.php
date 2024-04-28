<?php

namespace App\Livewire\App\User;

use App\Models\Image;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\WithMediaSync;

class Upload extends Component
{
  use WithFileUploads;


  #[Validate(['files.*' => 'max:200000'])]
  public $files = [];

  public $media = [];

  #[Computed]
  public function mount(): void
  {
    $images = Image::query()->where('user_id', auth()->user()->id)->get();

    foreach ($images as $image) {
      $dados = [];

      $dados['id'] = $image->id;
      $dados['url'] = URL::asset(Storage::url($image->path));
      $this->media[] = $dados;
    }
  }

  public function render(): View
  {
    return view('livewire.app.user.upload');
  }

  public function save(): void
  {
    $user = auth()->user();

    $this->validate([
      'files.*' => 'required|max:200000',
    ]);



    foreach ($this->files as $photo) {
      $user->images()->create(
        [
          'path' => $photo->store(path: auth()->user()->slug . '/media')
        ]
      );
    }

    redirect(route('uploads'));
  }

  public function delete($id)
  {
    $singleImage = Image::findOrFail($id);
    Storage::delete($singleImage->path);
    $singleImage->delete();
    $this->reset('files');

    redirect(route('uploads'));
  }
}
