<?php

use Livewire\Livewire;
use VendorName\Skeleton\Http\Livewire\Example;

it('can renders a view', function () {
    Livewire::test(Example::class)->assertSee('Do your best work here');
});
