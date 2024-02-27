<div class="flex h-screen w-full flex-col items-center justify-center bg-secondary">
    <x-toast />
    <div class="flex h-2/4 w-1/3 flex-col items-center gap-4 rounded-bl-3xl rounded-tr-3xl bg-white p-8 shadow-xl">
        <img class="w-24" src="{{ asset('assets/images/icon.svg') }}" />
        <span class="text-2xl font-bold">Acesso Restrito</span>
        <div class="flex w-full flex-col gap-4">
            <x-input placeholder="Seu e-mail" icon="o-user" type="email" wire:model='email' />
            <x-input placeholder="Sua Senha" icon="o-lock-closed" type="password" wire:model='password' />
            <x-button label="Acessar" class="btn-primary" wire:click='login' />
        </div>
    </div>
</div>
