<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="family_name" value="{{ __('苗字') }}" />
                <x-jet-input id="family_name" class="block mt-1 w-full" type="text" name="family_name" :value="old('family_name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="first_name" value="{{ __('名前') }}" />
                <x-jet-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="family_name_hira" value="{{ __('ふりがな (苗字)') }}" />
                <x-jet-input id="family_name_hira" class="block mt-1 w-full" type="text" name="family_name_hira" :value="old('family_name_hira')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="first_name_hira" value="{{ __('ふりがな (名前)') }}" />
                <x-jet-input id="first_name_hira" class="block mt-1 w-full" type="text" name="first_name_hira" :value="old('first_name_hira')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('メールアドレス') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="generation" value="{{ __('学期') }}" />
                <x-jet-input id="generation" class="block mt-1 w-full" type="number" name="generation" :value="old('generation')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('パスワード') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('パスワード (確認)') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('すでに登録されている方') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('登録') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
