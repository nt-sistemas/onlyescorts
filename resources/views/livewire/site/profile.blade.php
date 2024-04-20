<div class="flex flex-col w-full h-screen gap-4 p-4 bg-gray-200 lg:p-6 lg:gap-8 ">
    <div class="p-4 bg-white shadow-lg min-h-96 rounded-tl-3xl rounded-br-3xl">
        <div class="flex flex-col items-center h-full rounded-tl-3xl rounded-br-3xl">
            <div class="w-full lg:visible">
                <a href="{{URL::asset(Storage::url($profile->slide))}}" data-lightbox="Capa"
                   data-title="{{$profile->name}}">
                    <img class="object-cover w-full h-48 rounded-tl-3xl rounded-br-3xl" src="{{URL::asset(Storage::url($profile->slide))}}"
                         alt="{{$profile->slug}}"/>
                </a>
            </div>
            <div class="flex flex-row items-center justify-center w-full lg:visible bg-amber-700">
                <a class="flex flex-row items-center justify-center w-full" href="{{URL::asset(Storage::url($profile->avatar))}}" data-lightbox="{{$profile->name}}"
                   data-title="{{$profile->name}}">
                    <img class="absolute object-cover object-top w-24 h-24 rounded-full shadow-lg top-36 lg:top-24 lg:h-56 lg:w-56"
                         src="{{URL::asset(Storage::url($profile->avatar))}}"
                         alt="{{$profile->slug}}"/>
                </a>
            </div>
            <div class="flex flex-col items-center w-full h-full p-4 top-56 lg:flex-row lg:gap-72">
              <div class="flex flex-col items-center w-full lg:items-start ">
                <span class="text-lg font-bold text-primary lg:text-2xl">{{$profile->name}}</span>
                <span class=" text-md lg:text-xl">{{\Carbon\Carbon::parse($profile->birth)->age}} Years</span>
                <div class="flex flex-row justify-start gap-4 text-sm text-bold lg:text-xl lg:gap-8">
                  <x-icon name="s-sparkles" label="{{$profile->gender}}" class="capitalize"/>
                  <x-icon name="s-map-pin" label="{{$profile->city}}"/>
                  <x-icon name="s-globe-europe-africa" label="{{$profile->country}}"/>
                </div>
              </div>
              <div class="flex flex-col items-center w-full h-full gap-4 p-2 lg:w-1/3 lg:justify-center lg:p-4 rounded-tl-3xl rounded-br-3xl">
                <div class="flex items-center justify-between w-2/3 gap-4 text-xl lg:w-full text-bold lg:p-2 lg:justify-center">
                  <a class="link" tooltip="Send Message for Whatsapp" href="https://api.whatsapp.com/send?phone={{ $profile->phone }}&text=Hello!" >
                    <img src="{{asset('assets/icons/whats.svg')}}" class="w-10 h-10"/>
                  </a>
                  <a class="link" tooltip="View Profile in Instagram">
                    <img src="{{asset('assets/icons/instagram.svg')}}" class="w-10 h-10"/>
                  </a>
                  <a class="link" tooltip="Do send a call" href="tel:{{ $profile->phone }}">
                    <img src="{{asset('assets/icons/phone.svg')}}" class="w-10 h-10" hint/>
                  </a>
                </div>

              </div>
            </div>

        </div>
    </div>

    <div class="p-4 bg-white shadow-lg h-2/12 rounded-tl-3xl rounded-br-3xl">
        <p class="text-lg italic">{{$profile->about_me}}</p>
    </div>

    <div class="p-4 bg-white shadow-lg h-6/12 rounded-tl-3xl rounded-br-3xl">
        <x-header title="Media Galery" size="text-xl" separator/>
        <div data-te-lightbox-init class="flex flex-row flex-wrap justify-center gap-12">
            @foreach($images as $image)
                <div
                    class="flex flex-col justify-center object-cover w-10/12 lg:w-3/12 rounded-tl-2xl rounded-br-2xl">
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
