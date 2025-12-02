<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('User Admin') }}
        </h2>
    </x-slot>

    <section class="py-4 mx-8 space-y-4">
        <header>
            <h3 class="text-2xl font-bold text-zinc-700">
                Users
            </h3>
            <p>
                <a href="{{ route('admin.users.create') }}">
                    New User
                </a>
            </p>

        </header>

        <article class="flex flex-col text-neutral-800 block border border-neutral-300 shadow-sm  bg-white">
            <header class="bg-neutral-800 text-neutral-50 text-lg px-4 py-2">
                <h5>
                    {{ __('Details for') }}
                    <em>{{ $user->name }}</em>
                </h5>
            </header>

            <section class="p-4">
                <div class="sm:flex sm:justify-between sm:gap-4 lg:gap-6">

                    <div class="sm:order-last sm:shrink-0">
                        <img
                            alt=""
                            src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1180&q=80"
                            class="size-16 rounded-full object-cover sm:size-[72px] border-neutral-200 border-4"
                        />
                    </div>

                    <dl class="w-full mt-4 sm:mt-0 grid grid-cols-4 space-y-2  text-neutral-700">
                        <dt class="col-span-1 border-b border-b-neutral-300 pb-1">
                            <i class="fa-solid fa-user"></i>
                            {{__("Name")}}
                        </dt>
                        <dd class="col-span-3 border-b border-b-neutral-300 pb-1">
                            {{ $user->name ?? __("No Name provided") }}
                        </dd>

                        <dt class="col-span-1 border-b border-b-neutral-300 pb-1">
                            <i class="fa-solid fa-envelope"></i>
                            {{__("Email")}}
                        </dt>
                        <dd class="col-span-3 border-b border-b-neutral-300 pb-1">
                            {{ $user->email ?? __("No Email provided") }}
                        </dd>

                        <dt class="col-span-1 border-b border-b-neutral-300 pb-1">
                            <i class="fa-solid fa-user-friends"></i>
                            {{__("Role")}}
                        </dt>
                        <dd class="col-span-3 border-b border-b-neutral-300 pb-1">
                            {{ $user->role ?? __("No Role") }}
                        </dd>

                        <dt class="col-span-1 border-b border-b-neutral-300 pb-1">
                            <i class="fa-solid fa-user-lock"></i>
                            {{__("Status")}}
                        </dt>
                        <dd class="col-span-3 border-b border-b-neutral-300 pb-1">
                            {{ $user->status ?? __("No Status") }}
                        </dd>

                        <dt class="col-span-1 border-b border-b-neutral-300 pb-1">
                            <i class="fa-solid fa-calendar"></i>
                            {{ __("Added") }}
                        </dt>
                        <dd class="col-span-3 border-b border-b-neutral-300 pb-1">
                            {{ $user->created_at->format('j M Y') ?? __("-")}}
                        </dd>

                        <dt class="col-span-1 border-b border-b-neutral-300 pb-1">
                            <i class="fa-solid fa-calendar-alt"></i>
                            {{ __("Updated") }}
                        </dt>
                        <dd class="col-span-3 border-b border-b-neutral-300 pb-1">
                            {{ $user->updated_at->format('j M Y') ?? __("-")}}
                        </dd>

                        <dt class="col-span-1 pb-1">
                            <i class="fa-solid fa-envelope-circle-check"></i>
                            {{ __("Verified") }}
                        </dt>
                        <dd class="col-span-3 pb-1 @if(!$user->email_verified_at) text-red-700 @endif">
                            {{ $user->email_verified_at ?? __("Email not verified")}}
                        </dd>
                    </dl>
                </div>

                <footer class="mt-4 bg-neutral-200 -m-4 p-2 px-4">

                    <form action="{{ route('admin.users.delete', $user) }}"
                          method="post"
                          class="flex flex-row gap-4 w-full">
                        @csrf

                        <x-primary-link-button
                            class="hover:bg-blue-800! flex gap-2"
                            href="{{ route('admin.users.index', $user) }}">
                            <i class="fa-solid fa-users"></i>
                            All Users
                        </x-primary-link-button>

                        <x-primary-link-button
                            class="bg-neutral-700 hover:bg-yellow-700 flex gap-2"
                            href="{{ route('admin.users.edit', $user) }}">
                            <i class="fa-solid fa-user-cog"></i>
                            Edit
                        </x-primary-link-button>

                        <x-secondary-button
                            type="submit"
                            class="hover:bg-red-800 hover:text-white! flex gap-2">
                            <i class="fa-solid fa-user-slash"></i>
                            Delete
                        </x-secondary-button>

                    </form>

                </footer>

            </section>

        </article>

    </section>


</x-admin-layout>
