<div class="flex flex-col items-center justify-center w-full h-screen bg-secondary">
    <x-toast />
    <div
        class="flex flex-col items-center w-3/4 gap-4 p-8 bg-white shadow-xl h-2/4 lg:w-1/3 rounded-bl-3xl rounded-tr-3xl">
        <img class="w-24" src="{{ asset('assets/images/icon.svg') }}" />
        <span class="text-2xl font-bold">Restrict Access</span>
        <div class="flex flex-col w-full gap-4">
            <x-input placeholder="Your e-mail" icon="o-user" type="email" wire:model='email' />
            <x-input placeholder="Your password" icon="o-lock-closed" type="password" wire:model='password' />
            <x-button label="Login" class="btn-primary" wire:click='login' />
        </div>
    </div>
</div>
