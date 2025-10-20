<x-app-layout>

    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">

        <form action="{{ route('chirps.store') }}"
              method="POST">
            @csrf

            <x-textarea name="message" id="Message"
                        placeholder="{{ __('What\'s on your mind') }}?"
                        :message="old('message')"/>

            <x-input-error :messages="$errors->get('message')" class="mt-2" rows="10"/>

            <x-primary-button class="mt-4">{{ __('Chirp') }}</x-primary-button>

        </form>


        <article class="mt-6 bg-white shadow-sm
			        rounded-lg divide-y">

            @foreach ($chirps as $chirp)

                <section class="p-6 flex space-x-2">

                    <i
                        class="fa-regular fa-comment-dots
                               fa-shake
                               text-3xl text-blue-400"
                        style="--fa-animation-duration: 2s;
                               --fa-animation-iteration-count: 2;
                               --fa-animation-timing: ease-in-out;"
                        aria-hidden="true"></i>
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <h5>
                                <span class="text-gray-800">
                                {{ $chirp->user->name }}
                                </span>
                                <small class="ml-2
			                                  text-sm text-gray-600">
                                    {{ $chirp->created_at->format('j M Y, g:i a') }}
                                </small>
                            </h5>

                            @if($chirp->user->is(auth()->user()))
                                <x-dropdown>
                                    <x-slot name="trigger">
                                        <button>
                                            <span class="sr-only">Action</span>
                                            <i class="fa-solid fa-band-aid text-3xl
                                                      hover:text-blue-500
                                                      transition duration-500 ease-in-out"></i>
                                        </button>
                                    </x-slot>
                                    <x-slot name="content">
                                        <x-dropdown-link
                                            :href="route('chirps.edit',$chirp)">
                                            {{ __('Edit') }}
                                        </x-dropdown-link>
                                        <form method="POST"
                                              action="{{ route('chirps.destroy', $chirp) }}">
                                            @csrf
                                            @method('delete')

                                            <x-dropdown-link
                                                :href="route('chirps.destroy',$chirp)"
                                                onclick="event.preventDefault(); this.closest('form').submit();">
                                                {{ __('Delete') }}
                                            </x-dropdown-link>

                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            @endif

                        </div>
                        <p class="mt-4 text-lg text-gray-900">
                            {{ $chirp->message }}
                        </p>

                        <div class="text-right">
                            @livewire('like-dislike', [$chirp])
                        </div>

                    </div>
                </section>
            @endforeach
        </article>

    </div>

</x-app-layout>
