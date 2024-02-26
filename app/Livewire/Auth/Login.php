<?php

namespace App\Livewire\Auth;

use Illuminate\Cache\RateLimiter;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;

class Login extends Component
{
    use Toast;

    public ?string $email = null;
    public ?string $password = null;


    public function login()
    {

        if (!Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            $this->error(
                title: 'Favor Verificar suas Credenciais!',
                description: null,
                position: 'toast-top toast-end',
                icon: 'o-information-circle',
                timeout: 3000,
                redirectTo: null
            );

            return;
        }

        $this->success(
            title: 'Seja Bem vindo',
            description: auth()->user()->name,
            position: 'toast-top toast-end',
            icon: 'o-information-circle',
            timeout: 5000,
            redirectTo: null
        );

        $this->redirect(route('main'));



    }

    #[Layout('components.layouts.site')]
    public function render()
    {
        return view('livewire.auth.login');
    }

}
