<div class="w-full flex flex-col justify-center items-center">
    <x-card shadow class="mt-8 lg:w-1/3 lg:h-3/4 w-full m-2 bg-secondary rounded-bl-3xl rounded-tr-3xl">
        <div class="flex flex-col items-center m-4">
            <img class="w-16" src="{{ asset('assets/images/icon.svg') }}" />
            <span class="font-black text-xl">Register your Informations</span>
        </div>

        @if($errors->has('invalidCredentials'))
            <x-alert icon="o-exclamation-triangle" class="alert-error mb-4">
                @error('invalidCredentials')
                <span>{{ $message }}</span>
                @enderror
            </x-alert>
        @endif
        <x-form wire:submit="save">
            <x-input label="Name" wire:model="name" />
            <x-datetime label="Birth Date" wire:model="birth" icon="o-calendar" />
            <x-input label="Email" wire:model="email"/>
            <x-input label="Confirm your email" wire:model="email_confirmation"/>
            <x-input label="Password" wire:model="password" type="password"/>
            <x-slot:actions>
                <x-button label="Reset" type="reset"/>
                <x-button label="Register" class="btn-primary" type="submit" spinner="submit"/>
            </x-slot:actions>
        </x-form>
    </x-card>

</div>
