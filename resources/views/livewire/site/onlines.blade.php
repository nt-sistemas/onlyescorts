<div class="flex flex-wrap gap-4 lg:w-2/3 justify-center">
    @foreach ($profiles as $profile)
        <a href="{{ route('site.profile', $profile->slug) }}">
            <div class="avatar online">
                <div class="w-16 rounded-full  shadow-xl">
                    <img src="{{ URL::asset(Storage::url($profile->avatar)) }}" />
                </div>
            </div>
        </a>
    @endforeach

</div>
