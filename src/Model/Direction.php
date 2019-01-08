<?php

namespace MarsRover\Model;

use InvalidArgumentException;

class Direction
{
    private $orientation;

    const NORTH = 'N';
    const SOUTH = 'S';
    const WEST = 'W';
    const EAST = 'E';

    public function __construct(string $orientation)
    {
        if (!$this->isValid($orientation)) {
            throw new InvalidArgumentException($orientation . 'Is a invalid orientation');
        }

        $this->orientation = $orientation;
    }

    public function getOrientation(): string
    {
        return $this->orientation;
    }

    private function isValid(string $orientation): bool
    {
        return in_array($orientation,[
                self::NORTH,
                self::WEST,
                self::EAST,
                self::SOUTH
            ]
        );
    }
}
