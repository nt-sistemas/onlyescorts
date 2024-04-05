<?php

namespace App\Livewire\Site;

use App\Models\Category;
use App\Models\Profile;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

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
    public $category = null;

    public $cities = null;

    public ?string $city = null;

    public $list = null;

    /**
     * Undocumented function
     *
     * @param [type] $category Teste
     * @param [type] $city     teste
     *
     * @return void
     */
    public function mount($category = null, $city = null): void
    {
        $this->category = $category;
        if (! $city) {
            $this->city = null;
            $profiles = Profile::query()
                ->where('category_id', $this->category)
                ->get();
        } else {
            $profiles = Profile::query()
                ->where('category_id', $this->category)
                ->where('city', $city)
                ->get();
        }

        $this->category = Category::query()
            ->where('id', $category)
            ->first();

        $this->cities = Profile::select(['city', 'country', DB::raw('count(id) as profile')])
            ->where('category_id', $category)
            ->groupBy('city', 'country')
            ->orderBy('profile', 'DESC')
            ->limit(20)
            ->get();

        $this->list = $profiles;
    }

    /**
     * Renderß function
     *
     * @return View
     */
    #[Layout('components.layouts.default')]
    public function render(): View
    {
        return view('livewire.site.profile-list');
    }

    public function getProfileCity($category, $city): void
    {
        $this->mount($category, $city);
        //$this->city = $city;
        //$this->redirectRoute('profile-list', ['category' => $category, 'city' => $city]);
    }

    public function getProfile($slug): void
    {
        $this->redirectRoute('site.profile', ['slug' => $slug]);
    }
}
