<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('User Admin') }}
        </h2>
    </x-slot>

    <section class="py-4 mx-8 space-y-4 ">
        <header>
            <h3 class="text-2xl font-bold text-zinc-700">
                Users
            </h3>
        </header>
        <div class="flex flex-1 w-full max-h-min overflow-x-auto">
            <table class="min-w-full divide-y-2 divide-gray-200 bg-gray-50">
                <thead class="sticky top-0 bg-zinc-700 ltr:text-left rtl:text-right">
                <tr class="*:font-medium *:text-white">
                    <th class="px-3 py-2 whitespace-nowrap">User</th>
                    <th class="px-3 py-2 whitespace-nowrap">Role</th>
                    <th class="px-3 py-2 whitespace-nowrap">Status</th>
                    <th class="px-3 py-2 whitespace-nowrap">Actions</th>
                </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                @foreach($users as $user)

                    <tr class="*:text-gray-900 *:first:font-medium hover:bg-white">
                        <td class="px-3 py-1 whitespace-nowrap flex flex-col min-w-1/3">
                            <span class="">{{ $user->name }}</span>
                            <span class="text-sm text-gray-500">{{ $user->email }}</span>
                        </td>
                        <td class="px-3 py-1 whitespace-nowrap w-auto">
                            <span class="text-xs rounded-full bg-gray-700 p-0.5 px-2 text-gray-200">
                                role
                            </span>
                        </td>
                        <td class="px-3 py-1 whitespace-nowrap w-1/6">
                            Suspended
                        </td>
                        <td class="px-3 py-1 whitespace-nowrap w-1/8">
                            <form action="{{ route('admin.users', $user) }}"
                                  method="post"
                            class="grid grid-cols-3 gap-2 w-full">
                                @csrf
                                @method('delete')

                                <a href="{{ route('admin.users', $user) }}"
                                   class="hover:text-green-500 transition border p-2 text-center rounded">
                                    <i class="fa-solid fa-user-tag"></i>
                                </a>

                                <a href="{{ route('admin.users', $user) }}"
                                   class="hover:text-blue-500 transition border p-2 text-center rounded">
                                    <i class="fa-solid fa-user-cog"></i>
                                </a>
                                <button type="submit" class="hover:text-red-500 transition border p-2 text-center rounded">
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
                       {{ $users->onEachSide(2)->links("vendor.pagination.tailwind") }}
                   </td>
                </tr>
                </tfoot>
            </table>
        </div>


    </section>


</x-admin-layout>
