<?php

beforeEach(function () {
    $this->copyAssets();

    $this->user = \Orchestra\Testbench\Factories\UserFactory::new()->create();
});

afterEach(function () {
    $this->cleanAssets();
});

it('can load the default page', function () {
    $this->actingAs($this->user)
        ->get(route('skeleton'))
        ->assertOk();
});

it('can be secured via the auth call back', function () {
    $this->get(route('skeleton'))
        ->assertForbidden();
});

it('the default page uses the package javascript', function () {
    $this->actingAs($this->user)
        ->get(route('skeleton'))
        ->assertOk()
        ->assertView()
        ->contains('vendor/skeleton/app.js');
});

it('the default page uses the package css', function () {
    $this->actingAs($this->user)
        ->get(route('skeleton'))
        ->assertOk()
        ->assertView()
        ->contains('vendor/skeleton/app.css');
});

it('displays the livewire example', function () {
    $this->actingAs($this->user)
        ->get(route('skeleton'))
        ->assertOk()
        ->assertSeeLivewire('example');
});
