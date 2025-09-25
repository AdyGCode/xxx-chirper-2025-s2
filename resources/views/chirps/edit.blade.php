<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">

        <form action="{{ route('chirps.update', $chirp) }}"
              method="POST">
            @csrf
            @method('patch')

            <x-textarea name="message" id="Message"
                        :rows="6"
                        placeholder="{{ __('What\'s on your mind') }}?"
                        :message="old('message', $chirp->message)"/>

            <x-input-error :messages="$errors->get('message')" class="mt-2" rows="10"/>

            <div class="mt-4 space-x-2">
                <x-primary-button>
                    {{ __('Save') }}
                </x-primary-button>
                <a href="{{ route('chirps.index') }}">
                    {{ __('Cancel') }}
                </a>
            </div>

        </form>
    </div>
</x-app-layout>
