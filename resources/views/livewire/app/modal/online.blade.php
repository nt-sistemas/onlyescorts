<div>
    <x-modal wire:model="onlineModal" class="backdrop-blur">
        <div class="mb-5">Do you want to be available to your contacts
            for 1 hour?</div>

        <x-button label="Yes" @click="$wire.isOnline()" class="bg-success w-1/3" />
        <x-button label="No" @click="$wire.onlineModal = false" class="w-1/3" />
    </x-modal>
</div>
