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

        <article class="flex flex-col text-neutral-800 border border-neutral-300 shadow-sm  bg-white">
            <header class="bg-neutral-800 text-neutral-50 text-lg px-4 py-2">
                <h5>
                    {{ __('Create New User') }}
                </h5>
            </header>

            <section class="p-4">
                <form method="POST"
                      class="sm:gap-4 lg:gap-6 w-full"
                      action="{{ route('admin.users.store') }}">

                    @csrf


                    <div class="w-full mt-4 sm:mt-0 flex flex-col space-y-2  text-neutral-700">

                        <x-input-label for="Name">
                            {{__("Name")}}
                        </x-input-label>
                        <x-text-input type="text" id="Name" name="name" :value="old('name')??''"/>
                        <x-input-error :messages="$errors->get('name')" class="mt-2"/>


                        <x-input-label for="Email">
                            {{__("Email")}}
                        </x-input-label>
                        <x-text-input type="text" id="Email" name="email" :value="old('email')??''"/>
                        <x-input-error :messages="$errors->get('email')" class="mt-2"/>


                        <x-input-label for="Role">
                            {{__("Role")}}
                        </x-input-label>
                        <select id="Role" name="role">
                            <option>No Roles Provided</option>
                        </select>
                        <x-input-error :messages="$errors->get('role')" class="mt-2"/>


                        <x-input-label for="Status">
                            {{__("Status")}}
                        </x-input-label>
                        <select id="Status" name="status">
                            <option>No Status Provided</option>
                        </select>
                        <x-input-error :messages="$errors->get('status')" class="mt-2"/>


                        <x-input-label for="Password">
                            {{__("Password")}}
                        </x-input-label>
                        <x-text-input type="password" id="Password" name="password"/>
                        <x-input-error :messages="$errors->get('password')" class="mt-2"/>


                        <x-input-label for="PasswordConfirmation">
                            {{__("Password Confirmation")}}
                        </x-input-label>
                        <x-text-input type="password" id="PasswordConfirmation" name="password_confirmation"/>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>

                    </div>

                    <footer class="mt-4 gap-4 flex bg-neutral-200 -m-4 p-2 px-4">
                        <x-primary-button
                            class="bg-green-900! hover:bg-green-700! hover:text-white!">
                            Save
                        </x-primary-button>

                        <x-secondary-link-button
                            class="bg-neutral-700 hover:bg-yellow-700"
                            href="{{ route('admin.users.index') }}"
                        >
                            Cancel
                        </x-secondary-link-button>

                    </footer>
                </form>

            </section>

        </article>

    </section>


</x-admin-layout>
