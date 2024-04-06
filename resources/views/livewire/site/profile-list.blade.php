<div class="flex flex-col p-2 lg:p-8">
  <div class="flex flex-col w-full bg-white/70 p-4 shadow-lg">
    <x-header :title="$category['category']" subtitle="Your category searched" size="text-xl" separator/>


    <div class="flex flex-col items-center">
         <span class="w-full lg:w-1/3 mb-8">
            <x-input
              wire:model.live="search"
              wire:change="getSearch"
              class="w-full rounded-none rounded-bl-3xl rounded-tr-3xl border-0 bg-gray-200 text-center shadow-lg"
              placeholder="Enter a word to search" icon="m-magnifying-glass"/>
        </span>
      <h1 class="text-2xl text-primary font-black">{{$city ?? 'Cities'}}</h1>

      <ul class="list_column">
        @foreach($cities as $city)
          <li>
            <a class="text-xs" href="#" wire:click="getProfileCity('{{$city->city}}')">
              {{$city->city}}
              <span class="font-bold text-xs">({{$city->profile}})</span>
            </a>
          </li>

        @endforeach
      </ul>
    </div>
  </div>

  <div class="flex flex-col items-center gap-4 lg:p-8 w-full">
    @php
      $headers = [
         ['key' => 'id','label' => '']
      ]
    @endphp
    <x-table class="w-full" :rows="$profilesList" :headers="$headers" no-headers>
      @scope('cell_id',$row)
      <div
        class="bg-secondary w-full rounded-tl-3xl rounded-br-3xl p-2 lg:p-4 flex flex-row gap-4 shadow-lg">
        <div class="w-3/4 lg:w-1/4 rounded-tl-3xl rounded-br-3xl ">
          <img
            class="h-full avatar object-top  max-w-2xl rounded-tl-3xl rounded-br-3xl flex flex-col"
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
        <div class="w-3/4 flex flex-col gap-2 text-white">
          <a class="hover:text-primary link" wire:click="getProfile('{{$row->slug}}')"><span
              class=" text-lg lg:text-3xl font-bold">{{$row->name}}</span></a>
          <p class="text-lg hidden lg:block  italic">{{Str::limit($row->about_me,300, $end='...')}}</p>
          <div class="flex flex-col lg:flex-row justify-between gap-8">
            <div class="flex flex-col gap-4 lg:flex-row lg:gap-2">
              <x-icon name="s-calendar" label="{{\Carbon\Carbon::parse($row->birth)->age}} Years"/>
              <x-icon name="s-sparkles" label="{{$row->gender}}" class="capitalize"/>
              <x-icon name="s-map-pin" label="{{$row->city}}"/>
              <x-icon name="s-globe-europe-africa" label="{{$row->country}}"/>
            </div>

            <div
              class="rounded-tl-xl rounded-br-xl bg-primary flex flex-row p-2 gap-8 lg:w-1/5 items-center justify-center">
              <a href="#"><img src="{{asset('assets/icons/whats.svg')}}" class="h-6 w-6"/></a>
              <a href="#"><img src="{{asset('assets/icons/instagram.svg')}}" class="h-6 w-6"/></a>
            </div>
          </div>

        </div>

      </div>
      @endscope
    </x-table>

  </div>


</div>
