<div>
    <x-modal wire:model="storiesModal" class="bg-black backdrop-blur" persistent>
        <!-- Slider main container -->
        <div class="">
            <div x-init="new Swiper($el, {
                modules: [Navigation, Pagination, Autoplay],

                loop: true,

                autoplay: {
                    delay: 3000,
                },

                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },

                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            })" class="border swiper">
                <!-- Additional required wrapper -->
                <div x-cloak class="swiper-wrapper">

                    @foreach ($stories as $story)
                        <div class="static flex flex-col swiper-slide">
                            <x-button label="X"
                                class="absolute top-1 right-1 bg-secondary/20 text-white font-bold text-xl border-none"
                                wire:click="storiesModal=false" />

                            <img class="w-full rounded-tl-3xl rounded-br-3xl"
                                src="{{ URL::asset(Storage::url($story->path)) }}"
                                style="
                                display: flex;
                                width: 100%;
                                height: 70vh;
                                object-fit: cover;
                                " />
                        </div>
                    @endforeach
                </div>

                <div class="swiper-pagination">
                </div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>


        </div>

    </x-modal>

</div>

@assets
    <style>
        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-pagination {
            position: absolute;
            bottom: 0;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-button-prev,
        .swiper-button-next {
            position: absolute;
            top: 50%;
            width: 30px;
            height: 30px;
            margin-top: -15px;
            z-index: 10;
            cursor: pointer;

            color: pink !important;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-button-prev {
            left: 10px;
        }

        .swiper-button-next {
            right: 10px;
        }

        .swiper-pagination-bullet {
            width: 25px !important;
            height: 25px !important;
            text-align: center;
            line-height: 25px !important;

            color: #000;
            opacity: 1;
            background: rgba(0, 0, 0, 0.2);
        }

        .swiper-pagination-bullet-active {
            color: #fff;
            background: pink !important;
        }

    @endassets
