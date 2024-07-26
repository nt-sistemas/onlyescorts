<div class="w-full">
    <x-header title="Galery" size="text-xl" separator />

    <div>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form wire:submit.prevent="save" class="flex flex-col items-center w-full gap-8">
            <div class="w-full">
                <input type="file" wire:model="files" class="w-full" multiple />
                @error('files.*')
                    <span class="error">File invalidate</span>
                @enderror
            </div>

            <x-loading wire:loading wire:target="files" class="text-primary loading-lg" />

            <button class="btn btn-primary w-full" type="submit" wire:loading.attr="disabled" wire:target="files">Save
                photo</button>
        </form>
    </div>
    <br><br>
    <x-header title="Media Galery" size="text-xl" separator />
    <div data-te-lightbox-init class="flex flex-row gap-12 flex-wrap justify-center">

        @foreach ($media as $row)
            <div class=" flex flex-col justify-center w-10/12 lg:w-3/12  rounded-tl-2xl rounded-br-2xl object-cover">
                @if ($row['extension'] === 'm4v' || $row['extension'] === 'mp4')
                    <div class="flex justify-end">
                        <div x-data="{ playing: false, muted: false }" class="">
                            <video class="relative rounded-tl-2xl rounded-br-2xl h-full max-w-[400px]  w-full" controls
                                x-ref="video" x-on:click="playing = !playing" x-on:play="muted = false"
                                x-on:pause="muted = true" x-bind:autoplay="playing" x-bind:muted="muted">
                                <source src="{{ $row['url'] }}" type="video/mp4">
                            </video>
                        </div>
                        <div class="absolute flex flex-row justify-end p-2">
                            <x-button class="btn btn-error" wire:click="delete({{ $row['id'] }})" icon="o-trash" />
                        </div>
                    </div>
                @else
                    <div>
                        <a href="{{ $row['url'] }}" data-lightbox="example-set" data-title="Teste"
                            class="flex justify-end">
                            <img class="relative rounded-tl-2xl rounded-br-2xl cursor-zoom-in "
                                src="{{ $row['url'] }}" alt="image">
                            <div class="absolute flex flex-row justify-end p-2">
                                <x-button class="btn btn-error" wire:click="delete({{ $row['id'] }})"
                                    icon="o-trash" />
                            </div>
                        </a>
                    </div>
                @endif
            </div>
        @endforeach

    </div>


</div>
