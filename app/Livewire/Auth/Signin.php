<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Models\UserForbiden;
use App\Notifications\WelcomeNotification;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Signin extends Component
{
  use WithFileUploads;

  #[Rule(['required', 'max:255'])]
  public ?string $name;

  #[Rule(['required', 'email', 'max:255', 'confirmed', 'unique:users,email'])]
  public ?string $email;

  public ?string $email_confirmation = null;

  #[Rule(['required'])]
  public ?string $password;

  #[Rule(['required'])]
  public ?string $birth;

  #[Rule(['required'])]
  public $file;


  #[Layout('components.layouts.site')]
  public function render()
  {
    return view('livewire.auth.signin');
  }

  public function save(): void
  {
    $this->validate();

    $date = Carbon::now();

    $years = intval($date->diffInYears(Carbon::parse($this->birth)));


    if ($years < 18) {
      $this->addError('invalidCredentials', 'You must be of legal age to register');
      return;
    }

    $user = User::query()->create([
      'name' => $this->name,
      'email' => $this->email,
      'password' => $this->password,
      'birth_date' => $this->birth,
      'document' => $this->file->store(path: 'documents')
    ]);

    auth()->login($user instanceof \Illuminate\Contracts\Auth\Authenticatable ? $user : null);

    $user->notify(new WelcomeNotification());

    $this->redirect(route('profile'));
  }
}
