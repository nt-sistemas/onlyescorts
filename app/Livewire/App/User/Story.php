<?php

namespace App\Livewire\App\User;

use App\Models\Story as ModelsStory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Story extends Component
{
  use WithFileUploads;


  #[Validate(['files.*' => 'max:200000'])]
  public $files = [];

  public $stories = [];

  #[Computed]
  public function mount(): void
  {
    $stories = ModelsStory::query()->where('user_id', auth()->user()->id)->get();


    foreach ($stories as $story) {
      $dados = [];

      $dados['id'] = $story->id;
      $dados['url'] = URL::asset(Storage::url($story->path));
      $this->stories[] = $dados;
    }
  }

  public function save(): void
  {
    $user = auth()->user();

    $this->validate([
      'files.*' => 'required|max:200000',
    ]);



    foreach ($this->files as $photo) {
      $user->stories()->create(
        [
          'path' => $photo->store(path: auth()->user()->slug . '/stories')
        ]
      );
    }

    redirect(route('stories'));
  }

  public function delete($id)
  {
    $singleStory = ModelsStory::findOrFail($id);
    Storage::delete($singleStory->path);
    $singleStory->delete();
    $this->reset('files');

    redirect(route('stories'));
  }
  public function render()
  {
    return view('livewire.app.user.story');
  }
}
