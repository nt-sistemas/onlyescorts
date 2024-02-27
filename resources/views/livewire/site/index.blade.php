<div class="w-full flex flex-col">

    <main class="flex flex-col items-center gap-12 p-8">
        <div class="flex flex-col items-center gap-2">

            <img class="w-2/3" src="{{asset('assets/images/logo.svg')}}" alt="logo"/>
        </div>
        <span class="w-full lg:w-1/3">
            <x-input
                class="w-full rounded-none rounded-bl-3xl rounded-tr-3xl border-0 bg-gray-200 text-center shadow-lg"
                placeholder="Digite o nome da Cidade" icon="m-magnifying-glass"/>
        </span>

        <div class="flex flex-col lg:flex-row w-full gap-8">
            <div class="flex lg:w-1/3 flex-col items-center h-6/12 ">
                <div
                    class="border-5 flex h-full w-full flex-col items-center rounded-br-3xl rounded-tl-3xl border-primary bg-secondary p-8 shadow-xl">

                    <div>
                        <x-bi-gender-male class="h-16 w-16"/>
                        Male
                    </div>
                    <div>
                        <div class="flex flex-wrap flex-row gap-2">
                            @foreach($maleCity as $city)
                                <a href="#">
                                    <x-badge class="font-bold italic text-primary" :value="$city['city']"/>
                                </a>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
            <div class="flex lg:w-1/3 flex-col items-center h-6/12 ">
                <div
                    class="border-5 flex h-full w-full flex-col items-center rounded-br-3xl rounded-tl-3xl border-primary bg-secondary p-8 shadow-xl">

                    <div>
                        <x-bi-gender-female class="h-16 w-16"/>
                        Female
                    </div>
                    <div>
                        <div class="flex flex-wrap flex-row gap-2">
                            @foreach($femaleCity as $city)
                                <a href="#">
                                    <x-badge class="font-bold italic text-primary" :value="$city['city']"/>
                                </a>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
            <div class="flex lg:w-1/3 flex-col items-center h-6/12 ">
                <div
                    class="border-5 flex h-full w-full flex-col items-center rounded-br-3xl rounded-tl-3xl border-primary bg-secondary p-8 shadow-xl">

                    <div>
                        <x-bi-gender-trans class="h-16 w-16"/>
                        Trans
                    </div>
                    <div>
                        <div class="flex flex-wrap flex-row gap-2">
                            @foreach($transCity as $city)
                                <a href="#" wire:click="getProfileList('{{$city['city']}}')">
                                    <x-badge class="font-bold italic text-primary" :value="$city['city']"/>
                                </a>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <x-modal wire:model="myModal" title="CONTEÚDO ADULTO" separator>
        <div class="flex w-full flex-col justify-center">
            <div class="flex flex-col items-center">
                <img class="w-32" src="{{ asset('assets/images/icon.svg') }}"/>
            </div>

            <div>
                <p>Entendo que o site Fatal Modelapresenta conteúdo explícito
                    destinado a adultos.</p><br>
                <span><a href="#" class="font-bold text-primary">Termos de uso</a></span><br><br>

                <span class="font-bold">AVISO DE COOKIES</span>
                <p>Nós usamos cookies e outras tecnologias semelhantes para melhorar a sua experiência em nosso site.
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
