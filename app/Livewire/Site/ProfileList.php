<?php

namespace App\Livewire\Site;

use App\Models\Profile;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ProfileList extends Component
{
    public ?string $city = '';
    public $list = null;

    public function mount(string $city = null):void
    {
        $profiles = Profile::query()
            ->where('city',$city)
            ->get();
        $this->city = $city;
        $this->list = $profiles;
    }


    #[Layout('components.layouts.site')]
    public function render()
    {
        return view('livewire.site.profile-list');
    }

    public function getProfile($slug): void
    {
        $this->redirectRoute('site.profile',['slug' => $slug]);
    }
}
