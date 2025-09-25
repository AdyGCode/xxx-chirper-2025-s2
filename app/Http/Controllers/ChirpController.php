<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChirpRequest;
use App\Http\Requests\UpdateChirpRequest;
use App\Models\Chirp;

use Illuminate\Support\Facades\Gate;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chirps = Chirp::with('user')->latest()->get();

        return view('chirps.index')
            ->with('chirps', $chirps);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChirpRequest $request)
    {
        $validated = $request->validate([
            'message' => [
                'required',
                'string',
                'max:255',
                'min:5',
            ],
        ]);

        $request->user()->chirps()->create($validated);

        return redirect(route('chirps.index'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Chirp $chirp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp)
    {
        Gate::authorize('update', $chirp);

        return view('chirps.edit')
            ->with('chirp', $chirp);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChirpRequest $request, Chirp $chirp)
    {
        Gate::authorize('update', $chirp);

        $validated = $request->validate([
            'message' => [
                'required',
                'string',
                'min:5',
                'max:255',
            ],
        ]);

        $chirp->update($validated);

        return redirect(route('chirps.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp)
    {
        Gate::authorize('delete', $chirp);

        $chirp->delete();
        return redirect(route('chirps.index'));
    }
}
