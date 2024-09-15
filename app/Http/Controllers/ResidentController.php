<?php

namespace App\Http\Controllers;

use App\Models\Voter;
use App\Models\Resident;
use App\Models\Disability;
use App\Models\Vaccination;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Image;
use Illuminate\Validation\Rule;
use App\Models\EmergencyContact;
use Illuminate\Support\Benchmark;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreResidentRequest;

class ResidentController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $residents = Resident::select('resident_id', 'lastname', 'firstname', 'midname', 'suffix', 'image')
            ->orderBy('resident_id', 'desc')
            ->paginate();

        // dd(Benchmark::measure(fn() => $residents));
        // dd($residents);

        return view('resident.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $this->authorize('create', Resident::class);

        return view('resident.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreResidentRequest $request)
    {
        // or $request->validated();

        $validated = $request->validated();
        $resident = Resident::create([
            'lastname' => $validated->lastname,
            'firstname' => $validated->firstname,
            'midname' => $validated->midname,
            'suffix' => $validated->suffix,
            'sex' => $validated->sex,
            'date_of_birth' => $validated->date_of_birth,
            'place_of_birth' => $validated->place_of_birth,
            'civil_status' => $validated->civil_status,
            'nationality' => $validated->nationality,
            'occupation' => $validated->occupation,
            'religion' => $validated->religion,
            'blood_type' => $validated->blood_type,
            'educational_attainment' => $validated->educational_attainment,
            'phone_number' => $validated->phone_number,
            'tel_number' => $validated->tel_number,
            'email' => $validated->email,
            'purok' => $validated->purok,
            'barangay' => $validated->barangay,
            'city' => $validated->city,
            'province' => $validated->province,
            'is_fourps' => $validated->is_fourps,
            'image' => $validated->image,
            // 'image' => $validated->image->store('uploads'),

        ]);

        Disability::create([
            'resident_id' => $resident->resident_id,
            'is_disabled' => $validated->is_disabled,
            'disability_type' => $validated->disability_type,
        ]);

        Voter::create([
            'resident_id' => $resident->resident_id,
            'is_voter' => $validated->is_voter,
            'voter_number' => $validated->voter_number,
            'precinct' => $validated->precinct,
        ]);

        Vaccination::create([
            'resident_id' => $resident->resident_id,
            'is_vaccinated' => $validated->is_vaccinated,
            'vaccine_1' => $validated->vaccine_1,
            'vaccine_1_date' => $validated->vaccine_1_date,
            'vaccine_2' => $validated->vaccine_2,
            'vaccine_2_date' => $validated->vaccine_2_date,
            'is_boostered' => $validated->is_boostered,
            'booster_1' => $validated->booster_1,
            'booster_1_date' => $validated->booster_1_date,
            'booster_2' => $validated->booster_2,
            'booster_2_date' => $validated->booster_2_date,
        ]);

        EmergencyContact::create([
            'resident_id' => $resident->resident_id,
            'name' => $validated->name,
            'relationship' => $validated->relationship,
            'address' => $validated->address,
            'contact' => $validated->contact,
        ]);

        return to_route('resident.index')->with('message', 'Resident Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Resident $resident)
    {

        $this->authorize('view', $resident);
        return view('resident.view', [
            'resident' => $resident
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resident $resident)
    {

        $this->authorize('update', $resident);

        return view('resident.edit', [
            'resident' => $resident
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resident $resident)
    {


        if ($request->hasFile('image')) {
            File::delete(storage_path('app/public/' . $resident->image));
            $validated = $request->file('image')->store('uploads');
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
