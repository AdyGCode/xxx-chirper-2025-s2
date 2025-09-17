<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Admin Zone') }}
        </h2>
    </x-slot>

    <section class="py-12 mx-12 space-y-4">

        <header>
            <h3 class="text-2xl font-bold text-zinc-700">
                {{__('Statistics')}}
            </h3>
        </header>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <article
                class="items-center rounded-lg bg-white shadow hover:shadow-none align-middle hover:bg-zinc-700 transition duration-500 group overflow-hidden border border-zinc-700/75">
                <div class="flex">
                    <header
                        class="w-1/4 bg-zinc-700 text-white  flex items-center justify-center py-6 transition-colors duration-500">
                        <i class="fa-solid fa-laugh-squint text-4xl group-hover:-rotate-45 duration-500 transition-transform"></i>
                    </header>

                    <section class="w-3/4 p-6 flex flex-col justify-center">
                        <p class="text-2xl font-bold text-gray-800 group-hover:text-white mb-1 transition-colors duration-500">
                            1,234
                        </p>

                        <p class="text-gray-600 group-hover:text-white text-sm uppercase tracking-wide transition-colors duration-500">
                            {{ __('Jokes') }}
                        </p>
                    </section>
                </div>
            </article>

            <article
                class="items-center rounded-lg bg-white shadow hover:shadow-none align-middle hover:bg-zinc-700 transition-colors duration-500 group overflow-hidden border border-zinc-700/75">
                <div class="flex">
                    <header
                        class="w-1/4 bg-zinc-700 text-white  flex items-center justify-center py-6 transition-colors duration-500">
                        <i class="fa-solid fa-list-check text-4xl group-hover:-rotate-12 duration-500 transition-transform"></i>
                    </header>

                    <section class="w-3/4 p-6 flex flex-col justify-center">
                        <p class="text-2xl font-bold text-gray-800 group-hover:text-white mb-1 transition-colors duration-500">
                            65
                        </p>

                        <p class="text-gray-600 group-hover:text-white text-sm uppercase tracking-wide transition-colors duration-500">
                            {{ __('Categories') }}
                        </p>
                    </section>
                </div>
            </article>

            <article
                class="items-center rounded-lg bg-white shadow hover:shadow-none align-middle hover:bg-zinc-700 transition-colors duration-500 group overflow-hidden border border-zinc-700/75">
                <div class="flex">
                    <header
                        class="w-1/4 bg-zinc-700 text-white  flex items-center justify-center py-6 transition-colors duration-500">
                        <i class="fa-solid fa-users text-4xl group-hover:-rotate-12 duration-500 transition-transform"></i>
                    </header>

                    <section class="w-3/4 p-6 flex flex-col justify-center">
                        <p class="text-2xl font-bold text-gray-800 group-hover:text-white mb-1 transition-colors duration-500">
                            {{ $userCount }}
                        </p>

                        <p class="text-gray-600 group-hover:text-white text-sm uppercase tracking-wide transition-colors duration-500">
                            {{ __('Users') }}
                        </p>
                    </section>
                </div>
            </article>

            <article
                class="items-center rounded-lg bg-white shadow hover:shadow-none align-middle hover:bg-zinc-700 transition-colors duration-500 group overflow-hidden border border-zinc-700/75">
                <div class="flex">
                    <header
                        class="w-1/4 bg-zinc-700 text-white  flex items-center justify-center py-6 transition-colors duration-500">
                        <i class="fa-solid fa-passport text-4xl group-hover:-rotate-12 duration-500 transition-transform"></i>
                    </header>

                    <section class="w-3/4 p-6 flex flex-col justify-center">
                        <p class="text-2xl font-bold text-gray-800 group-hover:text-white mb-1 transition-colors duration-500">
                            674,865
                        </p>

                        <p class="text-gray-600 group-hover:text-white text-sm uppercase tracking-wide transition-colors duration-500">
                            {{ __('Passengers') }}
                        </p>
                    </section>
                </div>
            </article>

            <article
                class="items-center rounded-lg bg-white shadow hover:shadow-none align-middle hover:bg-zinc-700 transition-colors duration-500 group overflow-hidden border border-zinc-700/75">
                <div class="flex">
                    <header
                        class="w-1/4 bg-zinc-700 text-white  flex items-center justify-center py-6 transition-colors duration-500">
                        <i class="fa-solid fa-user-secret text-4xl group-hover:-rotate-12 duration-500 transition-transform"></i>
                    </header>

                    <section class="w-3/4 p-6 flex flex-col justify-center">
                        <p class="text-2xl font-bold text-gray-800 group-hover:text-white mb-1 transition-colors duration-500">
                            3
                        </p>

                        <p class="text-gray-600 group-hover:text-white text-sm uppercase tracking-wide transition-colors duration-500">
                            {{ __('Roles') }}
                        </p>
                    </section>
                </div>
            </article>

            <article
                class="items-center rounded-lg bg-white shadow hover:shadow-none align-middle hover:bg-zinc-700 transition-colors duration-500 group overflow-hidden border border-zinc-700/75">
                <div class="flex">
                    <header
                        class="w-1/4 bg-zinc-700 text-white  flex items-center justify-center py-6 transition-colors duration-500">
                        <i class="fa-solid fa-earth-asia text-4xl group-hover:-rotate-12 duration-500 transition-transform"></i>
                    </header>

                    <section class="w-3/4 p-6 flex flex-col justify-center">
                        <p class="text-2xl font-bold text-gray-800 group-hover:text-white mb-1 transition-colors duration-500">
                            23,567,890
                        </p>

                        <p class="text-gray-600 group-hover:text-white text-sm uppercase tracking-wide transition-colors duration-500">
                            {{ __('Unique Visitors') }}
                        </p>
                    </section>
                </div>
            </article>

            <article
                class="items-center rounded-lg bg-white shadow hover:shadow-none align-middle hover:bg-zinc-700 transition-colors duration-500 group overflow-hidden border border-zinc-700/75">
                <div class="flex">
                    <header
                        class="w-1/4 bg-zinc-700 text-white  flex items-center justify-center py-6 transition-colors duration-500">
                        <i class="fa-solid fa-universal-access text-4xl group-hover:-rotate-12 duration-500 transition-transform"></i>
                    </header>

                    <section class="w-3/4 p-6 flex flex-col justify-center">
                        <p class="text-2xl font-bold text-gray-800 group-hover:text-white mb-1 transition-colors duration-500">
                            219
                        </p>

                        <p class="text-gray-600 group-hover:text-white text-sm uppercase tracking-wide transition-colors duration-500">
                            {{ __('Logged In') }}
                        </p>
                    </section>
                </div>
            </article>

        </div>
    </section>

    <section class="mx-12 space-y-4">

        <header>
            <h3 class="text-2xl font-bold text-zinc-700">
                {{__('System')}}
            </h3>
        </header>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

            <article
                class="items-center rounded-lg bg-white shadow hover:shadow-none align-middle hover:bg-zinc-700 transition duration-500 group overflow-hidden border border-zinc-700/75">
                <div class="flex">
                    <header
                        class="w-1/4 bg-zinc-700 text-white  flex items-center justify-center py-6 transition-colors duration-500">
                        <i class="fa-solid fa-info-circle text-4xl group-hover:-rotate-12 duration-500 transition-transform"></i>
                    </header>

                    <section class="w-3/4 p-6 flex flex-col justify-center">
                        <p class="text-2xl font-bold text-gray-800 group-hover:text-white mb-1 transition-colors duration-500">
                            {{ env('APP_VERSION')??"development" }}
                        </p>

                        <p class="text-gray-600 group-hover:text-white text-sm uppercase tracking-wide transition-colors duration-500">
                            {{__('Version')}}
                        </p>
                    </section>
                </div>
            </article>

            <article
                class="items-center rounded-lg bg-white shadow hover:shadow-none align-middle hover:bg-zinc-700 transition duration-500 group overflow-hidden border border-zinc-700/75">
                <div class="flex">
                    <header
                        class="w-1/4 bg-zinc-700 text-white  flex items-center justify-center py-6 transition-colors duration-500">
                        <i class="fa-solid fa-computer text-4xl group-hover:-rotate-12 duration-500 transition-transform"></i>
                    </header>

                    <section class="w-3/4 p-6 flex flex-col justify-center">
                        <p class="text-2xl font-bold text-gray-800 group-hover:text-white mb-1 transition-colors duration-500">
                            {{ env('APP_ENV')??'Unknown' }}
                        </p>

                        <p class="text-gray-600 group-hover:text-white text-sm uppercase tracking-wide transition-colors duration-500">
                            {{__('Environment')}}
                        </p>
                    </section>
                </div>
            </article>

        </div>

    </section>

</x-admin-layout>
