<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('User Admin') }}
        </h2>
    </x-slot>

    <section class="py-4 mx-8 space-y-4 ">
        <header class="flex justify-between gap-8">
            <h3 class="text-2xl font-bold text-zinc-700 grow">
                Users
            </h3>

            <form action="{{ route('admin.users.index') }}" method="GET" class="flex flex-row gap-1">

                <x-text-input id="search"
                              type="text"
                              name="search"
                              class="border border-neutral-500/50"
                              :value="$search??''"
                />

                <x-primary-button type="submit"
                        class="px-4 py-1">
                    <i class="fa-solid fa-search text-md"></i>
                    <span class="sr-only">Search</span>
                </x-primary-button>

            </form>

            <x-primary-link-button
                href="{{ route('admin.users.create') }}"
                class=" hover:bg-blue-800!">
                New User
            </x-primary-link-button>
        </header>

        <table class="min-w-full divide-y-2 divide-neutral-200 bg-neutral-50">
            <thead class="sticky top-0 bg-zinc-700 ltr:text-left rtl:text-right">
            <tr class="*:font-medium *:text-white">
                <th class="px-3 py-2 whitespace-nowrap">User</th>
                <th class="px-3 py-2 whitespace-nowrap">Role</th>
                <th class="px-3 py-2 whitespace-nowrap">Status</th>
                <th class="px-3 py-2 whitespace-nowrap">Actions</th>
            </tr>
            </thead>

            <tbody class="divide-y divide-neutral-200">
            @foreach($users as $user)

                <tr class="*:text-neutral-900 *:first:font-medium hover:bg-white">
                    <td class="px-3 py-1 whitespace-nowrap flex flex-col min-w-1/3">
                        <span class="">{{ $user->name }}</span>
                        <span class="text-sm text-neutral-500">{{ $user->email }}</span>
                    </td>
                    <td class="px-3 py-1 whitespace-nowrap w-auto">
                            <span class="text-xs rounded-full bg-neutral-700 p-0.5 px-2 text-neutral-200">
                                role
                            </span>
                    </td>
                    <td class="px-3 py-1 whitespace-nowrap w-1/6">
                            <span class="text-xs rounded-full bg-neutral-700 p-0.5 px-2 text-neutral-200">
                                suspended
                            </span>
                    </td>
                    <td class="px-3 py-1 whitespace-nowrap w-1/4">
                        <form action="{{ route('admin.users.delete', $user) }}"
                              method="post"
                              class="grid grid-cols-3 gap-2 w-full">
                            @csrf

                            <a href="{{ route('admin.users.show', $user) }}"
                               class="hover:text-green-500 transition border p-2 text-center rounded">
                                <i class="fa-solid fa-user-tag"></i>
                            </a>

                            <a href="{{ route('admin.users.edit', $user) }}"
                               class="hover:text-blue-500 transition border p-2 text-center rounded flex-row">
                                <i class="fa-solid fa-user-cog"></i>
                            </a>
                            <button type="submit"
                                    class="hover:text-red-500 transition border p-2 text-center rounded flex-row">
                                <i class="fa-solid fa-user-slash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>

            <tfoot>
            <tr>
                <td colspan="4" class="p-3">
                    Pagination here...
                    {{--                        {{ $users->onEachSide(2)->links("vendor.pagination.tailwind") }}--}}
                </td>
            </tr>
            </tfoot>
        </table>

    </section>


</x-admin-layout>
