<div class="w-full">
    <x-header title="Galery" size="text-xl" separator/>

    <div>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form wire:submit.prevent="save" class="flex flex-col items-center w-full gap-8">
            <div class="w-full">
                <input type="file" wire:model="files" class="w-full" multiple/>
                @error('files.*') <span class="error">{{ $message }}</span>@enderror
            </div>

            <button class="btn btn-primary w-full" type="submit">Save photo</button>
        </form>
    </div>
    <br><br>
    <x-header title="Media Galery" size="text-xl" separator/>
    <div data-te-lightbox-init class="flex flex-row gap-12 flex-wrap justify-center">

        @foreach($media as $row)
            <div
                class=" flex flex-col justify-center w-10/12 lg:w-3/12  rounded-tl-2xl rounded-br-2xl object-cover">
                <div>
                    <a href="{{$row['url']}}" data-lightbox="example-set" data-title="Teste" class="flex justify-end">
                        <img class="relative rounded-tl-2xl rounded-br-2xl cursor-zoom-in " src="{{$row['url'] }}"
                             alt="image">
                        <div class="absolute flex flex-row justify-end p-2">
                            <x-button class="btn btn-error" wire:click="delete({{$row['id']}})" icon="o-trash"/>
                        </div>
                    </a>
                </div>
            </div>

        @endforeach

    </div>


</div>
