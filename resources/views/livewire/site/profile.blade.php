<div class="h-screen flex flex-col w-full bg-gray-200 gap-4 p-4 lg:p-6 lg:gap-8 ">
    <div class="min-h-96 bg-white rounded-tl-3xl rounded-br-3xl shadow-lg p-4">
        <div class="flex h-full flex-col  items-center rounded-tl-3xl rounded-br-3xl">
            <div class="w-full invisible lg:visible">
                <a href="{{URL::asset(Storage::url($profile->slide))}}" data-lightbox="Capa"
                   data-title="{{$profile->name}}">
                    <img class="object-cover w-full rounded-tl-3xl rounded-br-3xl h-48" src="{{URL::asset(Storage::url($profile->slide))}}"
                         alt="{{$profile->slug}}"/>
                </a>
            </div>
            <div class="w-full flex flex-row items-center justify-center lg:visible bg-amber-700">
                <a class="w-full flex flex-row items-center justify-center" href="{{URL::asset(Storage::url($profile->avatar))}}" data-lightbox="{{$profile->name}}"
                   data-title="{{$profile->name}}">
                    <img class=" absolute top-8 lg:top-24 object-cover shadow-lg object-top rounded-full h-48 w-48 lg:h-64 lg:w-64"
                         src="{{URL::asset(Storage::url($profile->avatar))}}"
                         alt="{{$profile->slug}}"/>
                </a>
            </div>
            <div class=" top-56 w-full h-full p-4 flex flex-col lg:flex-row items-center lg:gap-72">
              <div class="w-full  flex flex-col ">
                <span class="text-primary  font-bold text-lg lg:text-2xl">{{$profile->name}}</span>
                <span class=" text-md lg:text-xl">{{\Carbon\Carbon::parse($profile->birth)->age}} Years</span>
                <div class="flex flex-row text-bold text-sm lg:text-xl justify-start gap-4 lg:gap-8">
                  <x-icon name="s-sparkles" label="{{$profile->gender}}" class="capitalize"/>
                  <x-icon name="s-map-pin" label="{{$profile->city}}"/>
                  <x-icon name="s-globe-europe-africa" label="{{$profile->country}}"/>
                </div>
              </div>
              <div class="w-full lg:w-1/3 lg:justify-center h-full flex flex-col p-2 lg:p-4 rounded-tl-3xl rounded-br-3xl gap-4 ">
                <div class=" flex items-center justify-between text-bold text-xl gap-4 lg:p-8 lg:justify-center w-full">
                  <x-button class="link" tooltip="Send Message for Whatsapp">
                    <img src="{{asset('assets/icons/whats.svg')}}" class="h-10 w-10"/>
                  </x-button>
                  <x-button class="link" tooltip="View Profile in Instagram">
                    <img src="{{asset('assets/icons/instagram.svg')}}" class="h-10 w-10"/>
                  </x-button>
                  <x-button class="link" tooltip="Do send a call">
                    <img src="{{asset('assets/icons/phone.svg')}}" class="h-10 w-10" hint/>
                  </x-button>
                </div>

              </div>
            </div>

        </div>
    </div>

    <div class="h-2/12 bg-white rounded-tl-3xl rounded-br-3xl shadow-lg p-4">
        <p class="text-lg italic">{{$profile->about_me}}</p>
    </div>

    <div class="h-6/12 bg-white rounded-tl-3xl rounded-br-3xl shadow-lg p-4">
        <x-header title="Media Galery" size="text-xl" separator/>
        <div data-te-lightbox-init class="flex flex-row gap-12 flex-wrap justify-center">
            @foreach($images as $image)
                <div
                    class=" flex flex-col justify-center w-10/12 lg:w-3/12  rounded-tl-2xl rounded-br-2xl object-cover">
                    <div>
                        <a href="{{URL::asset(Storage::url($image->path))}}" data-lightbox="{{$profile->slug}}" data-title="{{$profile->name}}" class="flex justify-end">
                            <img class="relative rounded-tl-2xl rounded-br-2xl cursor-zoom-in " src="{{URL::asset(Storage::url($image->path))}}"
                                 alt="image">
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

</div>
