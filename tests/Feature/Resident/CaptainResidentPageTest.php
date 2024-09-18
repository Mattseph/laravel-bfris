<?php

use App\Models\Resident;

beforeEach(function () {
    $this->captain = createUser('captain');
    $this->resident = Resident::factory()->create();
});

it('can access resident view page', function () {

    $resident = Resident::factory()->create();
    $response = $this->actingAs($this->captain)->get('/resident/' . $resident->id);

    $response->assertStatus(200);
});

it('cannot delete resident profile', function () {
    $resident = Resident::factory()->create();
    $response = $this->actingAs($this->captain)->delete('/resident/'. $resident->id);

    $response->assertStatus(403);
    $this->assertDatabaseHas('residents', $resident);
});
