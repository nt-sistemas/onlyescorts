<ul class="flex items-center justify-center gap-2 mb-8 overflow-x-auto">
    @foreach ($stories as $story)
        <li class="flex flex-col justify-center w-20 gap-1 p-2 hover:cursor-pointer hover:story">
            <div
                class="bg-gradient-to-r  p-[2px] ring-2 ring-white from-purple-400 via-pink-500 to-red-500 rounded-fullinline-flex items-center justify-center w-16 h-16 overflow-hidden text-base border border-gray-200 rounded-full shrink-0 dark:border-secondary-500">
                <img class="object-cover object-center w-full h-full rounded-full shrink-0"
                    src="{{ URL::asset(Storage::url($story->avatar)) }}" alt="stories" />

            </div>
            <p class="text-xs font-medium truncate">{{ fake()->name }}</p>
        </li>
    @endforeach

</ul>
