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


        <div class="mt-6 bg-white shadow-sm
			rounded-lg divide-y">

            @foreach ($chirps as $chirp)

                <div class="p-6 flex space-x-2">

                    <i
                        class="fa-regular fa-comment-dots
	              fa-shake
	              text-xl text-blue-400"
                        style="--fa-animation-duration: 2s;
                   --fa-animation-iteration-count: 2;
                  --fa-animation-timing: ease-in-out;"
                        aria-hidden="true"></i>
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div>
                <span class="text-gray-800">
                {{ $chirp->user->name }}
                </span>
                                <small class="ml-2
			                 text-sm text-gray-600">
                                    {{ $chirp->created_at->format('j M Y, g:i a') }}
                                </small>
                            </div>
                        </div>
                        <p class="mt-4 text-lg text-gray-900">
                            {{ $chirp->message }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

</x-app-layout>
