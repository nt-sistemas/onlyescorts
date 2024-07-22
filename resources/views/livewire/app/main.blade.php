<div>
    <x-header :title="'Hello, ' . auth()->user()->name" size="text-3xl" separator />
    <div class="w-full bg-gray-300 p-4 rounded-lg flex justify-between">
        <h4 class="font-bold">Status</h4>

        @if ($online)
            <x-badge value="Online" class="badge-success font-bold text-white" wire:click="openModalOnline" />
        @else
            <x-badge value="Offline" class="bg-red-500 font-bold text-white" wire:click="openModalOnline" />
        @endif
    </div>


    <h2 class="text-3xl text-primary font-sans mt-16 font-black">View Count</h2>
    <x-menu-separator />
    <x-stat title="Views" value="{{ count($views) }}" icon="o-eye" class="bg-secondary/50 mt-8" color="text-white" />

    <h2 class="text-3xl text-primary font-sans mt-16 font-black">Last Views</h2>
    <x-menu-separator />

    <x-table :headers="$headers" :rows="$views" class="mt-8 bg-primary/50">
        @scope('cell_created_at', $view)
            {{ date('Y-m-d H:i', strtotime($view->created_at)) }}
        @endscope

    </x-table>

    @livewire('app.modal.online')


</div>
