<div class="flex flex-col p-2 lg:p-8">
    @if($city)
        <x-header :title="$city" subtitle="Your City searched" size="text-xl" separator/>
    @else
        <x-header :title="$category['category']" subtitle="Your category searched" size="text-xl" separator/>
    @endif


    <div class="flex flex-col items-center">
        <h1 class="text-2xl text-primary font-black">Cities</h1>
        <div class="w-2/3 flex flex-row flex-wrap gap-2 justify-center">
            @foreach($cities as $city)
                <a href="#" wire:click="getProfileCity('{{$category['id']}}','{{$city->city}}')">
                    <x-badge class="badge-primary" value="{{$city->city}}"/>
                </a>
            @endforeach
        </div>
    </div>
    <x-menu-separator/>


    <div class="flex flex-col items-center gap-4 lg:p-8 w-full">
        @foreach($list as $row)
            <div
                class="bg-secondary w-full lg:w-2/3 rounded-tl-3xl rounded-br-3xl p-2 lg:p-4 flex flex-row gap-4 shadow-lg">
                <div class="w-3/4 lg:w-1/4 rounded-tl-3xl rounded-br-3xl ">
                    <img
                        class="h-full avatar  max-w-2xl rounded-tl-3xl rounded-br-3xl flex flex-col"
                        src="{{URL::asset(Storage::url($row->avatar))}}"
                        alt="logo"
                        style="
                                display: flex;
                                width: 95%;
                                height: 25vh;
                                position: inherit;
                                object-fit: cover;
                            "
                    />
                </div>
                <div class="w-3/4 flex flex-col gap-2">
                    <a class="hover:text-primary link" wire:click="getProfile('{{$row->slug}}')"><span
                            class=" text-lg lg:text-3xl font-bold">{{$row->name}}</span></a>
                    <p class="text-lg hidden md:block lg:block  italic">{{$row->about_me}}</p>
                    <div class="flex flex-col lg:flex-row justify-between">
                        <x-icon name="s-calendar" label="{{\Carbon\Carbon::parse($row->birth)->age}} Years"/>
                        <x-icon name="s-sparkles" label="{{$row->gender}}" class="capitalize"/>
                        <x-icon name="s-map-pin" label="{{$row->city}}"/>
                        <x-icon name="s-globe-europe-africa" label="{{$row->country}}"/>
                    </div>
                </div>

            </div>
        @endforeach
    </div>

</div>
