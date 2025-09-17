<x-app-layout>

    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">

        <form action="{{ route('chirps.store') }}"
              method="POST">
            @csrf

            <x-textarea name="message" id="Message"
                        placeholder="{{ __('What\'s on your mind') }}?"
                        :message="old('message')" />

            <x-input-error :messages="$errors->get('message')" class="mt-2" rows="10" />

            <x-primary-button class="mt-4">{{ __('Chirp') }}</x-primary-button>

        </form>

    </div>

</x-app-layout>
