<?php

use Carbon\Carbon;
use App\Models\Resident;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

beforeEach(function() {
    $this->admin = createUser();
});

test('Resident Page Can Be Accessed By Authenticated User', function () {
    $this->actingAs($this->admin)->get('/resident')
    ->assertStatus(200);
});

test('Unauthenticated Cannot Access Resident Page', function () {
    $this->get('/resident')
    ->assertStatus(302)
    ->assertRedirect('/login');
});

test('Resident List Exists', function() {

    Resident::factory()->create();

    $response = $this->actingAs($this->admin)->get('/resident');
    $response->assertStatus(200)
             ->assertDontSee(__('No Records Found'))
             ->assertViewHas('residents');
});

test('No Resident Data Found', function() {
    $this->actingAs($this->admin)->get('/resident')
    ->assertStatus(200)
    ->assertSee(__('No Records Found'));
});

it('can delete resident profile', function () {
    $resident = Resident::factory()->create([
        'image' => 'uploads/default-img.svg',
    ]);


    $this->withSession([
        'auth.password_confirmed_at' => Carbon::now()->timestamp, // Simulate recent password confirmation
    ]);

    $response = $this->actingAs($this->captain)->delete('resident/', $resident->toArray());


    $response->assertStatus(302);
    $response->assertRedirect(route('resident.index'));
    $this->assertDatabaseMissing('residents', $resident->toArray());

    $response->assertSessionHas('message', 'Resident Deleted Successfully');
});

// test('Resident Profile Created Successfully', function () {

//     // Arrange


//     $residentData = [
//         'resident_id' => 1,
//         'lastname' => 'Goldner',
//         'firstname' => 'Dolores',
//         'midname' => 'Murray',
//         'suffix' => 'Sr.',
//         'sex' => 'Male',
//         'date_of_birth' => '1982-08-25',
//         'place_of_birth' => 'Bradtkeville',
//         'civil_status' => 'I know?.',
//         'nationality' => 'Slovenia',
//         'occupation' => 'Coating Machine Operator',
//         'religion' => 'Iglesia ni Kristo',
//         'blood_type' => 'O+',
//         'educational_attainment' => 'High School Graduate',
//         'phone_number' => '678-842-9134',
//         'tel_number' => '+1520347-4280',
//         'email' => 'feest.magdalen@gmail.com',
//         'purok' => 'Francis Rapid',
//         'barangay' => 'Apt. 540',
//         'city' => 'Port Sonnymouth',
//         'province' => 'Arkansas',
//         'is_fourps' => 1,
//         'image' => null,
//         'resident_id' => 1,
//         'is_disabled' => 0,
//         'disability_type' => 'null',
//         'is_voter' => 0,
//         'voter_number' => null,
//         'precinct' => null,
//         'is_vaccinated' => 0,
//         'vaccine_1' => null,
//         'vaccine_1_date' => null,
//         'vaccine_2' => null,
//         'vaccine_2_date' => null,
//         'is_booster' => 0,
//         'booster_1' => null,
//         'booster_1_date' => null,
//         'booster_2' => null,
//         'booster_2_date' => null,
//         'name' => 'John Doe',
//         'relationship' => 'Friend',
//         'address' => '1234 Street Name',
//         'contact' => '555-5555',
//     ];


//     // Act
//     $response = $this->actingAs($this->admin)
//         ->post('/resident', $residentData);



//     $resident = Resident::latest()->first();
//     expect($resident)->not()->toBeNull();

//     // Assert
//     $response->assertStatus(302)
//         ->assertRedirect('/resident');

//     // Check resident creation
//     $this->assertDatabaseHas('residents', [
//         'lastname' => 'Goldner',
//         'firstname' => 'Dolores',
//         'midname' => 'Murray',
//         'suffix' => 'Sr.',
//         'sex' => 'Male',
//         'date_of_birth' => '1982-08-25',
//         'place_of_birth' => 'Bradtkeville',
//         'civil_status' => 'I know?.',
//         'nationality' => 'Slovenia',
//         'occupation' => 'Coating Machine Operator',
//         'religion' => 'Iglesia ni Kristo',
//         'blood_type' => 'O+',
//         'educational_attainment' => 'High School Graduate',
//         'phone_number' => '678-842-9134',
//         'tel_number' => '+1 (520) 347-4280',
//         'email' => 'feest.magdalen@example.com',
//         'purok' => 'Francis Rapid',
//         'barangay' => 'Apt. 540',
//         'city' => 'Port Sonnymouth',
//         'province' => 'Arkansas',
//         'is_fourps' => 1,
//     ]);


//     // Check related records
//     $this->assertDatabaseHas('disabilities', [
//         'resident_id' => $residentData['resident_id'],
//         'is_disabled' => 0,
//         'disability_type' => null,
//     ]);

//     $this->assertDatabaseHas('voters', [
//         'resident_id' => $resident->id,
//         'is_voter' => 0,
//         'voter_id' => null,
//         'precinct' => null,
//     ]);

//     $this->assertDatabaseHas('vaccinations', [
//         'resident_id' => $resident->id,
//         'is_vaccinated' => 0,
//     ]);

//     $this->assertDatabaseHas('emergency_contacts', [
//         'resident_id' => $resident->id,
//         'name' => 'John Doe',
//         'relationship' => 'Friend',
//         'address' => '1234 Street Name',
//         'contact' => '555-5555',
//     ]);
// });
