<div class="flex flex-col p-2 lg:p-8">
    <div class="flex flex-col w-full p-4 shadow-lg bg-white/70">
        <x-header :title="$category['category']" subtitle="Your category searched" size="text-xl" separator />


        <div class="flex flex-col items-center">
            <span class="w-full mb-8 lg:w-1/3">
                <x-input wire:model.live="search" wire:change="getSearch"
                    class="w-full text-center bg-gray-200 border-0 rounded-none shadow-lg rounded-bl-3xl rounded-tr-3xl"
                    placeholder="Enter a name or city to search" icon="m-magnifying-glass" />
            </span>
            <h1 class="text-2xl font-black text-primary">{{ $city ?? 'Cities' }}</h1>

            <ul class="list_column">
                @foreach ($cities as $city)
                    <li>
                        <a class="text-xs lg:text-lg" href="#" wire:click="getProfileCity('{{ $city->city }}')">
                            {{ $city->city }}
                            <span class="text-xs font-bold lg:text-lg">({{ $city->profile }})</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="flex flex-col gap-8">

        <div class="flex flex-col items-center w-full gap-4 lg:p-8">
            @php
                $headers = [['key' => 'id', 'label' => '']];
            @endphp
            <x-table class="w-full" :rows="$profilesList" :headers="$headers" no-headers>
                @scope('cell_id', $row)
                    <div class="flex flex-row w-full gap-4 p-2 shadow-lg bg-secondary rounded-tl-3xl rounded-br-3xl lg:p-4">
                        <div class="w-3/4 lg:w-1/4 rounded-tl-3xl rounded-br-3xl ">
                            <img class="flex flex-col object-top h-full max-w-2xl avatar rounded-tl-3xl rounded-br-3xl"
                                src="{{ URL::asset(Storage::url($row->avatar)) }}" alt="logo"
                                style="
                                display: flex;
                                width: 95%;
                                height: 25vh;
                                position: inherit;
                                object-fit: cover;
                            " />
                        </div>
                        <div class="flex flex-col w-3/4 gap-2 text-white">
                            <a class="hover:text-primary link" wire:click="getProfile('{{ $row->slug }}')"><span
                                    class="text-lg font-bold lg:text-3xl">{{ $row->name }}</span></a>
                            <p class="hidden text-lg italic lg:block">{{ Str::limit($row->about_me, 300, $end = '...') }}
                            </p>
                            <div class="flex flex-col justify-between gap-8 lg:flex-row">
                                <div class="flex flex-col gap-4 lg:flex-row lg:gap-2">
                                    <x-icon name="s-calendar" label="{{ \Carbon\Carbon::parse($row->birth)->age }} Years" />
                                    <x-icon name="s-sparkles" label="{{ $row->gender }}" class="capitalize" />
                                    <x-icon name="s-map-pin" label="{{ $row->city }}" />
                                    <x-icon name="s-globe-europe-africa" label="{{ $row->country }}" />
                                </div>
                            </div>

                        </div>

                    </div>
                @endscope
            </x-table>

        </div>
    </div>

</div>
