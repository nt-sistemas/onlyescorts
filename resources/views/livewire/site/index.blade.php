<div class="w-full flex flex-col">

    <main class="flex flex-col items-center gap-12 p-8">
        <div class="flex flex-col items-center gap-2">

            <img class="w-2/3" src="{{asset('assets/images/logo.svg')}}" alt="logo"/>
        </div>

        <div class="flex flex-col lg:flex-row w-full gap-8">
            @foreach($cateogies as $category)
                <div class="w-full">
                    <a wire:click="getProfileList('{{$category->id}}')" href="#">
                        <div
                            class="border-5 flex flex-col items-center rounded-br-3xl rounded-tl-3xl border-primary bg-secondary p-8 shadow-xl">
                            <span class="font-black italic text-white">{{$category->category}}</span>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>

    </main>

    <x-modal wire:model="myModal" title="CONTEÚDO ADULTO" separator>
        <div class="flex w-full flex-col justify-center">
            <div class="flex flex-col items-center">
                <img class="w-32" src="{{ asset('assets/images/icon.svg') }}"/>
            </div>

            <div>
                <p class="text-center p-8">I understand that the Onlye Escorts Intim website contains explicit content
                    intended for adults.</p><br>
                <span><a href="#" class="font-bold text-primary">Terms of Use</a></span><br><br>

                <span class="font-bold">NOTICE COOKIES</span>
                <p>
                    We use cookies and other similar technologies to improve your experience on our website.
                </p>
            </div>
        </div>

        <x-slot:actions>
            <div class="flex w-full flex-col items-center">
                <x-button label="Concordo" class="btn-primary" @click="$wire.myModal = false"/>
            </div>

        </x-slot:actions>
    </x-modal>


</div>
