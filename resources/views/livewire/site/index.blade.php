<div class="w-full flex flex-col">

    <main class="flex flex-col items-center gap-12 p-8">
        <div class="flex flex-col items-center gap-2">

            <img class="w-2/3" src="{{ asset('assets/images/logo.svg') }}" alt="logo" />
        </div>

        <div class="flex flex-col lg:flex-row w-full gap-8">
            @foreach ($cateogies as $category)
                <div class="w-full">
                    <a wire:click="getProfileList('{{ $category->id }}')" href="#">
                        <div
                            class="border-5 flex flex-col items-center rounded-br-3xl rounded-tl-3xl border-primary bg-secondary p-8 shadow-xl">
                            <span class="font-black italic text-white">{{ $category->category }}</span>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>

        @livewire('site.stories')

    </main>

    <x-modal wire:model="myModal" title="Adult Content" separator>
        <div class="flex w-full flex-col justify-center">
            <div class="flex flex-col items-center">
                <img class="w-32" src="{{ asset('assets/images/icon.svg') }}" />
            </div>

            <div>
                <p class="text-center p-8">
                    I understand that the <span class="bold text-primary">onlyescortsintim.com</span> platform contains
                    explicit content intended for adults</p><br>
                <span><a href="#" @click="$wire.termUse = true" class="font-bold text-primary">Terms of
                        Use</a></span><br><br>

                <span class="font-bold">NOTICE COOKIES</span>
                <p>
                    We use cookies and other similar technologies to improve your experience on our website.
                </p>
            </div>
        </div>

        <x-slot:actions>
            <div class="flex w-full flex-col items-center">
                <x-button label="I Agree" class="btn-primary" @click="$wire.acceptTerm" />
            </div>

        </x-slot:actions>
    </x-modal>

    <x-modal wire:model="termUse" title="Terms of Use" separator>
        <div class="flex w-full flex-col justify-center">
            <div class="flex flex-col items-center">
                <img class="w-16" src="{{ asset('assets/images/icon.svg') }}" />
            </div>
            <p>
                <b>1. Confirmed Majority and Personal Responsibility</b><br>

                By accessing the platform, you declare and confirm that you are over 18 years of age, and that in
                accordance with the laws of your country of residence, you are legally authorized to view and interact
                with adult content. This is a non-negotiable requirement to continue browsing.
            </p><br>

            <p>
                <b>2. Erotic and Adult Content - Personal Use and Responsibility</b><br>

                Contains material of an erotic and adult nature. By proceeding, you acknowledge that you are doing so
                solely for your personal and private use. You irrevocably undertake not to share, disclose or distribute
                this content to minors under the age of 18 or to any person for whom access to this type of content is
                restricted by local, national or moral laws.
            </p><br>

            <p>
                <b>3. Legal and Criminal Liability</b><br>

                It is extremely important to understand that you fully assume civil and criminal liability for any
                misuse of materials, including photographs, videos and other resources available on this website. The
                advertisements present do not imply any transfer of image rights to visitors or users. Improper use may
                result in serious legal consequences.
            </p><br>

            <p>
                <b>4. Nature of the Only Escorts platform</b><br>

                By accessing the platform, you declare and confirm that you are over 18 years of age, and that in
                accordance with the laws of your country of residence, you are legally authorized to view and interact
                with adult content. This is a non-negotiable requirement to continue browsing.
            </p><br><br>

            <span class="bg-primary/50 italic text-xs p-4 rounded-br-3xl rounded-tl-3xl">
                By continuing to browse this platform, you are expressly agreeing to all the conditions and terms
                mentioned above. Please ensure that you strictly comply with all applicable laws and regulations in your
                jurisdiction before proceeding.
            </span>

        </div>

        <x-slot:actions>
            <div class="flex w-full flex-col items-center">
                <x-button label="Close" class="btn-primary" @click="$wire.termUse = false" />
            </div>

        </x-slot:actions>
    </x-modal>


</div>
