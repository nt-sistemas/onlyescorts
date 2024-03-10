<?php

namespace App\Livewire\Site;

use App\Models\Category;
use App\Models\Profile;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ProfileList extends Component
{
    public $category = null;
    public $cities = null;
    public ?string $city = null;

    public $list = null;

    public function mount($category = null, $city = null): void
    {
        $this->category = $category;
        if (!$city) {
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

        $this->cities = Profile::select(['city', 'country', DB::raw("count(id) as profile")])
            ->where('category_id', $category)
            ->groupBy('city', 'country')
            ->orderBy('profile', 'DESC')
            ->limit(20)
            ->get();

        $this->list = $profiles;
    }


    #[Layout('components.layouts.site')]
    public function render()
    {
        return view('livewire.site.profile-list');
    }

    public function getProfileCity($category, $city): void
    {
        $this->mount($category,$city);
        //$this->city = $city;
        //$this->redirectRoute('profile-list', ['category' => $category, 'city' => $city]);
    }

    public function getProfile($slug): void
    {
        $this->redirectRoute('site.profile', ['slug' => $slug]);
    }
}
