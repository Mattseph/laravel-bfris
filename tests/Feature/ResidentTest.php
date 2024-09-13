<?php

use App\Models\Resident;

beforeEach(function() {
    $this->user = createUser();
});

test('Resident Page Can Be Accessed By Authenticated User', function () {
    $this->actingAs($this->user)->get('/resident')
    ->assertStatus(200);
});

test('Unauthenticated Cannot Access Resident Page', function () {
    $this->get('/resident')
    ->assertStatus(302)
    ->assertRedirect('/login');
});


test('Resident List Exist', function() {
    $resident = Resident::factory()->create();

    $this->actingAs($this->user)->get('/resident')
    ->assertStatus(200)
    ->assertDontSee(__('No Records Found'))
    ->assertViewHas('residents', function($collection) use($resident) {
        return $collection->contains($resident);
    });
});

test('No Resident Data Found', function() {
    $this->actingAs($this->user)->get('/resident')
    ->assertStatus(200)
    ->assertSee(__('No Records Found'));
});
