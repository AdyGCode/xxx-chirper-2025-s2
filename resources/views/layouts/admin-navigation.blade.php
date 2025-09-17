<div class="flex h-screen flex-col justify-between border-e border-gray-100 bg-white">
    <div class="px-0 py-4">
        <p class="grid h-10 w-full place-content-center text-xs text-gray-600">
            <a class="block" href="{{route('home')}} ">
                <span class="sr-only">Home</span>

                <x-application-logo
                    class="w-14 h-14 fill-current text-gray-700 hover:text-teal-700 transition duration-350"/>
            </a>
        </p>

        <section class="mt-6 space-y-1">

            <x-side-nav-link :href="route('admin.index')" :active="request()->routeIs('admin.*')">
                <i class="fa-solid fa-cog group-hover:text-zinc-500"></i>
                {{ __('Admin Home') }}
            </x-side-nav-link>

            <x-side-nav-link :href="route('dashboard')" :active="request()->routeIs('home')">
                <i class="fa-solid fa-dashboard group-hover:text-zinc-500"></i>
                {{ __('Dashboard') }}
            </x-side-nav-link>

            <details class="group [&_summary::-webkit-details-marker]:hidden">
                <summary
                    class="flex cursor-pointer items-center justify-between px-4 py-2
                           text-gray-500 hover:text-gray-700
                            hover:bg-gray-200
                            transition duration-150"
                >
                        <span class="text-sm font-medium hover:text-zinc-500 transition duration-150">
                            <i class="fa-solid fa-users"></i>
                            {{ __('Users') }}
                        </span>

                    <span class="shrink-0 transition duration-300 group-open:-rotate-180">
                          <i class="fa-solid fa-chevron-down text-sm"></i>
                        </span>
                </summary>

                <section class="mt-2 space-y-1">

                        <x-side-nav-link :href="route('home')" :active="request()->routeIs('home')" class="px-12 py-2">
                            {{ __('Accounts') }}
                        </x-side-nav-link>

                        <x-side-nav-link :href="route('home')" :active="request()->routeIs('home')" class="px-12 py-2">
                            {{ __('Suspended') }}
                        </x-side-nav-link>

                        <x-side-nav-link :href="route('home')" :active="request()->routeIs('home')" class="px-12 py-2">
                            {{ __('Banned Users') }}
                        </x-side-nav-link>

                </section>

            </details>

            <x-side-nav-link :href="route('home')" :active="request()->routeIs('home')">
                <i class="fa-solid fa-laugh group-hover:text-zinc-500"></i>
                {{ __('Jokes') }}
            </x-side-nav-link>

            <x-side-nav-link :href="route('home')" :active="request()->routeIs('home')">
                <i class="fa-solid fa-cat group-hover:text-zinc-500"></i>
                {{ __('Categories') }}
            </x-side-nav-link>

            <details class="group [&_summary::-webkit-details-marker]:hidden">
                <summary
                    class="flex cursor-pointer items-center justify-between px-4 py-2
                         text-gray-500 hover:text-gray-700
                         hover:bg-gray-200
                         transition duration-150"
                >
                        <span class="text-sm font-medium hover:text-zinc-500 transition duration-150">
                            <i class="fa-solid fa-shield"></i>
                            {{ __('Security') }}
                        </span>

                    <span class="shrink-0 transition duration-300 group-open:-rotate-180">
                          <i class="fa-solid fa-chevron-down text-sm"></i>
                        </span>
                </summary>

                <section class="mt-2 space-y-1">
                    <x-side-nav-link :href="route('home')" :active="request()->routeIs('home')" class="px-12 py-2">
                        {{ __('Roles') }}
                    </x-side-nav-link>

                    <x-side-nav-link :href="route('home')" :active="request()->routeIs('home')" class="px-12 py-2">
                        {{ __('Permissions') }}
                    </x-side-nav-link>
                </section>

            </details>

            <x-side-nav-link :href="route('home')" :active="request()->routeIs('home')">
                <i class="fa-solid fa-plane-arrival group-hover:text-zinc-500"></i>
                {{ __('Link X') }}
            </x-side-nav-link>

        </section>
    </div>

    <section class="sticky inset-x-0 bottom-0 border-t border-gray-200">

        <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <a
                class="block px-4 py-2 [text-align:_inherit] text-sm font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700"
                href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                <i class="fa-solid fa-sign-out group-hover:text-zinc-500"></i>

                {{ __('Log Out') }}
            </a>
        </form>

        <a href="#" class="flex items-center gap-2 bg-white p-4 hover:bg-gray-50">
            <div
                class="bg-gray-500 text-gray-300 w-10 h-10 rounded-lg flex items-center justify-center font-bold text-md">
                AIM
            </div>

            <div>
                <p class="text-xs">
                    <strong class="block font-medium">Admin Istrator</strong>

                    <span> admin@example.com </span>
                </p>
            </div>
        </a>
    </section>
</div>
