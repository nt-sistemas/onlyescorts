<?php

namespace App\Livewire\Site;

use App\Models\Category;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use JetBrains\PhpStorm\NoReturn;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
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

  public $category = null;

  public ?string $search = '';

  public $cities = null;

  public ?string $city = null;

  public $profilesList = [];

  public function mount($category = null): void
  {
    $this->category = $category;

    $this->category = Category::query()
      ->where('id', $category)
      ->first();

    $this->cities = Profile::select(['city', 'country', DB::raw('count(id) as profile')])
      ->where('category_id', $category)
      ->groupBy('city', 'country')
      ->orderBy('profile', 'DESC')
      ->limit(20)
      ->get();

    $this->profilesList = $this->profiles();
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
    if($this->city){
      return Profile::query()
        ->when(
          $this->search,
          fn(Builder $q) => $q->where(
            DB::raw('lower(name)'),
            'like',
            '%' . strtolower($this->search) . '%')
        )
        ->where('category_id',$this->category->id)
        ->where(
          'city',
          '=',
          $this->city
        )
        ->get();


    }
    return Profile::query()
      ->when(
        $this->search,
        fn(Builder $q) => $q->where(
          DB::raw('lower(name)'),
          'like',
          '%' . strtolower($this->search) . '%')
      )
      ->where('category_id',$this->category->id)
      ->limit(4)
      ->get();
  }

  #[NoReturn]
  public function getSearch(): void
  {
    $this->mount($this->category->id);
  }
}
