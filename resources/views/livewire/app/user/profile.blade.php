<div class="w-full">
    <x-form class="flex flex-col gap-4" wire:submit.prevent="save">
        <x-input wire:model="data.name" label="Name" value="{{ $data['name'] }}" />
        <x-textarea class="h-64" wire:model="data.about_me" label="About Me" value="{{ $data['about_me'] }}" />
        <div class="flex flex-col lg:flex-row gap-4 justify-items-stretch">
            <div class="w-full flex flex-col gap-1 ">
                <label class="font-bold text-sm">Phone</label>
                <input
                    class=" bg-white border border-primary focus:outline-primary focus:outline-offset-4 border-1 p-2 rounded-md "
                    type="text" wire:model="data.phone" value="{{ $data['phone'] }}" />
            </div>
            <div class="w-full flex flex-col gap-1">
                <label class="font-bold text-sm">Birth</label>
                <input
                    class=" bg-white border border-primary focus:outline-primary focus:outline-offset-4 border-1 p-2 rounded-md "
                    type="text" wire:model="data.birth" value="{{ $data['birth'] }}" />
            </div>
            <div class="w-full flex flex-col gap-1">
                <label class="font-bold text-sm">Gender</label>
                <input
                    class=" bg-white border border-primary focus:outline-primary focus:outline-offset-4 border-1 p-2 rounded-md "
                    type="text" wire:model="data.gender" value="{{ $data['gender'] }}" />
            </div>

        </div>
        <div class="flex flex-col lg:flex-row gap-4 justify-items-stretch">
            <div class="w-full flex flex-col gap-1">
                <label class="font-bold text-sm">City</label>
                <input
                    class=" bg-white border border-primary focus:outline-primary focus:outline-offset-4 border-1 p-2 rounded-md "
                    type="text" wire:model="data.city" value="{{ $data['city'] }}" />
            </div>
            <div class="w-full flex flex-col gap-1">
                <label class="font-bold text-sm">Country</label>
                <input
                    class=" bg-white border border-primary focus:outline-primary focus:outline-offset-4 border-1 p-2 rounded-md "
                    type="text" wire:model="data.country" value="{{ $data['country'] }}" />
            </div>
        </div>
        <x-menu-separator />
        <div class="flex flex-col lg:flex-row gap-4 justify-items-stretch">
            <div class="w-full flex flex-col gap-1">
                <label class="font-bold text-sm">Avatar</label>
                <input placeholder="Select your image for upload"
                    class=" bg-white border border-primary focus:outline-primary focus:outline-offset-4 border-1 p-2 rounded-md "
                    type="file" wire:model="avatar" />
            </div>
            <div class="w-full flex flex-col gap-1">
                <label class="font-bold text-sm">Slide</label>
                <input placeholder="Select your image for upload"
                    class=" bg-white border border-primary focus:outline-primary focus:outline-offset-4 border-1 p-2 rounded-md "
                    type="file" wire:model="slide" />
            </div>
        </div>

        <x-menu-separator />
        <div class="flex flex-col lg:flex-row gap-4 lg:justify-end">
            <x-button type="submit" label="Save" class="lg:w-1/3 w-full btn-primary btn" />
            <x-button label="Cancel" class="lg:w-1/3 w-full" />
        </div>
    </x-form>
</div>
