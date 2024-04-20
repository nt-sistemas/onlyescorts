<div class="flex flex-col items-center justify-center w-full">
    <x-card shadow class="w-full p-4 m-2 mt-8 shadow-lg bg-white/50 lg:w-1/3 lg:h-3/4 rounded-bl-3xl rounded-tr-3xl">
        <div class="flex flex-col items-center gap-4 m-4">
            <img class="w-16" src="{{ asset('assets/images/icon.svg') }}" />
            <span class="text-xl font-black">Register your Informations</span>
            <span class="w-2/3 text-sm italic text-center text-primary">Your information such as name and date of birth must match the document</span>
        </div>

        @if($errors->has('invalidCredentials'))
            <x-alert icon="o-exclamation-triangle" class="mb-4 alert-error">
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
