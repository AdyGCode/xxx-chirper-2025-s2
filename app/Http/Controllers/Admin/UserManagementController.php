<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $validated = $request->validate([
            'search' => ['nullable', 'string', 'alpha_num']
        ]);

        $search = $validated['search'] ?? '';

        $users = User::whereAny(
            ['name', 'email', 'position',],
            'LIKE',
            "%$search%"
        )
            ->paginate(10)
            ->appends(['search' => $search]);

        return view('admin.users.index')
            ->with('users', $users)
            ->with('search', $search);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // TODO: Update when we add Roles & Permissions
        $roles = Collection::empty();

        return view('admin.users.create')
            ->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        try {
            $validated = $request->validate([
                'name' => ['required', 'min:2', 'max:192',],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class.',email'],
                'password' => ['required', 'confirmed', Password::defaults()],
                'role' => ['nullable',],
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => mb_strtolower($request->email),
                'password' => Hash::make($request->password),
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {

            flash()
                ->error('Please fix the errors in the form.',
                    [
                        'position' => 'top-center',
                        'timeout' => 5000,
                    ],
                    'User Creation Failed');

            return back()->withErrors($e->validator)->withInput();

        }
        $userName = $user->name;

        flash()
            ->option('position', 'top-center')
            ->option('timeout', 5000)
            ->success("User $userName created successfully!", [], "User Added");

        return redirect(route('admin.users.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin.users.show')
            ->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        // TODO: Update when we add Roles & Permissions
        $roles = Collection::empty();

        return view('admin.users.edit')
            ->with('roles', $roles)
            ->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        // TODO: Update when we add Roles & Permissions
        try {

            $validated = $request->validate([
                'name' => ['required', 'min:2', 'max:192',],
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique(User::class)->ignore($user),
                ],
                'password' => [
                    'sometimes',
                    'nullable',
                    'confirmed',
                    Password::defaults()
                ],
                'role' => ['nullable',],
            ]);

            // Remove password if null
            if (is_null($validated['password'])) {
                unset($validated['password']);
            }

            $user->fill($validated);

            if ($user->isDirty('email')) {
                $user->email_verified_at = null;
            }

            $user->save();

            if (is_null($user->email_verified_at)) {
                $user->sendEmailVerificationNotification();
            }
        } catch (\Illuminate\Validation\ValidationException $e) {

            flash()
                ->error('Please fix the errors in the form.',
                    [
                        'position' => 'top-center',
                        'timeout' => 5000,
                    ],
                    'User Creation Failed');

            return back()->withErrors($e->validator)->withInput();

        }
        return redirect(route('admin.users.index'));

    }

    /**
     * Confirmn removal of the User resource from storage.
     */
    public function delete(User $user)
    {
        return view('admin.users.delete')
            ->with('user', $user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('admin.users.index'));
    }
}
