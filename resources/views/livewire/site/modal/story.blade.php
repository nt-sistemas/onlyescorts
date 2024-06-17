<div>
    <x-modal wire:model="storiesModal" class="h-full backdrop-blur" persistent>
        <!-- Slider main container -->
        <div class="bg-white border swiper" effect="'cube'">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                @foreach ($stories as $story)
                    <div
                        class="flex flex-col object-top h-full max-w-2xl swiper-slide avatar rounded-tl-3xl rounded-br-3xl">
                        <img src="{{ URL::asset(Storage::url($story->path)) }}" />


                    </div>
                @endforeach

            </div>

        </div>
        <x-button label="Open Persistent" @click="$wire.storiesModal=false" />
    </x-modal>

</div>

@script
    <script>
        const swiper = new Swiper('.swiper', {
            // configure Swiper to use modules
            modules: [Navigation, Autoplay, EffectCube],

            autoplay: {
                delay: 1000,

            },
            loop: true,
            effect: 'fade',

            fadeEffect: {
                crossFade: false
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            cubeEffect: {
                slideShadows: true,
                shadow: false,
                shadowOffset: 20,
                shadowScale: 0.94,
            },

        });
    </script>
@endscript
