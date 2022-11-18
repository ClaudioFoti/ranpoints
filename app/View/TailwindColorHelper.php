<?php

namespace App\View;

class TailwindColorHelper
{
    const COLORS = [
        'orange',
        'amber',
        'yellow',
        'lime',
        'emerald',
        'teal',
        'cyan',
        'sky',
        'violet',
        'purple',
        'fuchsia',
        'rose',
        'red',
        'yellow',
        'green',
        'blue',
        'indigo',
        'purple',
        'pink',
    ];

    private $range;

    private $prefix;

    public function __construct($range = [5, 6], $prefix = 'bg')
    {
        $this->range = $range;
        $this->prefix = $prefix;
    }

    public function pick()
    {
        $prefix = $this->prefix;
        $indexColor = self::COLORS[random_int(0, count(self::COLORS) - 1)];
        $number = random_int($this->range[0], $this->range[1]) * 100;

        return "$prefix-$indexColor-$number";
    }
}
