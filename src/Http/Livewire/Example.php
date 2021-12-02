<?php

namespace VendorName\Skeleton\Http\Livewire;

use Livewire\Component;

class Example extends Component
{
    public const colors = [
        'gray',
        'red',
        'yellow',
        'green',
        'blue',
        'indigo',
        'purple',
        'pink',
    ];

    public function getColorProperty()
    {
        return session()->get('skeleton.example.color', 'red');
    }

    public function toggleColor()
    {
        $pick = array_filter(self::colors, fn ($color) => $color !== $this->color);
        $color = $pick[array_rand($pick)] ?? null;

        session()->put('skeleton.example.color', $color);
    }

    public function render()
    {
        return view('skeleton::livewire.example', ['color' => $this->color]);
    }
}
