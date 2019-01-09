<?php

namespace MarsRover\Model;

abstract class Spinnable
{
    abstract protected function spin(string $direction): string;
}