<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use Intervention\Image\Image;

class ResidentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Resident List";
        $residents = Resident::query()
            ->orderBy('id', 'desc')
            ->paginate();

        return view('resident.index', [
            'residents' => $residents,
            'title' => $title
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('resident.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:residents'],
            'address' => ['required', 'string'],
            'nationality' => ['required', 'string', 'max:255'],
            'image' => ['required', 'image'],
        ]);

        $validated['image'] = $request->file('image')->store('uploads'); //First argument is the folder and the second is the storage to be used. php artisan storage:link


        $store = Resident::create($validated);

        return to_route('resident.index')->with('message', 'Resident Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Resident $resident)
    {

        return view('resident.view', [
            'resident' => $resident
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resident $resident)
    {

        return view('resident.edit', [
            'resident' => $resident
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resident $resident)
    {

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('residents')->ignore($resident->id)],
            'address' => ['required', 'string'],
            'nationality' => ['required', 'string', 'max:255'],
            'image' => ['sometimes', 'image'],
        ]);

        if ($request->hasFile('image')) {
            File::delete(storage_path('app/public/' . $resident->image));
            $validated['image'] = $request->file('image')->store('uploads');
        }

        $resident->update($validated);
        return to_route('resident.index', $resident)->with('message', 'Resident Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resident $resident)
    {
        File::delete(storage_path('app/public/' . $resident->image));
        $resident->delete();
        return to_route('resident.index')->with('message', 'Resident Deleted Successfully');
    }
}
