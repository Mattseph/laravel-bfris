<?php

use Carbon\Carbon;
use App\Models\Resident;

beforeEach(function () {
    $this->captain = createUser('captain');
});

it('can access resident view page', function () {

    $resident = Resident::factory()->create();
    $response = $this->actingAs($this->captain)->get('/resident/' . $resident->id);

    $response->assertStatus(200);
});

it('cannot delete resident profile', function () {
    $resident = Resident::factory()->create();


    $this->withSession([
        'auth.password_confirmed_at' => Carbon::now()->timestamp, // Simulate recent password confirmation
    ]);

    $response = $this->actingAs($this->captain)->delete('resident/', $resident->toArray());


    $response->assertStatus(403);

});
