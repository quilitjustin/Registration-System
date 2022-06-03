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
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
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
        
        <!-- First Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="f_name" value="{{ __('First Name') }}" />
            <x-jet-input id="f_name" type="text" class="mt-1 block w-full" wire:model.defer="state.f_name" autocomplete="f_name" />
            <x-jet-input-error for="f_name" class="mt-2" />
        </div>

        <!-- Last Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="l_name" value="{{ __('Last Name') }}" />
            <x-jet-input id="l_name" type="text" class="mt-1 block w-full" wire:model.defer="state.l_name" autocomplete="l_name" />
            <x-jet-input-error for="l_name" class="mt-2" />
        </div>

        <!-- Middle Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="m_name" value="{{ __('Middle Name') }}" />
            <x-jet-input id="m_name" type="text" class="mt-1 block w-full" wire:model.defer="state.m_name" autocomplete="m_name" />
            <x-jet-input-error for="m_name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>

        <!-- Contact Number -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="contact_no" value="{{ __('Contact#') }}" />
            <x-jet-input id="contact_no" type="text" class="mt-1 block w-full" wire:model.defer="state.contact_no" />
            <x-jet-input-error for="contact_no" class="mt-2" />
        </div>

        <!-- Gender -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="gender" value="{{ __('Gender') }}" />
            <select id="gender" name="gender" class="rounded-md px-1 py-2 mt-1 block w-full" wire:model.defer="state.gender">
                <option value="null" selected disabled></option>
                @if(\Auth::user()->gender == 'Male')
                    <option value="Male" selected>Male</option>
                    <option value="Female">Female</option>
                @else
                    <option value="Male">Male</option>
                    <option value="Female" selected>Female</option>
                @endif
            </select>
            <x-jet-input-error for="gender" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
