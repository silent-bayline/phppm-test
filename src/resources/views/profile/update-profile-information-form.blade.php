<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview">
                    <span class="block rounded-full w-20 h-20"
                          x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- 苗字 -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="family_name" value="{{ __('苗字') }}" />
            <x-jet-input id="family_name" type="text" class="mt-1 block w-full" wire:model.defer="state.family_name" autocomplete="name" />
            <x-jet-input-error for="family_name" class="mt-2" />
        </div>

        <!-- 名前 -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="first_name" value="{{ __('名前') }}" />
            <x-jet-input id="first_name" type="text" class="mt-1 block w-full" wire:model.defer="state.first_name" autocomplete="name" />
            <x-jet-input-error for="first_name" class="mt-2" />
        </div>

        <!-- ふりがな (苗字) -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="family_name_hira" value="{{ __('ふりがな (苗字)') }}" />
            <x-jet-input id="family_name_hira" type="text" class="mt-1 block w-full" wire:model.defer="state.family_name_hira" autocomplete="name" />
            <x-jet-input-error for="family_name_hira" class="mt-2" />
        </div>

        <!-- ふりがな (名前) -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="first_name_hira" value="{{ __('ふりがな (名前)') }}" />
            <x-jet-input id="first_name_hira" type="text" class="mt-1 block w-full" wire:model.defer="state.first_name_hira" autocomplete="name" />
            <x-jet-input-error for="first_name_hira" class="mt-2" />
        </div>

        <!-- メールアドレス -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('メールアドレス') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>

        <!-- 学期 -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="generation" value="{{ __('学期') }}" />
            <x-jet-input id="generation" type="number" class="mt-1 block w-full" wire:model.defer="state.generation" />
            <x-jet-input-error for="generation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('保存') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
