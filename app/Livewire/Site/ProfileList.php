<?php

namespace App\Livewire\Site;

use App\Models\Category;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\View\View;
use JetBrains\PhpStorm\NoReturn;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

/**
 * Undocumented class
 *
 * @category Classe_Lista_Perfil
 * @package  Category
 * @author   Thiago Silva <thiago.silva@ntsistemasweb.dev.br>
 * @license  MIT
 * @link     http://url.com
 */
class ProfileList extends Component
{
  use WithPagination;

  public $storiesModal = true;

  public $category = null;

  public ?string $search = '';

  public $cities = null;

  public ?string $city = null;

  public $profilesList = [];

  public $slides = [];

  public function mount($category = null): void
  {
    $this->category = $category;

    $this->storiesModal = true;
    $this->category = Category::query()
      ->where('id', $category)
      ->first();

    $this->cities = Profile::select(['city', 'country', DB::raw('count(profiles.id) as profile')])
      ->leftJoin('users', 'users.id', '=', 'profiles.user_id')
      ->where('users.status', 'active')
      ->where('category_id', $category)
      ->groupBy('city', 'country')
      ->orderBy('profile', 'DESC')
      ->limit(20)
      ->get();


    $this->profilesList = $this->profiles();

    $users = User::query()
      ->where('online', true)
      ->where('status', 'active')
      ->get();


    foreach ($users as $user) {
      if ($user->profile->category_id == $category) {

        $this->slides[] = [
          'title' => $user->profile->name,
          'image' => URL::asset(Storage::url($user->profile->avatar)),
          'urlText' => 'Ver perfil',
          'url' => url('profile/' . $user->profile->slug)
        ];
      }
    }
  }


  #[Layout('components.layouts.default')]
  public function render(): View
  {
    return view('livewire.site.profile-list');
  }

  public function getProfileCity($city): void
  {
    $this->search = '';
    $this->city = $city;
    $this->mount($this->category->id);
    //$this->city = $city;
    //$this->redirectRoute('profile-list', ['category' => $category, 'city' => $city]);
  }

  public function getProfile($slug): void
  {
    $this->redirectRoute('site.profile', ['slug' => $slug]);
  }

  #[Computed]
  public function profiles(): Collection
  {
    if ($this->city) {
      return Profile::query()
        ->when(
          $this->search,
          fn(Builder $q) => $q->where(
            DB::raw('lower(name)'),
            'like',
            '%' . strtolower($this->search) . '%'
          )
        )
        ->leftJoin('users', 'users.id', '=', 'profiles.user_id')
        ->where('users.status', 'active')
        ->where('category_id', $this->category->id)
        ->where(
          'city',
          '=',
          $this->city
        )
        ->limit(20)
        ->get();
    }
    return Profile::query()
      ->when(
        $this->search,
        fn(Builder $q) => $q->where(
          DB::raw('lower(name)'),
          'like',
          '%' . strtolower($this->search) . '%'
        )
      )
      ->leftJoin('users', 'users.id', '=', 'profiles.user_id')
      ->where('users.status', 'active')
      ->where('category_id', $this->category->id)
      ->limit(20)
      ->get();
  }

  public function getSearch(): void
  {
    $this->mount($this->category->id);
  }
}
