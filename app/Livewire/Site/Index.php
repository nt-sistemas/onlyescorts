<?php

namespace App\Livewire\Site;

use App\Models\Category;
use App\Models\Profile;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    public bool $myModal;

    public $maleCity =  null;

    public $femaleCity =  null;

    public $transCity =  null;

    public $cateogies = null;

    #[Computed()]
    public function mount()
    {
        $this->myModal = true;

        $this->cateogies = Category::all();

        $this->maleCity = Profile::select(['city','country', DB::raw("count(id) as profile")])
            ->where('gender','male')
            ->groupBy('city','country')
            ->orderBy('profile','DESC')
            ->limit(20)
        ->get();

        $this->femaleCity = Profile::select(['city','country', DB::raw("count(id) as profile")])
            ->where('gender','female')
            ->groupBy('city','country')
            ->orderBy('profile','DESC')
            ->limit(20)
            ->get();

        $this->transCity = Profile::select(['city','country', DB::raw("count(id) as profile")])
            ->where('gender','trans')
            ->groupBy('city','country')
            ->orderBy('profile','DESC')
            ->limit(20)
            ->get();


    }

    #[Layout('components.layouts.site')]
    public function render()
    {
        return view('livewire.site.index');
    }

    #[Layout('components.layouts.site')]
    public function getProfileList($category ): void
    {
       $this->redirectRoute('profile-list',['category'=>$category]);
    }
}
