<?php

namespace App\Livewire\App\User;


use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Illuminate\Support\Collection;
use Livewire\WithFileUploads;
use function PHPUnit\Framework\isEmpty;

class Profile extends Component
{
    use WithFileUploads;

    public $profile = null;
    public $data = [
        'name' => '',
        'about_me' => '',
        'phone' => '',
        'birth' => '',
        'gender' => '',
        'city' => '',
        'country' => '',
    ];

    #[Validate(['max:12288'])]
    public $avatar;

    #[Validate(['max:12288'])]
    public $slide;

    #[Computed]
    public function mount(): void
    {
        $this->profile = \App\Models\Profile::query()
            ->where('user_id', auth()->user()->id)
            ->first();

        if ($this->profile) {
            $this->data['name'] = $this->profile->name;
            $this->data['about_me'] = $this->profile->about_me;
            $this->data['phone'] = $this->profile->phone;
            $this->data['birth'] = $this->profile->birth;
            $this->data['gender'] = $this->profile->gender;
            $this->data['city'] = $this->profile->city;
            $this->data['country'] = $this->profile->country;
        };


    }

    public function render(): View
    {
        return view('livewire.app.user.profile');
    }

    public function save(): void
    {
        $user = auth()->user();
        $profile = \App\Models\Profile::query()->where('user_id', $user->id)->first();
        $data = $this->data;

        if (!$this->profile == null) {
            if (!$this->avatar == null) {
                $data['avatar'] = $this->avatar->store(path: auth()->user()->slug);
            }
            if (!$this->slide == null) {
                $data['slide'] = $this->slide->store(path: auth()->user()->slug);
            }
            $profile->update($data);
            redirect(route('profile'));
        }else{
            $user->profile()->create($data);
            redirect(route('profile'));
        }



    }
}
